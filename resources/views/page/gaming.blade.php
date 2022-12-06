@extends('templates.layout')
@section('container')
<nav class="navbar" style="background-color: #2A3990">
  <div class="container-fluid">
    <a class="navbar-brand">
      <img src="/assets/img/Wikrama.png" alt="" width="50px">
    </a>
  </div>
</nav>
<form action="{{ route('login-baru') }}" method="POST">
  @csrf
    <div class="back">
        <div class="mb-3">
          <center>
            <h4>Login Page</h4>
          </center>
        </div>
        <div class="mb-3">
          <label for="Username" class="form-label">Username</label>
          <input name="username" type="text" class="form-control" id="exampleInputUsername1" placeholder="Insert Username" >
          @error('username')
          <p class="text-danger fw-bold mt-2">
            {{ $message }}
          </p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Insert Password">
          @error('password')
          <p class="text-danger fw-bold mt-2">
            {{ $message }}
          </p>
          @enderror
        </div>    
        <button type="submit" class="btn btn-primary d-flex" id="pop">Submit</button><br>
        <center>
          <a href="/register" class="coy">Don't have account?</a> 
        </center>
    </div>
@if(session('error'))
<script>
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Masukkan username dan password dengan benar!',
})
</script>
@endif
@if(session('coy'))
<script>
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Silahkan login terlebih dahulu!',
})
</script>
@endif
</form>
@endsection

