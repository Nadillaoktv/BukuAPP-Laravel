<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- asset() : mengambil file yang ada di folder public--}}
    <link rel="icon" href="{{ asset('assets/images/logo (2).jpg') }}">
    {{-- stack : content dinamis css/js (css-js tambahan selain bawaan boostrapnya) --}}
    @stack('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand {{ Route::is('home') ? 'active' : '' }}" href="/">Buku APP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="/">Dashboard</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Route::is('buku.tambah_buku') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Data Buku
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('buku.data') }}">Data Buku</a></li>
                  <li><a class="dropdown-item" href="{{ route('buku.tambah_buku') }}">Tambah</a></li>
                </ul>
              </li>


              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ route('pembaca.data')}}">Pembaca</a>
              </li>
            </ul>
        </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @stack('script')
</body>

</html>
