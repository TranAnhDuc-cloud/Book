@extends('admin.layouts.master')
@section('title','Edit')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sửa Book
        
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('book.index')}}" class="btn btn-warning pt-2 pr-5 pl-5 pb-2">Trở Về Danh Sách</a>
        </div>
        {{-- @if ( Session::has('success') )
            <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
            @elseif ( Session::has('error') )
            <div class="alert alert-error text-center">{{ Session::get('error') }}</div>
        @endif --}}
        <div class="card-body">
            <div class="table-responsive">
                @if (session('mess'))
                    <div class="alert alert-primary">
                        {{session('mess')}}
                    </div>
                @endif
                <form action="{{route('book.update',$book->id)}}" method="post">
                    @csrf
                    {{csrf_field()}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="{{$book->title}}">
                        @error('title')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" placeholder="{{$book->author}}">
                        @error('author')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="{{$book->description}}">
                        @error('description')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="text" name="image" class="form-control" placeholder="{{$book->image}}">
                        @error('image')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" name="ISBN" class="form-control" placeholder="{{$book->ISBN}}">
                        @error('ISBN')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Available </label>
                        <br>
                        <select name="available" id="available">
                            <option value="1" name="available_yes">Yes</option>
                            <option value="0" name="available_no">No</option>
                        </select>
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