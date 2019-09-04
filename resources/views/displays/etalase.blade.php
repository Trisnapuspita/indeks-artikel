@extends('layouts.fronts')

@section('content')

@section('title')
Indeks Artikel | Etalase
@endsection

<main style="height: 100%; padding:45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Etalase</li>
            </ol>
        </div>
        <div class="search">
            <select class="box">
                <option value="">Semua Jenis</option>
                <option class="dropdown-item" href="#">Judul Edisi</option>
                <option class="dropdown-item" href="#">Judul Artikel</option>
                <option class="dropdown-item" href="#">Jenis</option>
                <option class="dropdown-item" href="#">Penerbit</option>
                <option class="dropdown-item" href="#">Judul Artikel</option>
            </select>
            <input type="text" class="search-box" placeholder="Kata Kunci">
            <button type="submit" class="searchButton"><img src="../../assets/magnifying-glass-2x.png">
            </button>
        </div>
        <div class="etalase-grid">
                @foreach ($titles as $title)
                <div class="section1">
                    <!-- 286x180 -->
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/upload/'.$title->featured_img) }}" alt="">
                        <div class="card-body">
                            <a class="card-title1" href="/displays/etalase/{{ $title->id }}">{{ $title->title }}</a>
                            <br>
                            <a class="card-text" href="/displays/etalase/{{ $title->id }}">{{ $title->first_year }}</a>
                            <br>
                            <br>
                            <br>
                            <br>
                            <a href="/displays/etalase/{{ $title->id }}">{{$articles->whereIn('edition_title_id',$editions->where('title_id',$title->id)->pluck('id'))->count()}} Artikel</a>

                        </div>
                    </div>
                </div>
                @endforeach
        </div>
</main>
@endsection
