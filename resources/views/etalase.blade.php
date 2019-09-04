{{--  @extends('layouts.fronts')

@section('content')

@section('title')
Indeks Artikel | Etalase
@endsection  --}}

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
    <link rel="stylesheet" href="../css/etalase.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">
</head>

<body>

    <header>
        <!-- NAV BAR -->
        <div class="container-fluid p=0 align-content-center">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img src="../assets/logo-perpunas.png" width="33" height="30" class="d-inline-block align-top"
                        alt="">Indeks
                    Artikel
                </a>
                <div class="mr-auto">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Etalase</li>
                    </ol>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="../assets/menu-2x.png"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Beranda </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/etalase">Etalase<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('login')}}"}}>Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>


<main>
    <div class="search">
        <select class="box">
            <option value="">Semua Jenis</option>
            <option class="dropdown-item" href="#">Judul Edisi</option>
            <option class="dropdown-item" href="#">Judul Artikel</option>
            <option class="dropdown-item" href="#">Jenis</option>
            <option class="dropdown-item" href="#">Penerbit</option>
            <option class="dropdown-item" href="#">Tahun</option>
        </select>
        <input type="text" class="search-box" placeholder="Kata Kunci">
        <button type="submit" class="searchButton"><img src="../assets/magnifying-glass-2x.png">
        </button>
    </div>

    <div class="etalase-grid">
        @foreach ($titles as $title)
        <div class="section1">
            <!-- 286x180 -->
            <div class="card">
                <img class="card-img-top" src="storage/upload/{{ $title->featured_img }}" alt="">
                <div class="card-body">
                    <a class="card-title1" href="/etalase/{{ $title->id }}">{{ $title->title }}</a>
                    <br>
                    <a class="card-text" href="/etalase/{{ $title->id }}">{{ $title->first_year }}</a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <a href="/etalase/{{ $title->id }}"><td style="text-align: center">{{$articles->whereIn('edition_title_id',$editions->where('title_id',$title->id)->pluck('id'))->count()}} Artikel</td></a>

                </div>
            </div>
        </div>
        @endforeach
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
                    <p class="text-muted">Jl. Salemba Raya No.28A Jakarta 10430
                        <br>Email : <span>indeksartikel@perpusnas.go.id</span>
                        <br>No. Telepon : <span>(021) 929 209 79</span></p>
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
