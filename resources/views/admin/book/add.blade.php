@extends('admin.layouts.master')
@section('title','Add')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thêm Book</h1>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <a href="{{route('book.index')}}" class="btn btn-warning pt-2 pr-5 pl-5 pb-2">Trở Về Danh Sách</a>
            {{-- @if ( Session::has('success') )
            <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
            @elseif ( Session::has('error') )
            <div class="alert alert-error text-center">{{ Session::get('error') }}</div>
            @endif --}}
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('book.show')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Nhập Title">
                        @error('title')
                            <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Nhập Author">
                        @error('author')
                            <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Nhập Description">
                        @error('description')
                            <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="text" name="image" class="form-control" placeholder="Nhập Images">
                        @error('image')
                            <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text"  name="isbn" class="form-control" placeholder="Nhập ISBN">
                        @error('isbn')
                            <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Available</label>
                        <br>
                        <select name="available" id="available">
                            <option value="1" name="available_yes">Yes</option>
                            <option value="0" name="available_no">No</option>
                        </select>
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