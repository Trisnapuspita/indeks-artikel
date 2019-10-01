@extends('layouts.form')

@section('title')
Indeks Artikel | Menambahkan Artikel
@endsection

@section('content')
<main style="background: white; padding: 45px">

        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/titles">Sumber</a></li>
                <li class="breadcrumb-item"><a href="/titles">Artikel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Artikel</li>
            </ol>
        </div>

        <div id="collapseExample1">
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
           <form class="form" method="POST" action="/editions/create/{{$editions->id}}" enctype="multipart/form-data">
            <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Judul Sumber</h4>
            @foreach ($editions->title->where('id', $editions->title_id)->get() as $title)
            <fieldset class="form-group">
                    <div class="row was-validated">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis*</legend>
                        <div class="col-sm-8">
                        @foreach ($types as $types)
                            <div class="form-check form-check-inline custom-control-inline custom-radio">
                            <label class="form-check-label" for="types" >
                                <input class="form-check-input" type="radio" name="types[]" id="type_Select" disabled
                                value='{{$types->id}}' @if($title->types()->get()->contains($types->id)) checked @endif>{{$types->title}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row was-validated">
                    <label class="col-sm-2 col-form-label">Kala Terbit*</label>
                    <div class="col">
                        <select class="form-control custom-select" name="times[]" id="time_Select" disabled >
                            @foreach ($times as $times)
                                     <option required value='{{$times->id}}' @if($title->times()->get()->contains($times->id)) checked @endif>{{$times->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Judul*</label>
                    <div class="col">
                        <input type="text" class="form-control" id="title" name="title"
                         value="{{old('title') ? old('title') :$title->title}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penerbitan*</label>
                    <div class="col">
                        <input disabled type="text" class="form-control"  name="city" value="{{old('city') ? old('city') :$title->city}}">
                    </div>
                    <div class="col">
                        <input disabled type="text" class="form-control"  name="publisher" value="{{old('publisher') ? old('publisher') :$title->publisher}}">
                    </div>
                    <div class="col">
                        <input disabled type="text" class="form-control"   name="year" value="{{old('year') ? old('year') :$title->year}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Terbit Pertama*</label>
                    <div class="col-sm-4 col-form-label">
                        <input disabled type="text" class="form-control" id="first_year" name="first_year"
                        value="{{old('first_year') ? old('first_year') :$title->first_year}}"  placeholder="Tulis tahun terbit pertama disini" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bahasa*</label>
                    <div class="col">
                        <select class="form-control" name="languages[]" id="language_Select" disabled>
							@foreach ($languages as $languages)
                            <option required value='{{$languages->id}}'@if($title->languages()->get()->contains($languages->id)) checked @endif>{{$languages->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Format*</label>
                    <div class="col">
                        <select class="form-control" name="formats[]" id="format_Select" disabled>
							@foreach ($formats as $formats)
                            <option required value='{{$formats->id}}'@if($title->formats()->get()->contains($formats->id)) checked @endif>{{$formats->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar</label>
                <div class="col">
                    <img src="/storage/upload/{{$title->featured_img}}" style="max-width: 150px; height: auto; "class="image-fluid"> 
                    <br>
                    <input type="file" class="form-control-file" type="file" name="featured_img" id="featured_img" disabled>
					  @if ($errors->has('featured_img'))
                    <span class="help-block">
                        <strong>{{ $errors->first('featured_img') }}</strong>
                    </span>
                    @endif
                    </div>
                </div>
                @endforeach
                <br>
                <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Edisi</h4>
                <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan Edisi</label>
                            <div class="col">
                                <input class="form-control" type="text" disabled 
								 name="edition_year" id="edition_year" value="{{old('edition_year') ? old('edition_year') :$editions->edition_year}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" disabled
								name="edition_title" id="edition_title" value="{{old('edition_title') ? old('edition_title') :$editions->edition_title}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" disabled
								name="volume" id="volume" value="{{old('volume') ? old('volume') :$editions->volume}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" disabled
								name="chapter" id="chapter" value="{{old('chapter') ? old('chapter') :$editions->chapter}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" disabled
								name="edition_no" id="edition_no" value="{{old('edition_no') ? old('edition_no') :$editions->edition_no}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="validationServer03">Tanggal Terbit
                                Edisi*</label>
                             <div class="col-lg-2">
                                            <label >Tanggal
                                                <input class="form-control" type="text" tabindex="6" disabled
                                                name="publish_date" id="publish_date" value="{{old('publish_date') ? old('publish_date') :$editions->publish_date}}" placeholder="Tanggal">
                                            </label>
                                    </div>
                                    <div class="col-lg-2">
                                            <label >Bulan
                                            <select class="form-control custom-select" name="publish_month" id="publish_month_Select" disabled>
                                                <option disabled selected hidden>{{$editions->publish_month}}</option>
                                            </select>
                                            </label>
                                    </div>
                                    <br>
                                    <div class="col-lg-2">
                                    <label >Tahun
                                                <input class="form-control" type="text" tabindex="6" disabled
                                                name="publish_year" id="publish_year" value="{{old('publish_year') ? old('publish_year') :$editions->publish_year}}" placeholder="Tahun">
                                            </label>
                                    </div>
							</div>
                    </fieldset>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Penulisan Tanggal Asli*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="" id="original_date"  name="original_date" value="{{old('original_date') ? old('original_date') :$editions->original_date}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. Panggil*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="call_number" id="call_number" value="{{old('call_number') ? old('call_number') :$editions->call_number}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gambar :</label>
                        <div class="col-sm-10">
						<input type="file" name="edition_image" id="edition_image" disabled>
						@if ($errors->has('edition_image'))
							<span class="help-block">
								<strong>{{ $errors->first('edition_image') }}</strong>
							</span>
							@endif
                            </div>
                    </div>
                    <br>
                    <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Artikel</h4>
                        <div class="form-group row was-validated">
                            <label class="col-sm-2 col-form-label">Judul Artikel*</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder=""  name="article_title" value="{{old('article_title')}}" required>
                            </div>
                        </div>
                        <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Subyek*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="subject" value="{{old('subject')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Pengarang*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="writer" value="{{old('writer')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Halaman*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="pages" value="{{old('pages')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Kolom*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="column" value="{{old('column')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Sumber*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="source" value="{{old('source')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Deskripsi Singkat*</label>
                        <div class="col-sm-10">
                            <textarea rows="4" class="form-control" type="text" placeholder=""  name="desc" value="{{old('desc')}}" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Kata Kunci*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="keyword" value="{{old('keyword')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Keterangan Gambar*</label>
                        <div class="col-sm-10">
                            <textarea rows="3" class="form-control" type="text" placeholder=""  name="detail_img" value="{{old('detail_img')}}" required></textarea>
                        </div>
                    </div>
                    <div class="row was-validated">
                        <legend class="col-form-label col-sm-2">Status Ketersediaan*</legend>
                        <div class="col-sm-8">
                        @foreach ($statuses as $statuses)
                            <div class="form-check form-check-inline custom-control-inline custom-radio">
                            <label class="form-check-label" for="statuses" >
                                <input class="form-check-input" type="radio" value='{{$statuses->id}}' name="statuses[]" id="statuses_Select"required>{{$statuses->title}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    </fieldset>

                    {{ csrf_field() }}

                    (*) Wajib Diisi
                    <div class="form-group" style="text-align: center">
                        <button type="submit" class="btn btn-dark"
                            style="text-align: center; width:100%; color:white; font-size: 17px; font-weight: 2px">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
@endsection
