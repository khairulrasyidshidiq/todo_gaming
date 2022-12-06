@extends('templates.layout')

@section('container')
<div class="huu">
    <form action="/store" method="POST" style="max-width: 500px; margin: auto;">
        @csrf
        <div class="d-flex flex-column">
            <label class="fw-bold pb-2">Title</label>
            <input type="text" name="title">
            @error('title')
          <p class="text-danger fw-bold mt-2">
            {{ $message }}
          </p>
          @enderror
        </div>
        <div class="d-flex flex-column pt-2">
            <label class="fw-bold pb-2">Date</label>
            <input type="date" name="date">
            @error('date')
          <p class="text-danger fw-bold mt-2">
            {{ $message }}
          </p>
          @enderror
        </div>
        <div class="d-flex flex-column pt-2">
            <label class="fw-bold pb-2">Description</label>
            <textarea name="description" cols="30" rows="10"></textarea>
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