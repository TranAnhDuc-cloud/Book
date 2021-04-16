@extends('admin.layouts.master')
@section('title','Edit')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sửa User
        <small>{{$user->username}}</small>
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('user.index')}}" class="btn btn-warning pt-2 pr-5 pl-5 pb-2">Trở Về Danh Sách</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (session('mess'))
                    <div class="alert alert-primary">
                        {{session('mess')}}
                    </div>
                @endif
                <form action="{{route('user.update',$user->id)}}" method="post">
                    @csrf
                    {{csrf_field()}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Firt Name</label>
                        <input type="text" name="firt_name" class="form-control" placeholder="{{$user->firt_name}}">
                        @error('firt_name')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="{{$user->last_name}}">
                        @error('last_name')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="{{$user->address}}">
                        @error('address')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> SupperUser </label>
                        <br>
                        <select name="superuser" id="superuser">
                            <option value="1" name="admin">Admin</option>
                            <option value="2" name="user">User</option>
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