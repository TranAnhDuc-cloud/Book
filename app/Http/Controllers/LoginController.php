<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function index(){
        return view('admin.auth.login');
    }
    public function postLogin(Request $request){
        $username = $request['username'];
        $password = $request['password'];
        if($username == ''){
            Session::flash('mess-user','Chưa Nhập Tên Tài Khoản');
            return redirect()->route('login');
        }else{
            if($password ==''){
                Session::flash('mess-pass','Chưa Nhập Mật Khẩu');
                return redirect()->route('login');
            }else{
                if(Auth::attempt(['username'=>$username,'password'=>$password])){
                    return redirect()->route('home');
                }else{
                    Session::flash('error','Tài Khoản Hoặc Mật Khẩu Không Đúng');
                    return redirect()->route('login');
                }
            }
        }
    }
   
}
