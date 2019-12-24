@extends('layouts.form')

@section('title')
Indeks Artikel | Edit Artikel Sumber
@endsection

@section('content')
<main>
        <div class="mr-auto" style="padding-bottom:10px; padding-right: 50px; padding-left: 50px">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="sumber.html">Sumber</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Artikel Sumber</li>
            </ol>
        </div>

        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
            <form class="form">
                <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Judul Sumber</h4>
                <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Judul*</label>
                        <div class="col">
                                @foreach ($articles->edition_title->title->types as $types)
                            <input type="text" class="form-control" id="title" name="title"
                             value="{{$types->title}}" disabled>
                             @endforeach
                        </div>
                    </div>
                <div class="form-group row was-validated">
                    <label class="col-sm-2 col-form-label">Kala Terbit*</label>
                    <div class="col">
                        <select class="form-control custom-select" name="times[]" id="time_Select" disabled>
                        @foreach ($articles->edition_title->title->times as $times)
                                     <option>{{$times->title}}</option>
                                     @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Judul*</label>
                    <div class="col">
                        <input type="text" class="form-control" id="title" name="title"
                         value="{{$articles->edition_title->title->title}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode*</label>
                    <div class="col">
                        <input type="text" class="form-control" id="kode" name="kode"
                         value="{{$articles->edition_title->title->kode}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penerbitan*</label>
                    <div class="col">
                        <input type="text" class="form-control"  name="city" value="{{$articles->edition_title->title->city}}" disabled>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"  name="publisher" value="{{$articles->edition_title->title->publisher}}" disabled>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"   name="year" value="{{$articles->edition_title->title->year}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Terbit Pertama*</label>
                    <div class="col-sm-10 col-form-label">
                        <input type="text" class="form-control" id="first_year" name="first_year"
                        value="{{$articles->edition_title->title->first_year}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bahasa*</label>
                    <div class="col">
                        <select class="form-control" name="languages[]" id="language_Select" disabled>
							@foreach ($articles->edition_title->title->languages as $languages)
                            <option value='{{$languages->id}}'>{{$languages->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Format*</label>
                    <div class="col">
                        <select class="form-control" name="formats[]" id="format_Select" disabled>
							@foreach ($articles->edition_title->title->formats as $formats)
                            <option  value='{{$formats->id}}'>{{$formats->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar</label>
                <div class="col">
                    @if($articles->edition_title->title->featured_img == null)
                    <img src="/storage/upload/default.png" style="max-width: 150px; height: auto; "class="image-fluid">
                    @else
                    <img src="/storage/upload/{{$articles->edition_title->title->featured_img}}" style="max-width: 150px; height: auto; "class="image-fluid">
                    @endif
                    </div>
                </div>
            </form>
        </div>
        </div>

        <br>
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
                 <form class="form-horizontal" id="popup-validation" enctype="multipart/form-data">
                    <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Edisi Sumber</h4>
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan Edisi</label>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Tahun" disabled
								 name="edition_year" value="{{$articles->edition_title->edition_year}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Edisi" disabled
								name="edition_title" value="{{$articles->edition_title->edition_title}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Volume" disabled
								name="volume" value="{{$articles->edition_title->volume}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Jilid" disabled
								name="chapter" value="{{$articles->edition_title->chapter}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="No" disabled
								name="edition_no" value="{{$articles->edition_title->edition_no}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="validationServer03">Tanggal Terbit
                                Edisi*</label>
                             <div class="col-lg-2">
                                            <label >Tanggal
                                                <input class="form-control" type="text" tabindex="6" disabled
                                                name="publish_date" value="{{$articles->edition_title->publish_date}}" placeholder="Tanggal">
                                            </label>
                                    </div>
                                    <div class="col-lg-2">
                                            <label >Bulan
                                            <select class="form-control custom-select"name="publish_month"
                                            id="publish_month_Select" value="{{$articles->edition_title->publish_month}}" disabled>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                            </label>
                                    </div>
                                    <br>
                                    <div class="col-lg-2">
                                    <label >Tahun
                                                <input class="form-control" type="text" tabindex="6" disabled
                                                name="publish_year" value="{{$articles->edition_title->publish_year}}" placeholder="Tahun">
                                            </label>
                                    </div>
							</div>
                    </fieldset>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Penulisan Tanggal Asli*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="" value="{{$articles->edition_title->edition_code}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Penulisan Tanggal Asli*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="original_date" value="{{$articles->edition_title->original_date}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label" for="validationServer03">No. Panggil*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="" name="call_number" value="{{$articles->edition_title->call_number}}"
                                disabled>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Gambar :</label>
                        <div class="col-sm-10">
                        @if ($articles->edition_title->edition_image == null)
                        <img src="/storage/upload/default.png" style="max-width: 150px; height: auto; "class="image-fluid">
                        @else
                        <img src="/storage/upload/{{$articles->edition_title->edition_image}}" style="max-width: 150px; height: auto; "class="image-fluid">
                        @endif
                            </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
            <form class="form" method="POST" action="/articles/{{$articles->id}}" enctype="multipart/form-data">
                <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Edit
                    Artikel Sumber</h4>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Judul Artikel*</label>
                    <div class="col-sm-10 col-form-label">
                        <input type="text" class="form-control" id="article_title" name="article_title"
                        value="{{old('article_title') ? old('article_title') :$articles->article_title}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Subyek*</label>
                    <div class="col-sm-10 col-form-label">
                        <input type="text" class="form-control" id="subject" name="subject"
                        value="{{old('subject') ? old('subject') :$articles->subject}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pengarang*</label>
                    <div class="col-sm-10 col-form-label">
                        <input type="text" class="form-control" id="writer" name="writer"
                        value="{{old('writer') ? old('writer') :$articles->writer}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Halaman*</label>
                    <div class="col-sm-10 col-form-label">
                        <input type="text" class="form-control" id="pages" name="pages"
                        value="{{old('pages') ? old('pages') :$articles->pages}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kolom*</label>
                    <div class="col-sm-10 col-form-label">
                        <input type="text" class="form-control" id="column" name="column"
                        value="{{old('column') ? old('column') :$articles->column}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sumber*</label>
                    <div class="col-sm-10 col-form-label">
                        <input type="text" class="form-control" id="source" name="source"
                        value="{{old('source') ? old('source') :$articles->source}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi Singkat*</label>
                    <div class="col-sm-10 col-form-label">
                        <input type="text" class="form-control" id="desc" name="desc"
                        value="{{old('desc') ? old('desc') :$articles->desc}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kata Kunci*</label>
                    <div class="col-sm-10 col-form-label">
                        <input type="text" class="form-control" id="keyword" name="keyword"
                        value="{{old('keyword') ? old('keyword') :$articles->keyword}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan Gambar*</label>
                    <div class="col-sm-10 col-form-label">
                        <input type="text" class="form-control" id="detail_img" name="detail_img"
                        value="{{old('detail_img') ? old('detail_img') :$articles->detail_img}}" required>
                    </div>
                </div>
                <div class="row was-validated">
                        <legend class="col-form-label col-sm-2 pt-0">Status Ketersediaan*</legend>
                        <div class="col-sm-8">
                        @foreach ($statuses as $statuses)
                            <div class="form-check form-check-inline custom-control-inline custom-radio">
                            <label class="form-check-label" for="statuses" >
                                <input class="form-check-input" type="radio" name="statuses[]" id="type_Select"  required
                                value='{{$statuses->id}}' @if($articles->statuses()->get()->contains($statuses->id)) checked @endif>{{$statuses->title}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                (*) Wajib Diisi

                {{ csrf_field() }}

                <div class="form-group" style="text-align: center;">
                    <button type="submit"  class="btn btn-dark" name="submit"
                    style="text-align: center; width:100%; color:white; font-size: 17px; font-weight: 2px" onclick="return confirm('Apakah Anda yakin untuk mengedit?')">
                    EDIT</button>
                                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                </div>
            </form>
        </div>
    <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
        <p>
        Dibuat Oleh: <strong> @foreach ($articles->user->where('id', $articles->user_id)->get() as $user) {{$user->longname}} @endforeach </strong>
        <br>
        Dibuat Pada: {{$articles->created_at}}
        <br>
        Disunting Oleh: <strong> @foreach ($articles->user->where('id', $articles->updated_by)->get() as $user) {{$user->longname}} @endforeach </strong> <br>
        Disunting Pada: {{$articles->updated_at}}
        </p>
        </div>
    </main>
    @endsection
