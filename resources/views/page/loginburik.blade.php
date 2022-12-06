<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <br>
    {{-- menampilkan pesan yg dikirim dari with yg statusnya successRegister --}}
    @if (session('successRegister'))
        <p style="color: red">{{ session('successRegister') }}</p>
    @endif
    <form action="{{ route('login-baru') }}" method="POST">
        @csrf
        Email <input type="email" name="email" placeholder="Masukan Email">
        <br>
        Password <input type="password" name="password" placeholder="Masukan Password">
        <br>

        <button type="submit">Login</button>
        <br>

    </form>
</body>
</html>