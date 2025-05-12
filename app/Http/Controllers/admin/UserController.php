<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $title = 'Danh sách người dùng';
        $users = $this->userRepository->all();
        return view('admin.auth.user_list', compact('users', 'title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:5',
            'password_c' => 'required|same:password',
            'status' => 'required|integer',
            'role' => 'required|integer'
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng của email',
            'email.unique' => 'Email đã được sử dụng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.max' => 'Số điện thoại không được quá 15 ký tự',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Độ dài mật khẩu tối thiểu là 5 ký tự',
            'password_c.same' => 'Mật khẩu không giống nhau',
            'password_c.required' => 'Vui lòng nhập mật khẩu',
            'status.required' => 'Vui lòng chọn trạng thái',
            'role.required' => 'Vui lòng chọn quyền hạn'
        ]);

        try { 
            $this->userRepository->create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'password' => Hash::make($validated['password']),
                'status' => $validated['status'],
                'role' => $validated['role'],
            ]);
            return response()->json([
                'success' => true, 
                'message' => 'Thêm thành viên thành công'
            ]);
    
        } catch (\Exception $e) { 
            return response()->json([
                'success' => false, 
                'error' => 'Có lỗi xảy ra khi thêm dữ liệu.'], 500);
        }
    } 

    public function edit($id)
    {
        $user = $this->userRepository->find($id); // Lấy người dùng

        if ($user) {
            return response()->json(['success' => true, 'user' => $user]);
        } else {
            return response()->json(['success' => false, 'error' => 'Không tìm thấy người dùng.'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'status' => 'required|integer',
            'role' => 'required|integer'
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng của email',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.max' => 'Số điện thoại không được quá 15 ký tự',
            'status.required' => 'Vui lòng chọn trạng thái',
            'role.required' => 'Vui lòng chọn quyền hạn'
        ]);

        try { 
            $this->userRepository->update($id, [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
                'role' => $request->role
            ]);
            return response()->json(['success' => true, 'message' => 'Cập nhật thông tin thành công']);
    
        } catch (\Exception $e) { 
            return response()->json(['success' => false, 'error' => 'Có lỗi xảy ra khi cập nhật dữ liệu. Vui lòng thử lại.'], 500);
        }
    }

    public function destroy($id)
    {
        try { 
            $this->userRepository->delete($id); 
            return response()->json(['success' => true, 'message' => 'Xóa người dùng thành công.']);
        } catch (\Exception $e) { 
            return response()->json(['success' => false, 'error' => 'Có lỗi xảy ra khi xóa người dùng.'], 500);
        }
    } 
}
