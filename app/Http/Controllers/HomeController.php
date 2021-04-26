<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookRecord;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = BookRecord::all();
        $book = Book::where('available',1)->get();
        $user = User::all();
        $count = $data->count();
        return view('admin.pages.home')->with(['data'=>$data,'count'=>$count,'book'=>$book,'user'=>$user]);
        // 
    }
}
