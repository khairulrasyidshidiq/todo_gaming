
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="/assets/img/Wikrama.png" type="image/x-icon">
    <title>Todo Gaming</title>
</head>
<body>
    @if (Auth::check())
    <nav class="navbar navbar-expand-lg" style="background-color: #2A3990"` >
      <div class="oop">
        <a class="navbar-brand" href="/dashboard">
          <img src="/assets/img/Wikrama.png" alt="" width="50px">
        </a>
      </div>
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav align-items-center">
              <a class="nav-link text-white" href="/data">Data</a>
              <a class="nav-link text-white" href="/create">Create</a>
            </div>
          </div>
          <button class="btn btn-danger">
            <a class="nav-link " href="/logout">Logout</a>
          </button>
        </div>
      </nav>
      @endif
    @yield('container')
    @include('sweetalert::alert')
</body>
</html>