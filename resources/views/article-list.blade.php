@extends('layouts.welcome')

@section('title')
Indeks Artikel | Perincian Artikel
@endsection

@section('content')
    <main style="height: 100%; padding: 45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                @foreach($titles as $title)
                @foreach($editions as $edition)
                @if($edition->id == $article->edition_title_id)
                @if($title->id == $edition->title_id)

                <li class="breadcrumb-item"><a href="/catalog/{{ $title->id }}">Daftar Isi</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$edition->edition_year}}, {{$edition->edition_no}}, {{$edition->original_date}}
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $article->article_title }}. p: {{ $article->pages }}
                </li>
                @endif
                @endif
                @endforeach
                @endforeach

            </ol>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td style="width:200px">Judul Artikel</td>
                                <td>:</td>
                                <td><span style="font-weight:bold;">{{ $article->article_title }}</span>
                                </td>
                            </tr>
                            <tr>
                                    <td style="width:200px">Status Ketersediaan</td>
                                    <td>:</td>
                                    @foreach ($article->statuses()->get() as $stat)
                                    <td><span style="font-weight:bold;">{{ $stat->title }}</span>
                                    </td>
                                    @endforeach
                                </tr>
                            <tr>
                                <td style="width:200px">Pengarang</td>
                                <td>:</td>
                                <td><span style="font-weight:bold;">{{ $article->writer }}</span></td>
                            </tr>
                            <tr>
                                <td style="width:200px">Halaman</td>
                                <td>:</td>
                                <td><span style="font-weight:bold;">{{ $article->pages }}</span></td>
                            </tr>
                            <tr>
                                <td style="width:200px">Kolom</td>
                                <td>:</td>
                                <td><span style="font-weight:bold;">{{ $article->column }}</span></td>
                            </tr>
                            <tr>
                                <td>Sumber Online</td>
                                <td>:</td>
                                <td><span style="font-weight:bold;"><a class="btn-link"href="">{{ $article->source }}</a></span>
                                </td>
                            </tr>
                            <tr>
                                    <td style="width:200px">Deskripsi Singkat</td>
                                    <td>:</td>
                                    <td><span style="font-weight:bold;"><a>{{ $article->desc }}</a></span></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
@endsection
