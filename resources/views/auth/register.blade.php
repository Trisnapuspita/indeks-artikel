<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/0543565c6e.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indeks Artikel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/konten-login.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">
</head>

<body>

    <header>
        <!-- NAV BAR -->
        <div class="container-fluid p=0 align-content-center">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="/">
                    <img src="../img/logo-perpunas.png" width="33" height="30" class="d-inline-block align-top"
                        alt="">Indeks Artikel /
                </a>
                <div class="mr-auto">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="../img/menu-2x.png"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                @guest
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/etalase">Etalase</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}"><i class="fas fa-sign-in-alt"
                                    style="padding-right:5px;color:whitesmokes;display: inline"></i>Login</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                    </ul>
                @endguest
                </div>
            </nav>
        </div>
    </header>


    <main>
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <h1 class="text-center signin">{{ __('Register') }}</h1>
                    <form method="POST" class="form-container" ACTION="{{ route('register') }}">
                    @csrf
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name')}}" required autocomplete="name" autofocus placeholder="Masukkan Username">

                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                        <div class="form-group">
                            <label for="longname">Nama Lengkap</label>
                            <input id="longname" type="text" class="form-control @error('longname') is-invalid @enderror" name="longname" value="{{ old('longname') }}" required autocomplete="longname" autofocus
                            placeholder="Enter Full Name">
                                    @error('longname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Masukkan email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                                    placeholder="Masukkan Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Masukkan Password Lagi">
                        </div>

                        <button type="submit" class="btn btn-primary"><strong>
                                    {{ __('Register') }}
                                </strong></button>
                        <br><br>
                        <span>Sudah mendaftar? </span><a href="{{route('login')}}">Login</a>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container-fluid p-0">
            <div class="row text-left">
                <div class="col-md-7 col-sm-3">
                    <h4 class="text-light">Tentang Kami</h4>
                    <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, enim maiores
                        perspiciatis incidunt fuga laudantium fugit provident libero maxime natus accusantium soluta,
                        quaerat velit voluptatibus animi reiciendis! Labore, omnis dicta.</p>
                    <h4 class="text-light">Kontak</h4>
                    <p class="text-muted">Jl. Medan Merdeka Selatan No.11, RT.11/RW.2, Gambir, Kec. Senen, Kota Jakarta
                        Pusat, Daerah Khusus Ibukota Jakarta 10110
                        <br> No. Telepon : <span>081214555428</span></p>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div id="map-container" class="z-depth-1-half map-container mb-5" style="height: 400px"></div>
                </div>
    </footer>
</body>

</html>

<!-- SCRIPT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/js/mdb.min.js"></script>
<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js"></script>
<script>
    function regular_map() {
        var var_location = new google.maps.LatLng(-6.198965157647501, 106.85228106148975);

        var var_mapoptions = {
            center: var_location,
            zoom: 20
        };

        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);

        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
            title: "Perpunas salemba"
        });
    }
    google.maps.event.addDomListener(window, 'load', regular_map);
</script>
