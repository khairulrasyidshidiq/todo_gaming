@extends('templates.layout')
@section('container')

{{-- auth()->user()->username berguna untuk memanggil data spesifik yaitu username user yang sudah login --}}
<div class="awo">
      <h1 class="text-black">Selamat Datang di Halaman Dashboard!</h1>
      <b>
      Halo!, selamat datang {{ auth()->user()->username }}</b>
      <hr class="my-4">
      <b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
        deserunt mollit anim id est laborum.</b>
    </div>
    @if(session('gaming'))
    <script>
      Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Kamu sudah login!',
    })
    </script>
    @endif
    @if(session('oop'))
    <script>
      Swal.fire({
      icon: 'success',
      title: 'Success',
      text: 'Login berhasil!',
    })
    </script>
    @endif
@endsection