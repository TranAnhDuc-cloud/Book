<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function index(){
        $data = DB::table('books')->select(['*'])->get();
        $book = Book::all();
        $count = $data->count();
        return view('admin.book.danhsach',['book'=>$data],['count'=>$count],['books'=>$book]);
    }
    public function create(array $book){
        return Book::create([
            'title'=>$book['title'],
            'author'=>$book['author'],
            'description'=>$book['description'],
            'image'=>$book['image'],
            'available'=>$book['available'],
            'ISBN'=>$book['isbn'],
        ]);
    }
    public function add(){
        return view('admin.book.add');
    }
    public function addShow(BookRequest $request){
        $allRequest = $request->all();
        $validated = $request->validated($allRequest);
        if($this->create($validated)){
            return redirect()->route('book.index')->with(['success','Thêm Book Thành Công']);
        }else{
            return redirect()->route('book.index')->with(['error','Thêm Book Thất Bại']);
        }
    }
    public function edit($id){
        $book = Book::find($id);
        return view('admin.book.edit',['book'=>$book]);
    }
    public function update(Request $request,$id){
        $book = Book::find($id);
        try {
            //code...
            if(isset($request->title)){
                $book->title = $request->title;
            }else{
                if(isset($request->author)){
                    $book->author = $request->author;
                }else{
                    if(isset($request->description)){
                        $book->description = $request->description;
                    }else{
                        if(isset($request->available)){
                            $book->available = $request->available;
                        }else{
                            if(isset($request->ISBN)){
                                $book->ISBN = $request->ISBN;
                            }
                        }
                    }
                }   
            }
            $book->save();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('book.edit',$id);
        }
        return redirect()->route('book.edit',$id)->with('mess','Bạn Đã Sửa : '.$book->title.' Thành Công ');
    }
    // 
    public function delete($id){
        $book = Book::find($id);
        if($book != null){
            $book->delete();
            return redirect()->route('book.index')->with(['mess'=>'Bạn Đã Xóa : '.$book->title.' Thành Công ']);
        }
        return redirect()->route('book.index')->with(['mess'=>'Bạn Đã Xóa : '.$book->title.' Thất Bại ']);
    }
    public function sort(){
        $book = Book::get()->sortBy('author', 'ASC');
        // $book= Book::all();
        // $book = Book::orderBy('available','asc')->get();
        if($book!= null){
            return redirect()->route('book.index')->with(['book'=>$book]);
        }
    }
    public function search(Request $request){
        $name = $request['book_id'];
        $book = Book::all()->where('id',$name);
        return view('admin.book.search')->with(['book'=>$book]);
    }

}
