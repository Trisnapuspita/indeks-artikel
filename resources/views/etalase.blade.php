@extends('layouts.fronts')

@section('content')

@section('title')
Indeks Artikel | Etalase
@endsection

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
                    <a href="/etalase/{{ $title->id }}">(100 Artikel)</a>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</main>
@endsection
