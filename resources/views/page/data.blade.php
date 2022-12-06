@extends('templates.layout')

@section('container')
<div class="container mt-5 pb-3" >
    <div class="oii mb-5">
        <h3 class="">Daftar Todo</h3>
    </div>
    <table class="table table-striped table-bordered" style="background-color: #009EFF">
        <tr>
            <td>No</td>
            <td>Kegiatan</td>
            <td>Deskripsi</td>
            <td>Batas Waktu</td>
            <td>Waktu Selesai</td>
            <td>Status</td>
            <td>Aksi</td>
        </tr>
        @php
           $no= 1; 
        @endphp
        @foreach ($todos as $todo)
        <tr>
            {{-- tiap di looping, $no bakal ditambah 1  --}}
            <td>{{ $no++ }}</td>
            <td>{{ $todo['title'] }}</td>
            <td>{{ $todo['description'] }}</td>            
            {{-- Carbon : package date pada laravel, nantinya si date yang 2022-11-22 formatnya jadi 22 November, 2022 --}}
            <td>{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</td>
            @if ($todo['done_time'] == null)
                <td>Belum Selesai</td>
                @else 
                <td>{{ \Carbon\Carbon::parse($todo['done_time'])->format('j F, Y') }}</td>
            @endif  
            {{-- konsep ternary, if statusnya 1 nampilin teks complated kalo 0 nampilin teks on-process, status tuh boolean kan? cmn antara 1 atau 0 --}}
            <td>{{ $todo['status'] ? 'Complated' : 'On-process' }}</td>   
            <td class="d-flex">
                {{-- karena path {$id} merupakan path dinamis, jadi kita harus isi path dinamis tersebut, karena kita
                mengisinya dengan data dinamis/data dari database jadi buat isinya pake string kurawal dua kali --}}
                @if ( $todo['status'] == 0)
                <a href="/edit/{{ $todo['id'] }}" class="btn btn-primary">Edit</a> 
                @endif
                <form action="/delete/{{ $todo['id'] }}" method="POST">
                    @csrf
                    {{-- menimpa method="POST" karena di routenya menggunakan method delete --}}
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                @if ( $todo['status'] == 0 )
                <form action="/complated/{{ $todo['id'] }}" method="POST">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-warning text-white">Done</button>
                </form> 
                @endif
            </td>    
        </tr>
        @endforeach     
    </table>
</div>
@if(session('wow'))
<script>
  Swal.fire({
  icon: 'success',
  title: 'Done!',
  text: 'Todo telah selesai dikerjakan!',
})
</script>
@endif
@if(session('op'))
<script>
  Swal.fire({
  icon: 'success',
  title: 'Success!',
  text: 'Data berhasil diupdate!',
})
</script>
@endif
@if(session('ol'))
<script>
  Swal.fire({
  icon: 'warning',
  title: 'Success!',
  text: 'Data berhasil dihapus!',
})
</script>
@endif
@if(session('abc'))
<script>
  Swal.fire({
  icon: 'success',
  title: 'Success!',
  text: 'Data berhasil dibuat!',
})
</script>
@endif
@endsection