@extends('templates.layout')

@section('container')
<div class="huu">
<form action="/update/{{ $todo['id'] }}" method="POST" style="max-width: 500px; margin: auto;">
    @csrf
    {{-- karena attribute method pada tag form cuman bisa get atau post sedangkan buat update data itu 
    pake method patch jadi method post di form ditimpa sama method patch ini --}}
    @method('patch')
    <div class="d-flex flex-column">
        <label>Title</label>
        {{-- attribute value berfungsi untuk menampilkan data di inputnya, data yang ditampilin
        merupakan data yang diambil di controller dan dikirim input compact tadi --}}
        <input type="text" name="title" value="{{ $todo['title'] }}">
        @error('title')
      <p class="text-danger fw-bold mt-2">
        {{ $message }}
      </p>
      @enderror
    </div>
    <div class="d-flex flex-column">
        <label>Date</label>
        <input type="date" name="date" value="{{ $todo['date'] }}">
        @error('date')
      <p class="text-danger fw-bold mt-2">
        {{ $message }}
      </p>
      @enderror
    </div>
    <div class="d-flex flex-column">
        <label>Description</label>
        {{-- kenapa textarea gapunya attribute value? karena textarea bukan termasuk tag input/select 
        dan dia punya penutup text --}}
        <textarea name="description" cols="30" rows="10">{{ $todo['description'] }}</textarea>
        @error('description')
      <p class="text-danger fw-bold mt-2">
        {{ $message }}
      </p>
      @enderror
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
</div>
@endsection