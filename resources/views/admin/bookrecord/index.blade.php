@extends('admin.layouts.master')
@section('title','BookRecord')
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
            <a href="{{route('bookrecord.add')}}" class="btn btn-info pt-2 pr-5 pl-5 pb-2">Thêm BookRecord</a>
           <a class=" btn btn-success pt-2 pr-5 pl-5 pb-2" href="" data-toggle="modal" data-target="#rentModal">Cho Mượn
            </a>

          
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
                            
                            <th><a href="{{route('bookrecord.edit',$item->id)}}" style="font-size: 12px" class="btn btn-primary">Edit</a></th>
                            <th><a href="{{route('bookrecord.delete',$item->id)}}" style="font-size: 12px" class="btn btn-danger">Remove</a></th>
                            <th><a href="{{route('bookrecord.undo',$item->id)}}"  style="font-size: 12px" class="btn btn-success">Thu Hồi</a></th>
                            {{-- <th>
                                <a class=" btn btn-success" style="font-size: 12px" href="" data-toggle="modal" data-target="#undoModal">Thu Hồi
                                </a>
                                
                            </th> --}}
                        </tr>
                        @endforeach
                        @if (session('mess'))
                        <div class="alert alert-success">
                            {{session('mess')}}
                        </div>
                        @endif

                    </tbody>
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@section('modalRent')
  {{-- Modal Rent Cho Thuê Sách --}}
  <script type="text/javascript">
    // $('select').select2();

    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
  </script>
  <script src="{{asset('js/select2.min.js')}}"></script>
@foreach ($data ?? ''  as $item)
<div class="modal fade" id="rentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cho Mượn Sách</h5>
        <div class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
        </div>
    </div>
    <div class="modal-body">
       {{-- <option value="">{{$datas->id}}</option> --}}
       {{-- {{route('bookrecord.rent',[$datas->id,$item->id]) --}}
        <form action="{{route('bookrecord.rent')}}" method="post">
            @csrf
            
            {{csrf_field()}}
            <input type="hidden" name="_token" value="{{csrf_token()}}">   
           <div class="select-rent mx-auto">
                <label for="" class=""> Sách</label> 
                <select name="title" id="title"  class="js-example-basic-single form-control" style=" margin: 5px 5px">
                @foreach ($book ?? '' as $row)
                        <option >{{$row->title}}</option>
                @endforeach
                </select>
           </div>
           
            <div class="select-rent  mx-auto">
                <label for=""> Người Mượn</label> 
                <select name="username" id="name"  class="js-example-basic-single form-control" style="margin: 20px 0px">
                @foreach ($user ?? '' as $row)
                        <option>{{$row->username}}</option>
                        
                @endforeach
                </select>
            
            </div>
            <div class="form-group">
            Ngày Mượn
            <input type="date"  name="took_on" class="form-control">
            @error('took_on')
                <small class="form-text text-muted alert alert-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group" style="margin-left:200px; ">
            <input class="btn btn-info" type="submit" name="submit" value="Submit">
        </div>
        </form>
       
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
       
    </div>
</div>
</div>
</div>
@endforeach
@endsection
@section('modalUndo')
@endsection