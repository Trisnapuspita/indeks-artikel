<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indeks Artikel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/konten-menu.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">

</head>

<body>

    <header>
        <!-- NAV BAR -->
        <div class="container-fluid p=0 align-content-center">
        @if (Route::has('login'))
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img src="../img/logo-perpunas.png" width="33" height="30" class="d-inline-block align-top"
                        alt="">Indeks Artikel
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="../img/menu-2x.png"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="etalase.html">Etalase IA</a>
                        </li>
                        @auth
                        <li class=" nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                        @else
                        <li class=" nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                        @endauth
                    </ul>
                </div>
                @endauth
            </nav>
        </div>

        <!-- CONTENT -->
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12 col-md-7">
                    <h6>Perpustakaan Nasional Republik Indonesia</h6>
                    <h1>INDEKS ARTIKEL</h1>
                    <div class="form-search-wrap mb-3">
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-12 col-xl-6">
                                    <input type="text" class="form-control rounded"
                                        placeholder="What are you looking for?">
                                </div>
                                <div class="col-lg-12 col-xl-4">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control rounded" name="" id="">
                                            <option value="">--Semua Jenis--</option>
                                            <option value="">Judul Sumber</option>
                                            <option value="">Judul Edisi</option>
                                            <option value="">Judul Artikel</option>
                                            <option value="">Jenis</option>
                                            <option value="">Penerbit</option>
                                            <option value="">Tahun Terbit Pertama</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-xl-1">
                                    <input type="submit" class="btn btn-primary btn-block rounded" value="Telusuri">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
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
                </div>s
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