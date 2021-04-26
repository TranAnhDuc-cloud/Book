@extends('admin.layouts.master')
@section('title','Book')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản Lý BookRecord</h1>
    <p class="mb-4">Admin có thể thêm, sửa, xóa các BookRecords</p>

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
            <a href="{{route('bookrecord.add')}}" class="btn btn-info pt-2 pr-5 pl-5 pb-2"><i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>Thêm BookRecord</a>
           <a class=" btn btn-success pt-2 pr-5 pl-5 pb-2" href="" data-toggle="modal" data-target="#rentModal">Cho Mượn
            </a>

          
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
                            <th>User_id
                                <a href="{{route('bookrecord.user.up')}}"><i class="fas fa-arrow-up ml-2"></i></a>
                                <a href="{{route('bookrecord.user.down')}}"><i class="fas fa-arrow-down"></i></a>
                            </th>
                            <th>Book_id
                                <a href="{{route('bookrecord.book.up')}}"><i class="fas fa-arrow-up ml-2"></i></a>
                                <a href="{{route('bookrecord.book.down')}}"><i class="fas fa-arrow-down"></i></a>
                            </th>
                            <th>User</th>
                            <th>Book</th></th>
                            <th>Took_on</th>
                            <th>Returned On</th>
                            <th>Due Date</th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                            
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
                                    <td>{{$row->title}}</td>
                                @endif
                            @endforeach

                             @foreach ($user ?? '' as $item)
                                @if ($row->user == $item->user_id)
                                    <td>{{$row ->firt_name}}</td>
                                @endif
                             @endforeach

                            <td>{{$item ->took_on}}</td>
                            <td>{{$item ->returned_on}}</td>
                            <td>{{$item ->due_date}}</td>
                            
                            <th><a href="{{route('bookrecord.edit',$item->id)}}" class="btn btn-primary">Edit</a></th>
                            <th><a href="{{route('bookrecord.delete',$item->id)}}" class="btn btn-danger">Remove</a></th>
                            <th><a href="{{route('bookrecord.delete',$item->id)}}" class="btn btn-success">Thu Hồi</a></th>

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

@section('modalRent')
    @include('admin.bookrecord.modal_rent')
@endsection