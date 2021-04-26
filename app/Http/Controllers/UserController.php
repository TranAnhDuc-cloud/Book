<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = User::paginate(5)->fragment('users');
        $count = $data->count();
        return view('admin.user.index',['data'=>$data],['count'=>$count]);
    }
    // 
    public function add(){
        return view('admin.user.add');
    }
    protected function create($data){
        $user = new User();
        $user->username = $data['username'];
        $user->firt_name = $data['firt_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->is_staff = $data['is_staff'];
        $user->is_active = $data['is_active'];
        $user->is_superuser = $data['is_superuser'];
        $user->data_joined = $data['data_joined'];
        $user->password = bcrypt($data['password']);
        $user->save();
        return $user;
    }
    public function addShow(Request $request){
        try {
            $allRequest = $request->all();
            if($this->create($allRequest)){
                return redirect()->route('user.add')->with('success','Thêm User '.$request->firt_name.' '.$request->last_name.' Thành Công');
            }else{
                return redirect()->route('user.add')->with('error','Thêm Thất Bại');
            }
        } catch (\Throwable $th) {
            //throw $th;
             return redirect()->route('user.add')->with('error','Thêm Thất Bại');
        }
     }
    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }
    public function update($id, Request $request){
        $user = new User();
        $user = User::find($id);
        $user->firt_name = $request->firt_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->is_superuser = $request->superuser;
        $user->save();
        return redirect()->route('user.edit',$id)->with('mess','Bạn Đã Sửa : '.$user->username.' Thành Công ');
    }
    // 
    public function delete($id){
        $user = User::find($id);
        if($user != null){
            $user->delete();
            return redirect()->route('user.index')->with(['mess'=>'Bạn Đã Xóa : '.$user->username.' Thành Công ']);
        }
        return redirect()->route('user.index')->with(['mess'=>'Bạn Đã Xóa : '.$user->username.' Thất Bại ']);
    }
}
