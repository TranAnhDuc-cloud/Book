@extends('admin.layouts.master')
@section('title','Edit')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sửa BookRecord
        {{$book->id}}
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('bookrecord.index')}}" class="btn btn-warning pt-2 pr-5 pl-5 pb-2">Trở Về Danh Sách</a>
        </div>
        @if ( Session::has('success') )
            <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
            @elseif ( Session::has('error') )
            <div class="alert alert-error text-center">{{ Session::get('error') }}</div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                @if (session('mess'))
                    <div class="alert alert-primary">
                        {{session('mess')}}
                    </div>
                @endif
                <form action="{{route('bookrecord.update',$book->id)}}" method="post">
                    @csrf
                    {{csrf_field()}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>User_id</label>
                        <input type="text" name="user_id" class="form-control" placeholder="{{$book->user_id}}">
                        @error('user_id')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Book_id</label>
                        <input type="text" name="book_id" class="form-control" placeholder="{{$book->book_id}}">
                        @error('book_id')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Took On</label>
                        <input type="text" name="took_on" class="form-control" placeholder="{{$book->took_on}}">
                        @error('took_on')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Returned On</label>
                        <input type="text" name="returnerd_on" class="form-control" placeholder="{{$book->returned_on}}">
                        @error('returnerd_on')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="text" name="due_date" class="form-control" placeholder="{{$book->due_date}}">
                        @error('due_date')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="form-control btn btn-primary" value="Sửa">
                    </div>
                </form>   
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection