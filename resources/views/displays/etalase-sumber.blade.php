@extends('layouts.frontsin')

@section('content')

@section('title')
Indeks Artikel | Etalase
@endsection

<main style="height: 100%;padding: 45px">

        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/displays/etalase">Etalase</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title->title }}</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="containerImgCover">
                            <img id="imgSampul" class="border" src="/storage/upload/{{ $title->featured_img }}"  style="max-width: 300px;">
                        </div>
                    </div>
                    <div class="col-md-9">

                        <table class="table table-striped">

                            <tbody>
                                <tr>
                                    <td>Judul Sumber</td>
                                    <td>:</td>
                                    <td><span style="font-weight:bold;">{{ $title->title }}</span></td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>:</td>
                                    @foreach ($title->types()->get() as $type)
                                        <td><span style="font-weight:bold;">{{ $type->title }}</span></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>Kala terbit</td>
                                    <td>:</td>
                                    @foreach ($title->times()->get() as $time)
                                        <td><span style="font-weight:bold;">{{ $time->title }}</span></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>Tahun Terbit Pertama</td>
                                    <td>:</td>
                                    <td><span style="font-weight:bold;">{{ $title->first_year }}</span></td>
                                </tr>

                                <tr>
                                    <td>Bahasa</td>
                                    <td>:</td>
                                    @foreach ($title->languages()->get() as $language)
                                        <td><span style="font-weight:bold;">{{ $language->title }}</span></td>
                                    @endforeach
                                </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" href="#tab_daftar_katalog" role="tab"
                                    data-toggle="tab">Daftar Isi Katalog</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_hirarki_indeks" role="tab"
                                    data-toggle="tab">Hirarki Indeks Artikel</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_daftar_katalog">
                                <div class="table-responsive">
                                    <iframe height="500" style="width: 100%" src="/displays/catalog/{{ $title->id }}" frameborder="0">
                                    </iframe>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_hirarki_indeks">
                                <div class="table-responsive">
                                    <iframe height="500" style="width: 100%" src="/displays/hierarki/{{ $title->id }}" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
            </div>
    </main>
@endsection
