@extends('admin.layouts.master')
@section('title','Add')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thêm User</h1>
    <div class="card shadow mb-4">
        
        <div class="card-header py-3">
            <a href="{{route('user.index')}}" class="btn btn-warning pt-2 pr-5 pl-5 pb-2">Trở Về Danh Sách</a>
            @if ( Session::has('success') )
            <div class="alert alert-success text-center mt-2">{{ Session::get('success') }}</div>
            @elseif(Session::has('error'))
            <div class="alert alert-warning text-center mt-2">{{ Session::get('error') }}</div>
            @endif
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('user.show')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Nhập Username">
                        @error('username')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Nhập Password">
                        @error('password')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Nhập Lại Password</label>
                        <input type="password" name="password_confirmed" class="form-control" placeholder="Nhập Lại Password">
                        @error('password_confirmed')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Firt Name</label>
                        <input type="text" name="firt_name" class="form-control" placeholder="Nhập Firt Name">
                        @error('firt_name')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Nhập Last Name">
                        @error('last_name')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Nhập Email">
                        @error('email')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Data Joined</label>
                        <input type="date"  name="data_joined" class="form-control" placeholder="Nhập Data Joined">
                        @error('data_joined')
                        <small class="form-text text-muted alert alert-danger ">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Nhập Address">
                        @error('address')
                        <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Staff</label>
                        <br>
                        <select name="is_staff" id="is_staff">
                            <option value="1" name="staff_yes">Yes</option>
                            <option value="0" name="staff_no">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Active</label>
                        <br>
                        <select name="is_active" id="is_active">
                            <option value="1" name="is_active_yes">Yes</option>
                            <option value="0" name="is_active_no">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SupperUser</label>
                        <br>
                        <select name="is_superuser" id="is_superuser">
                            <option value="1" name="admin">Admin</option>
                            <option value="0" name="user">User</option>
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