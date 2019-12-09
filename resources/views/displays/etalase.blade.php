@extends('layouts.frontsin')

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
                <form method="get" action="/etalase">
                <input type="text" class="search-box" placeholder="Search" name="search" id="search">
                <button type="submit" class="searchButton"><img src="../../assets/magnifying-glass-2x.png">
                </button>
                </form>
        </div>

            <div class="row">
            @foreach ($titles as $title)
              <div class="col-lg col-sm col-md">
                <div class="card_">
                    <a href="/displays/etalase/{{ $title->id }}" target="_self">
                        @if($title->featured_img == null)
                        <img class="card-img-top" src="{{asset('storage/upload/default.png')}}" style="height:300px">
                        @else
                        <img class="card-img-top" src="{{ asset('storage/upload/'.$title->featured_img) }}" style="height:300px" alt="">
                        @endif
                      <h5 style="font-size:15px; margin-top: 10px" class="content-title mx-auto text-uppercase">{{ $title->title }}</h5>
                      <small class="col-lg-6">{{$editions->where('title_id',$title->id)->count()}} Edisi </small>
                      <small class="col-lg-6">{{$articles->whereIn('edition_title_id',$editions->where('title_id',$title->id)->pluck('id'))->count()}} Artikel</small>
                    </a>
                </div>
              </div>
                @endforeach
            </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{$res->links()}}

                    {{-- {{ $searches->links() }} --}}

                  {{--  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>  --}}
                </ul>
              </nav>
</main>
@endsection
