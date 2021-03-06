@extends('admin.layouts.master')
@section('title','Add')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thêm BookRecord</h1>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <a href="{{route('bookrecord.index')}}" class="btn btn-warning pt-2 pr-5 pl-5 pb-2">Trở Về Danh Sách</a>
            @if ( Session::has('success') )
            <div class="alert alert-success text-center mt-2">{{ Session::get('success') }}</div>
            @elseif ( Session::has('error') )
            <div class="alert alert-error text-center mt-2">{{ Session::get('error') }}</div>
            @endif
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('bookrecord.show')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>User ID</label>
                        <input type="number"  name="user_id" class="form-control" placeholder="Nhập User ID">
                        @error('user_id')
                            <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Book ID</label>
                        <input type="number" min="1" max="100" name="book_id" class="form-control" placeholder="Nhập Book ID">
                        @error('book_id')
                            <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Took On</label>
                        <input type="date"  name="took_on" class="form-control" placeholder="Nhập Took On">
                        @error('took_on')
                            <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Returned On</label>
                        <input type="date"  name="returned_on" class="form-control" placeholder="Nhập Returned On">
                        @error('returned_on')
                            <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date"  name="due_date" class="form-control" placeholder="Nhập Due Date">
                        @error('due_date')
                            <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="form-control btn btn-primary" value="Thêm">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection