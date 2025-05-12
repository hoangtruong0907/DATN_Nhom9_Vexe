<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interface\AuthRepositoryInterface;


class AuthAdminController extends Controller
{

    protected $authRepository;
    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }


    public function index(){
        return view('admin.auth.login');
    }

    public function doLogin(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Bạn chưa nhập mật khẩu'
        ]);

        $remember = $request->input('remember', false); //thêm checkbox remember me
        if($this->authRepository->login($validated, $remember)) {
            toastr()->success('Đăng nhập thành công!');
            return redirect()->route('admin');
        }

        toastr()->error('Đăng nhập không thành công! ');
        return redirect()->back();
    }

    public function doLogout() {

        $this->authRepository->logout();
            toastr()->success('Đăng xuất thành công!');
            return redirect()->route('admin.login.index');
    }


}
