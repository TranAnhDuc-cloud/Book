{{-- Modal Rent Cho Thuê Sách --}}
@extends('admin.layouts.master')
@section('title','Edit')
@section("content")
            <form action="{{route('bookrecord.thuhoi',$id->id)}}" method="post">
                @csrf
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="container" style="padding-top:20px">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>Ngày Trả</td>
                                            <td>
                                                <input type="date" id="returned_on" name="returned_on" class="form-control"  />
                                            </td>
                                        </tr>
                                    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input class="btn btn-primary" value="Thu Hồi" type="submit">
                </div>
            </form>
@endsection


