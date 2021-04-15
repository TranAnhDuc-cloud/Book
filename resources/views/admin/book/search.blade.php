@extends('admin.layouts.master')
@section('title','Book')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản Lý Book</h1>
    <p class="mb-4">Admin có thể thêm, sửa, xóa các Books</p>

    <!-- DataTales Example -->
    <form action="{{route('book.search')}}" method="post">
        @csrf
        <div class="form-group row ">
            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Book ID') }}</label>
            <div class="col-md-6">
                <input id="book_id" class="form-control" name="book_id" type="number" value="{{ old('book_id') }}" placeholder="Book ID" required>
                @if ($errors->has('book_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('book_id') }}</strong>
                    </span>
                @endif
            </div>
            <div >
                <button type="submit" class="btn btn-primary">
                    {{ __('Search') }}
                </button>
            </div>
        </div>
    </form>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('book.add')}}" class="btn btn-warning pt-2 pr-5 pl-5 pb-2">Thêm Book</a>
            <a href="{{route('book.sort')}}" class="btn btn-warning pt-2 pr-5 pl-5 pb-2">Sắp Xếp</a>
          
        </div>
        
        @if ( Session::has('success') )
        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
        @elseif ( Session::has('error') )
        <div class="alert alert-error text-center">{{ Session::get('error') }}</div>
        @endif
        <div class="card-body" style="font-size: 13px">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Available</th>
                            <th>ISBN</th>
                        </tr>
                    </thead>                
                    <tbody>
                        <?php $i=1 ?>
                        @foreach ($book ?? ''  as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item ->id}}</td>
                            <td>{{$item ->title}}</td>
                            <td>{{$item ->author}}</td>
                            <td>{{$item ->description}}</td>
                            <td>{{$item ->image}}</td>
                            <td>{{$item ->available}}</td>
                            <td>{{$item ->ISBN}}</td>
                            <th><a href="{{route('book.edit',$item->id)}}" class="btn btn-primary">Edit</a></th>
                            <th><a href="{{route('book.delete',$item->id)}}" class="btn btn-danger">Remove</a></th>
                        </tr>
                        @endforeach
                        @if (session('mess'))
                        <div class="alert alert-success">
                            {{session('mess')}}
                        </div>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection