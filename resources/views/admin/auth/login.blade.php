@if (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error')}}</div>
@endif
<br>
<form action="{{route('login.show')}}" method="post">
    @csrf
    <label for="">Username</label>
    <input type="text" placeholder="Nhập Username" name="username">
<br>
@if (Session::has('mess-user'))
    <div class="alert alert-danger">{{Session::get('mess-user')}}</div>
@endif
<br>
    <label for="">password</label>
    <input type="password" placeholder="Nhập Password" name="password">
<br>
@if (Session::has('mess-pass'))
    <div class="alert alert-danger">{{Session::get('mess-pass')}}</div>
@endif
<br>
    <input type="submit" value="Login">
</form>