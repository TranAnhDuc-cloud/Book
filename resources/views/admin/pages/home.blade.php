@extends('admin.layouts.master')
@section('title','Home | Admin')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản Lý BookRecord</h1>
    

    <!-- DataTales Example -->
    <form action="{{route('bookrecord.search')}}" method="post">
        @csrf
        <div class="form-group row ">
            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('BookRecord ID') }}</label>
            <div class="col-md-6">
                <input id="bookrecord_id" class="form-control" name="bookrecord_id" type="number" value="{{ old('bookrecord_id') }}" placeholder="BookRecord ID" required>
                @if ($errors->has('bookrecord_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('bookrecord_id') }}</strong>
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
            <div class="btn btn-primary">Danh Sách Người Mượn</div>
        </div>
        @if ( Session::has('success') )
        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
        @elseif ( Session::has('error') )
        <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
        @endif
        <div class="card-body" style="font-size: 10px">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>User_id
                                <a href="{{route('bookrecord.user.up')}}"><i class="fas fa-arrow-up ml-2"></i></a>
                                <a href="{{route('bookrecord.user.down')}}"><i class="fas fa-arrow-down"></i></a>
                            </th>
                            <th>Book_id
                                <a href="{{route('bookrecord.book.up')}}"><i class="fas fa-arrow-up ml-2"></i></a>
                                <a href="{{route('bookrecord.book.down')}}"><i class="fas fa-arrow-down"></i></a>
                            </th>
                            <th>Book</th>
                            <th>Username</th></th>
                            <th>Took_on</th>
                            <th>Returned On</th>
                            <th>Due Date</th>                  
                        </tr>
                    </thead>                
                    <tbody>
                        <?php $i=1 ?>
                        @foreach ($data ?? ''  as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item ->id}}</td>
                            <td>{{$item ->user_id}}</td>
                            <td>{{$item ->book_id}}</td>
                            @foreach ($book ?? '' as $row)
                                @if ($row->id == $item->book_id)
                                    <td>{{$row->title ?? ""}}</td>
                                @endif
                            @endforeach
                             @foreach ($user ?? '' as $row)
                                @if ($row->id == $item->user_id)
                                    <td>{{$row->username}}</td>
                                @endif
                             @endforeach
                            <td>{{$item ->took_on}}</td>
                            <td>{{$item ->returned_on}}</td>
                            <td>{{$item ->due_date}}</td>                                                     
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
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ trans('book.title') }}</h1>
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
            <div class="btn btn-primary">Danh Sách Book </div>
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

