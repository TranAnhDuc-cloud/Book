<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookRecord;
use App\Http\Requests\BookRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookRecordController extends Controller
{
    //
    public function index(){
        $data = BookRecord::all();
        $book = Book::all();
        $user = User::all();
        $count = $data->count();
        return view('admin.bookrecord.danhsach')->with(['data'=>$data,'count'=>$count,'book'=>$book,'user'=>$user]);
        // 
    }
    protected function create( $data){
        $bookrecord = new BookRecord();
        $bookrecord->user_id = $data['user_id'];
        $bookrecord->book_id = $data['book_id'];
        $bookrecord->took_on = $data['took_on'];
        $bookrecord->returned_on =$data['returned_on'];
        $bookrecord->due_date = $data['due_date'];
        $bookrecord->save();
        return $bookrecord;
    }
    public function add(){
        return view('admin.bookrecord.add');
    }
    public function addShow(Request $request){
       try {
           //code...
            $allRequest = $request->all();
            if($this->create($allRequest)){
                return redirect()->route('bookrecord.add')->with('success','Thêm Thành Công');
            }else{
                return redirect()->route('bookrecord.add')->with('error','Thêm Thất Bại');
            }
        } catch (\Throwable $th) {
            return redirect()->route('bookrecord.add')->with('error','Thêm Thất Bại');
       }
    }
    public function edit($id){
        $book = BookRecord::find($id);
        return view('admin.bookrecord.edit',['book'=>$book]);
    }
    public function update(Request $request,$id){
        $book = BookRecord::find($id);
        try {
            //code...
            if(isset($request->user_id)){
                $book->user_id = $request->user_id;
            }else{
                if(isset($request->book_id)){
                    $book->book_id = $request->book_id;
                }else{
                    if(isset($request->took_on)){
                        $book->took_on = $request->took_on;
                    }else{
                        if(isset($request->returned_on)){
                            $book->returned_on = $request->returned_on;
                        }else{
                            if(isset($request->due_date)){
                                $book->due_date = $request->due_date;
                            }
                        }
                    }
                }   
            }
            $book->save();
            return redirect()->route('bookrecord.edit',$id)->with('mess','Bạn Đã Sửa : Thành Công ');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('bookrecord.edit',$id);
        }
        return redirect()->route('bookrecord.edit',$id)->with('mess','Bạn Đã Sửa : Thành Công ');
    }
    // 
    public function delete($id){
        $bookrecord = BookRecord::find($id);
        if($bookrecord != null){
            $bookrecord->delete();
            return redirect()->route('bookrecord.index')->with(['mess'=>'Bạn Đã Xóa BookRecord Có ID =  '.$bookrecord->id.' Thành Công ']);
        }
        return redirect()->route('bookrecord.index')->with(['mess'=>'Bạn Đã Xóa BookRecord Có ID =  '.$bookrecord->id.' Thất Bại ']);
    }
    public function sort(){
        $bookrecord = DB::table('book_records')->select('*')->orderBy('book_id','asc')->get();
        return view('admin.bookrecord.sort')->with(['book'=>$bookrecord]);
    }
    public function search(Request $request){
        $name = $request['bookrecord_id'];
        $bookrecord = BookRecord::all()->where('id',$name);
        return view('admin.bookrecord.search')->with(['book'=>$bookrecord]);
    }

}
