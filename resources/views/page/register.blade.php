@extends('templates.layout')
@section('container')
<nav class="navbar" style="background-color: #2A3990">
  <div class="container-fluid">
    <a class="navbar-brand">
      <img src="/assets/img/Wikrama.png" alt="" width="50px">
    </a>
  </div>
</nav>  
<form method="POST" action="/register">
  @csrf
<div class="wow">
        <div class="mb-3">
          <center>
            <h4>Register Page</h4>
          </center>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Email</label>
          <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Insert Email" name="email">
          @error('email')
          <p class="text-danger fw-bold mt-2">
            {{ $message }}
          </p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="name" class="form-control" id="exampleInputUsername1" placeholder="Insert Name" name="name">
          @error('name')
          <p class="text-danger fw-bold mt-2">
            {{ $message }}
          </p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="Username" class="form-label">Username</label>
          <input type="username" class="form-control" id="exampleInputUsername1" placeholder="Insert Username" name="username">
          @error('username')
          <p class="text-danger fw-bold mt-2">
            {{ $message }}
          </p>
          @enderror
        </div> 
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Insert Password" name="password">
          @error('password')
          <p class="text-danger fw-bold mt-2">
            {{ $message }}
          </p>
          @enderror
        </div>    
        <button type="submit" class="btn btn-primary" id="pop">Submit</button><br><br>
        <center>
          <a href="/" class="coy">Back</a>
        </center>
    </div> 
</form>
@endsection
