<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index(){
        $data = DB::table('users')->select(['*'])->get();
        $count = $data->count();
        return view('admin.user.danhsach',['data'=>$data],['count'=>$count]);
    }
    // 
    public function add(){
        return view('admin.user.add');
    }
    public function create(array $user){
        return User::create([
            'username'=>$user['username'],
            // 'firt_name'=>$user['firt_name'],
            // 'last_name'=>$user['last_name'],
            'email'=>$user['email'],
            'is_staff'=>$user['staff'],
            'is_active'=>$user['active'],
            'data_joined'=>$user['datajoined'],
            'is_superuser'=>$user['superuser'],
            // 'address'=>$user['address'],
            'password'=>$user['password'],
        ]);
    }
    public function add_show(UserRequest $request){
        $allRequest = $request->all();
        $validated = $request->validated($allRequest);
        $validate = $request->validated();
        if($this->create($this->$validated)){
            return redirect()->route('user.add')->with(['success','Thêm User Thành Công']);
        }else{
            return redirect()->route('user.add')->with(['error','Thêm User Thất Bại']);
        }
    }
    // 
    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->firt_name = $request->firtname;
        $user->last_name = $request->lastname;
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
