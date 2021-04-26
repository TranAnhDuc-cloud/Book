@extends('admin.layouts.master')
@section('title','Edit')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sửa BookRecord
        {{$book->id}}
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('bookrecord.index')}}" class="btn btn-warning pt-2 pr-5 pl-5 pb-2">Trở Về Danh Sách</a>
        </div>
        @if ( Session::has('success') )
            <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
            @elseif ( Session::has('error') )
            <div class="alert alert-error text-center">{{ Session::get('error') }}</div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                @if (session('mess'))
                    <div class="alert alert-primary">
                        {{session('mess')}}
                    </div>
                @endif
            </div>
            <form action="{{route('bookrecord.update',$book->id)}}" method="post">
                @csrf
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="container" style="padding-top:20px">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>User_id</td>
                                            <td>
                                                <input type="text" name="user_id" class="form-control" placeholder="{{$book->user_id}}">
                                                @error('user_id')
                                                <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Book_id</td>
                                            <td>
                                                <input type="text" name="book_id" class="form-control" placeholder="{{$book->book_id}}">
                                                @error('book_id')
                                                <small class="form-text text-muted alert alert-danger">{{$message}}</small>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Took_on</td>
                                            <td>
                                                <input type="date" id="took_on" name="took_on" class="form-control" placeholder="{{$book->took_on}}" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Returned_on</td>
                                            <td>
                                                <input type="date" id="returned_on" name="returned_on" class="form-control" placeholder="{{$book->returned_on}}" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Due Date</td>
                                            <td>
                                                <input type="date" id="due_date" name="due_date" class="form-control" placeholder="{{$book->due_date}}" />
                                            </td>
                                        </tr>
                                       
                                    </table>
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="form-control btn btn-primary" value="Sửa">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script>
    $(function() {
        'use strict';
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#timeCheckIn').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('#timeCheckOut')[0].focus();
        }).data('datepicker');
        var checkout = $('#timeCheckOut').datepicker({
            onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            checkout.hide();
        }).data('datepicker');
    });
</script>
@endsection