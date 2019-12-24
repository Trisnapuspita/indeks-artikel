@extends('layouts.fronts')

@section('content')

@section('title')
Indeks Artikel | Etalase
@endsection

<main style="height: 100%; padding:45px">
        <div class="search">
                <form method="get" action="/etalase">
                <input type="text" class="search-box" placeholder="Kata Kunci" name="search" id="search">
                <button type="submit" class="searchButton"><img src="../../img/magnifying-glass-2x.png">
                </button>
                </form>

        </div>
        <div class="row">
            @foreach ($titles as $title)
                <div class="col-6 col-md-3" style="padding:5px">
                  <div class="card" style="padding:10px;height:500px">
                    <a href="/etalase/{{ $title->id }}" target="_self">
                    @if($title->featured_img == null)
                    <img class="card-img-top" src="{{asset('storage/upload/default.png')}}" style="height:400px">
                    @else
                    <img class="card-img-top" src="{{ asset('storage/upload/'.$title->featured_img) }}" style="height:400px" alt="">
                    @endif
                      <h5 style="font-size:15px; margin-top: 10px" class="content-title mx-auto text-uppercase">{{ $title->title }}</h5>
                      <small class="col-lg-6">{{$editions->where('title_id',$title->id)->count()}} Edisi </small>
                      <small class="col-lg-6">{{$articles->whereIn('edition_title_id',$editions->where('title_id',$title->id)->pluck('id'))->count()}} Artikel</small>
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
</main>
@endsection
