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
use IntlChar;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use PhpParser\Node\Expr\Cast\Double;

class BookRecordController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = BookRecord::paginate(5)->fragment('book_records');
        $book = Book::where('available',1)->get();
        $user = User::all();
        $count = $data->count();
        return view('admin.bookrecord.index')->with(['data'=>$data,'count'=>$count,'book'=>$book,'user'=>$user]);
        // 
    }




    // ADD
    protected function create(array $data){
        return BookRecord::create([
            'user_id' =>$data['user_id'],
            'book_id' => $data['book_id'],
            'took_on' => $data['took_on'],
            'returned_on' => $data['returned_on'],
            'due_date' => $data['due_date'],
        ]);
    }
    public function add(){
        return view('admin.bookrecord.add');
    }
    public function addShow(Request $request){
        try {
            //code...
            $allRequest = $request->all();
            $user_id = $request['user_id'];
            $book_id = $request['book_id'];
            $data = DB::table('book_records')->where('user_id',$user_id)->get();
            $book = DB::table('books')->where('available',1)->value('id');
            if($data != null){
                    if($book_id == $book->id){
                        if($this->create($allRequest))
                            return redirect()->route('bookrecord.index')->with('success','Thêm Thành Công');
                        else{
                            return redirect()->route('bookrecord.index')->with('success','Thêm Thất Bại');
                        }
                    }
            }else{
                return redirect()->route('bookrecord.index')->with('success','ID Không tồn tại');
            }
        } catch (\Throwable $th) {
            // throw $th;
             return redirect()->route('bookrecord.add')->with('error','Thêm Thất Bại');
        }
     }




    // UPDATE
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



    // DELETE
    public function delete($id){
        $bookrecord = BookRecord::find($id);
        if($bookrecord != null){
            $bookrecord->delete();
            return redirect()->route('bookrecord.index')->with(['mess'=>'Bạn Đã Xóa BookRecord Có ID =  '.$bookrecord->id.' Thành Công ']);
        }
        return redirect()->route('bookrecord.index')->with(['mess'=>'Bạn Đã Xóa BookRecord Có ID =  '.$bookrecord->id.' Thất Bại ']);
    }



    // SORT
    public function userUp(){
        $data = BookRecord::all();
        $book = Book::all();
        $user = User::all();
        $count = $data->count();
        $bookrecord = $this->sortBookrecord('user_id','asc');
        return view('admin.bookrecord.index')->with(['data'=>$data,'count'=>$count,'book'=>$book,'user'=>$user,'data'=>$bookrecord]);
        
    }
    public function userDown(){
        $data = BookRecord::all();
        $book = Book::all();
        $user = User::all();
        $count = $data->count();
        $bookrecord = $this->sortBookrecord('user_id','desc');
        return view('admin.bookrecord.index')->with(['data'=>$data,'count'=>$count,'book'=>$book,'user'=>$user,'data'=>$bookrecord]);
    }
    public function bookUp(){
        $data = BookRecord::all();
        $book = Book::all();
        $user = User::all();
        $count = $data->count();
       $bookrecord = BookRecord::get()->sortBy('book_id');
       return view('admin.bookrecord.index')->with(['data'=>$data,'count'=>$count,'book'=>$book,'user'=>$user,'data'=>$bookrecord]);
    }
    public function bookDown(){
        $data = BookRecord::all();
        $book = Book::all();
        $user = User::all();
        $count = $data->count();
        $bookrecord = $this->sortBookrecord('book_id','desc');
        return view('admin.bookrecord.index')->with(['data'=>$data,'count'=>$count,'book'=>$book,'user'=>$user,'data'=>$bookrecord]);
    }
    public function sortBookrecord($attribute,$sort){
        return DB::table('book_records')->select('*')->orderBy($attribute,$sort)->get();
    }
   

    // SEARCH
    public function search(Request $request){
        $name = $request['bookrecord_id'];
        $data = BookRecord::all()->where('id',$name);
        $book = Book::all();
        $user = User::all();
        return view('admin.bookrecord.search')->with(['data'=>$data,'book'=>$book,'user'=>$user]);
       
       
    }
    

    // UNDO
    public function undo($id){
        $bookrecord = BookRecord::find($id);
        if($bookrecord->took_on == '0001-01-01 00:00:00'){
            return redirect()->route('bookrecord.index')->with('mess','Sách Này Đã Được Bạn Thu Hồi Rồi');
        }else{
            $bookrecord->took_on = '0001-01-01 00:00:00';
            $bookrecord->returned_on = '0001-01-01 00:00:00';
            $bookrecord->due_date = '0001-01-01';
            $bookrecord->save();
            return redirect()->route('bookrecord.index')->with('mess','THU HỒI THÀNH CÔNG');
            
        }
        
    }

    // RENT
    public function rent(Request $request){
        if($request->took_on != null){
            if($this->createa($request)){
                return redirect()->route('bookrecord.index')->with('success','Bạn Đã Cho Mượn Thành Công ');
            }else{
                return redirect()->route('bookrecord.index')->with('error','Cho Mượn Thất Bại ');
            }
        }else{
            return redirect()->route('bookrecord.index')->with('error','Bạn Chưa Nhập Ngày Mượn ');
        }
        
        
    }
    protected function createa(Request $request){
        $title = $request['title'];
        $username = $request['username'];
        $took_on = $request['took_on'];
        $user_id = DB::table('users')->where('username','=',$username)->value('id');
        $book_id = DB::table('books')->where('title','=',$title)->value('id');
        // $user_id = $user_id->values('id');
        // $book_id = $book_id->values('id');
        // foreach ($user_id as $key => $value) {
        //     # code...
        //     return $value->id;
        // }
        // foreach ($book_id as $key => $item) {
            # code...
            $create = BookRecord::create([
                'user_id' =>$user_id,
                'book_id' =>$book_id,
                'took_on' => $took_on,
                'returned_on' =>'0001-01-01 00:00:00',
                'due_date' => '0001-01-01',
            ]);
            return $create;
        // }
        
           
    }
    
}