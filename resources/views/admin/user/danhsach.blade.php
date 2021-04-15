@extends('admin.layouts.master')
@section('title','User')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản Lý User</h1>
    <p class="mb-4">Admin có thể thêm, sửa, xóa các users</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('user.add')}}" class="btn btn-warning pt-2 pr-5 pl-5 pb-2">Thêm User</a>
        </div>
        <div class="card-body " style="font-size: 13px">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>FirtName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Staff</th>
                            <th>Active</th>
                            <th>Data-Joined</th>
                            <th>SupperUser</th>
                            <th>Address</th>
                            
                        </tr>
                    </thead>                
                    <tbody>
                        <?php $i=1 ?>
                        @foreach ($data ?? ''  as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item ->id}}</td>
                            <td>{{$item ->username}}</td>
                            <td>{{$item ->firt_name}}</td>
                            <td>{{$item ->last_name}}</td>
                            <td>{{$item ->email}}</td>
                            <td>{{$item ->is_staff}}</td>
                            <td>{{$item ->is_active}}</td>
                            <td>{{$item ->data_joined}}</td>
                            <td>{{$item ->is_superuser}}</td>
                            <td>{{$item ->address}}</td>
                            <th><a href="{{route('user.edit',$item->id)}}" class="btn btn-primary">Edit</a></th>
                            <th><a href="{{route('user.delete',$item->id)}}" class="btn btn-danger">Remove</a></th>
                        </tr>
                        @endforeach
                        @if (session('mess'))
                        <div class="alert alert-primary">
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