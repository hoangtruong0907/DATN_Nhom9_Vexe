<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class InfoController extends Controller
{
    private $main_url;
    private $route_url;
    private $client_id;
    private $client_secret;
    private $use_profile_url;

    public function __construct()
    {
        $this->main_url = env('VXR_ACOUNT_SERVICE_URL_TEST');
        $this->route_url = env('VXR_ROUTE_URL_TEST');
        $this->use_profile_url = env('VXR_USER_PROFILE_URL_TEST');
        $this->client_id = env('VEXERE_CLIENT_ID');
        $this->client_secret = env('VEXERE_CLIENT_SECRET');
    }
    public function index()
    {
        if(auth()->check()){
            $user = User::find(Auth::id());
            return view('account.info',['user' =>$user]);
        }else{
            return redirect()->route('/')->withErrors(['error' => 'Vui lòng đăng nhập tài khoản']);
        }
    }
    public function update_profile(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|min:3|max:255', 
                'birthday' => 'nullable|date|before:today',
                'sex' => 'required|in:0,1,2',
            ]);
            $user = Auth::user();
            $user->name = $validatedData['name'];
            $user->sex = $validatedData['sex'];
            $user->birthdate = $validatedData['birthday'];
            $user->save();
            return redirect()->back()->with('success', 'Thông tin của bạn đã được cập nhật thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }
    public function membership()
    {
        return view('account.membership');
    }
    public function getBookingInfo()
    {
        try {
            if(auth()->check()){
                $results = []; 

                $user = User::find(Auth::id());
                foreach ($user->bookings as $booking) {
                    // Post api 
                    $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
                    $uniqueToken = Str::uuid();
                    $client = new Client();
                    $response = $client->get( $this->main_url.'/v3/booking?code='. $booking->booking_code, [
                        'headers' => [
                            'Postman-Token' => (string) $uniqueToken,
                            'cache-control' => 'no-cache',
                            'Authorization' => 'Bearer ' .  $token,
                        ]
                    ]);
                    $responseBody = json_decode($response->getBody(), true);
                    array_push($results, $responseBody['data'][0]); // push data to array result
                }
                return view('account.ticket', ['arrayData' => $results]);
            } else {
                return redirect()->route('/')->withErrors(['error' => 'Vui lòng đăng nhập tài khoản']);
            }
        } catch (\Throwable $th) {
            return $th;
        };
    }
    public function reward()
    {
        return view('account.reward');
    }
    public function card()
    {
        return view('account.card');
    }
    public function review()
    {
        return view('account.review');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
