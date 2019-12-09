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
                        <form method="post" action="/home/search">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 col-xl-6">
                                    <input type="text" class="form-control rounded" name="param" id="param" placeholder="Kata Kunci">
                                </div>
                                <div class="col-lg-12 col-xl-4">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control rounded" name="column" id="column">
                                            <option value="all">Sembarang</option>
                                            <option value="subject">Subjek</option>
                                            <option value="article_title">Judul Artikel</option>
                                            <option value="writer">Pengarang</option>
                                            <option value="title">Nama Surat Kabar/Majalah</option>
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

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <!-- BEGIN SEARCH RESULT -->
            <div class="col-md-12">
                <div class="grid search">
                    <div class="grid-body">
                        <div class="row">
                            <!-- END FILTERS -->
                            <!-- BEGIN RESULT -->
                            <div class="col-md-9" id="activeresult">
                                <h2>Hasil Pencarian</h2>

                                <!-- END SEARCH INPUT -->
                                <p>Menampilkan semua hasil pencarian dengan kata kunci  </p>

                                <div class="padding"></div>

                                <div class="row">
                                        <!-- END ORDER RESULT -->
                                        <div class="col-md-6 text-right">
                                                <div class="btn-group" style="display: none">
                                                    <button type="button" class="btn btn-primary active"><i class="fa fa-list"></i></button>
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-th"></i></button>
                                                </div>
                                            </div>
                                </div>
                                </div>

                            <!-- BEGIN TABLE RESULT -->
                            <div class="table-responsive">
                                <table class="table table-hover" id="result_area">
                                    <tbody>
                                        @if($datas != null)
                                        @foreach ($datas as $data)
                                            <tr>

                                                {{--  <td class="image">
                                                        <img src="img/no_image_kin.png" id="content_rptResults_imgSampul_0" class="border" onmouseover="this.style.cursor=&#39;pointer&#39;;" alt="Sampul" />
                                                        <br />
                                                        <label class="label label-info" style="display: none">AACR</label>
                                                </td>  --}}
                                                    <td class="product"><strong>{{ $data->subject }}</strong><br>
                                                        <td class="product"><strong>{{ $data->subject }}</strong><br>
                                                        <strong>{{ $data->article_title }}. {{ $data->title }}. - {{$data->edition_year}}, {{$data->edition_no}}, {{$data->original_date}}.
                                                            - {{ $data->publisher }}, {{ $data->first_year }}. p: {{ $data->pages }}</strong><br>
                                                        {{--  judul artikel. nama judul sumber. - keterangan edisi. - penerbit, tahun terbit pertama. p:  --}}
                                                        <br>
                                                        @foreach ($data->types as $type)
                                                        {{ $type->title }}
                                                        @endforeach
                                                         -
                                                         @foreach ($data->times as $time)
                                                         {{ $data->title }}
                                                         @endforeach
                                                         -
                                                         @foreach ($data->languages as $language)
                                                         {{ $data->title }}
                                                         @endforeach
                                                         -
                                                         @foreach ($data->formats as $format)
                                                         {{ $data->title }}
                                                         @endforeach
                                                         -
                                                         {{ $data->call_number }}
                                                        {{--  type - time - bahasa - format  - nomor panggil--}}
                                                        <br />
                                                        dibuat oleh: {{ $user->longname }}
                                                    </td>

                                                </tr>

                                                @endforeach
                                                @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
