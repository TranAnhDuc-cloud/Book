{{-- Modal Rent Cho Thuê Sách --}}
<script type="text/javascript">
    $('select').select2();
    $(document).ready(function() {
  $(".js-example-basic-single").select2();
  // Thêm các tùy chọn của bạn vào đây.
});
</script>

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
                <select name="title" id="title"  class="form-control" style=" margin: 5px 5px">
                @foreach ($book ?? '' as $row)
                        <option >{{$row->title}}</option>
                @endforeach
                </select>
           </div>
           
            <div class="select-rent  mx-auto">
                <label for=""> Người Mượn</label> 
                <select name="username" id="name" class="form-control" style="margin: 20px 0px">
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