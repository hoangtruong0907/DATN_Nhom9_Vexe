<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // Lấy thông tin người dùng từ Google
            $user = Socialite::driver('google')->user();
            
            // Kiểm tra xem người dùng đã tồn tại trong database chưa
            $findUser = User::where('google_id', $user->id)->orWhere('email', $user->email)->first();

            if ($findUser) {
                //update user id cho bookings
                Booking::where('customer_email', $findUser->email)->update(['user_id' => $findUser->id]);
                // Nếu đã tồn tại, đăng nhập và chuyển hướng
                Auth::login($findUser);
                return redirect()->intended('/');
            } else {
                // Nếu chưa tồn tại, tạo người dùng mới
                $newUser = User::updateOrCreate(
                    [
                        'email' => $user->email
                    ],
                    [
                        'name' => $user->name,
                        'role' => config('apps.common.role.user'), // Gán quyền mặc định
                        'google_id' => $user->id,
                        'password' => bcrypt('12345678') // Dùng bcrypt thay vì encrypt để mã hóa mật khẩu
                    ]
                );

                // Đăng nhập người dùng vừa tạo
                Auth::login($newUser);
                return redirect()->intended('/');
            }
        } catch (Exception $e) {
        // Log lỗi chi tiết vào file logs để dễ kiểm tra
        Log::error('Google login error: ' . $e->getMessage());
            
        // Chuyển hướng người dùng về trang login với thông báo lỗi
        return redirect('/login')->with('error', 'Đăng nhập bằng Google thất bại. Vui lòng thử lại sau.');
        }
    }

    public function addPhone(Request $request)
    {
        // Validate số điện thoại
        $request->validate([
            'phone_number' => 'required'
        ]);

        // Lưu số điện thoại cho người dùng hiện tại
        $user = Auth::user();
        $user->phone = $request->phone_number;
        $user->save();

        return redirect()->route('home');
    }
}