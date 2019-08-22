@extends('layouts.app')

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
