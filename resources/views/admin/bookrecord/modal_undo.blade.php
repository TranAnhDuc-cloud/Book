{{-- Modal Rent Cho Thuê Sách --}}
<div class="modal fade" id="undoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thu Hồi Sách</h5>
        <div class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
        </div>
    </div>
    <div class="modal-body">
        <form action="{{route('bookrecord.undo',$data->id)}}" method="post">
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
                                        
                                        <td>Ngày Mượn</td>
                                        <td>
                                            <input type="date" id="took_on" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ngày Trả</td>
                                        <td>
                                            <input type="date" id="returned_on" class="form-control" />
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
    </div>
    
</div>
</div>
</div>