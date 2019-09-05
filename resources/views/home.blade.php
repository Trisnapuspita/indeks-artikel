@extends('layouts.appp')

@section('title')
Indeks Artikel | Beranda
@endsection

@section('content')
    <main class="imgBeranda">
    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

        <div class="container text-center" style="padding-top: 15%;">
            <div class="row">
                <div class="col-lg-12 col-md-7">
                    <h6>Perpustakaan Nasional Republik Indonesia</h6>
                    <h1>INDEKS ARTIKEL</h1>
                    <div class="form-search-wrap mb-3">
                        <form method="post" action="/home">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 col-xl-6">
                                    <input type="text" class="form-control rounded" name="param" id="param">
                                </div>
                                <div class="col-lg-12 col-xl-4">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control rounded" name="column" id="column">
                                            <option value="all">--Sembarang--</option>
                                            <option value="subject">Subjek</option>
                                            <option value="article_title">Judul Artikel</option>
                                            <option value="writer">Pengarang</option>
                                            <option value="title">Judul Surat Kabar/Majalah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-xl-1">
                                    <input type="submit" class="btn btn-dark btn-block rounded" value="Telusuri">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
            </div>
        </div>
    </div>
</div>
@endsection
