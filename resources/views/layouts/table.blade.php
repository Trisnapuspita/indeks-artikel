<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/0543565c6e.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style-admin.css">
    <link rel="stylesheet" href="../../css/grid.css">
    <link rel="shortcut icon" href="../../img/pnri-logo-76.png">
    <!-- datatable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js">
</head>

<body>
    <header>
        <!-- NAV BAR -->
        <div class="container-fluid p=0 align-content-center">
		 @if (Route::has('login'))
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img src="../../assets/logo-perpunas.png" width="33" height="30" class="d-inline-block align-top"
                        alt="">Indeks
                    Artikel
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="../../assets/menu-bar.png"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/home">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/displays/etalase">Etalase</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"
                                    style="padding-right:5px;color:whitesmokes;display: inline"></i>{{ __('Login') }}</a>
                        </li>
						@else
						<li class="nav-item dropdown">
                            <div class="dropdown">
                                <a href="#" class="nav-link">Setting Master
                                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i></a>
                                <div class="dropdown-content">
                                    <a href="/types" style="width: 100%">Jenis</a>
                                    <a href="/times" style="width: 100%">Kala Terbit</a>
                                    <a href="/languages" style="width: 100%">Bahasa</a>
                                    <a href="/formats" style="width: 100%">Format</a>
                                    <a href="/statuses" style="width: 100%">Status Ketersediaan</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <a href="#" class="nav-link">Sumber
                                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i></a>
                                <div class="dropdown-content">
                                    <a href="/titles" style="width: 100%">Judul</a>
                                    <a href="/editions" style="width: 100%">Edisi</a>
                                    <a href="/articles" style="width: 100%">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/reports">Laporan Kinerja Karyawan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    {{ Auth::user()->name }}
                                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i></a>
                                <div class="dropdown-content">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" style="width: 100%">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
						@endguest
                    </ul>
                </div>
			@endif
            </nav>
        </div>
    </header>
        <!--END MENU SECTION -->

        <!--PAGE CONTENT -->
        @yield('content')

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
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

@yield('scripts')
