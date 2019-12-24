@extends('layouts.form')

@section('title')
Indeks Artikel | Edit Edisi
@endsection

@section('content')
<main style="background: white; padding: 45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="sumber.html">Sumber</a></li>
                <li class="breadcrumb-item"><a href="sumber.html">{{$editions->edition_title}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                                @foreach ($editions->title->types as $types)
                            <input type="text" class="form-control" id="title" name="title"
                             value="{{$types->title}}" disabled>
                             @endforeach
                        </div>
                    </div>
                <div class="form-group row was-validated">
                    <label class="col-sm-2 col-form-label">Kala Terbit*</label>
                    <div class="col">
                        <select class="form-control custom-select" name="times[]" id="time_Select" disabled>
                            @foreach ($times as $times)
                                     <option value='{{$times->id}}'>{{$times->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Judul*</label>
                    <div class="col">
                        <input type="text" class="form-control" id="title" name="title"
                         value="{{$editions->title->title}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode*</label>
                    <div class="col">
                        <input type="text" class="form-control" id="kode" name="kode"
                         value="{{$editions->title->kode}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penerbitan*</label>
                    <div class="col">
                        <input type="text" class="form-control"  name="city" value="{{$editions->title->city}}" disabled>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"  name="publisher" value="{{$editions->title->publisher}}" disabled>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"   name="year" value="{{$editions->title->year}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Terbit Pertama*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="first_year" name="first_year"
                        value="{{$editions->title->first_year}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bahasa*</label>
                    <div class="col">
                        <select class="form-control" name="languages[]" id="language_Select" disabled>
							@foreach ($languages as $languages)
                            <option value='{{$languages->id}}'>{{$languages->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Format*</label>
                    <div class="col">
                        <select class="form-control" name="formats[]" id="format_Select" disabled>
							@foreach ($formats as $formats)
                            <option  value='{{$formats->id}}'>{{$formats->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar</label>
                <div class="col">
                    @if ($editions->title->featured_img == null)
                    <img src="/storage/upload/default.png" style="max-width: 150px; height: auto; "class="image-fluid">
                    @else
                    <img src="/storage/upload/{{$editions->title->featured_img}}" style="max-width: 150px; height: auto; "class="image-fluid">
                    </div>
                    @endif
                </div>
            </form>
        </div>
        </div>

        <br>
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
                 <form class="form-horizontal" id="popup-validation" method="POST" action="/editions/{{$editions->id}}" enctype="multipart/form-data">
                    <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Edit Edisi Sumber</h4>
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan Edisi</label>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Tahun"
								 name="edition_year" value="{{old('edition_year') ? old('edition_year') :$editions->edition_year}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Edisi"
								name="edition_title" value="{{old('edition_title')  ? old('edition_title') :$editions->edition_title}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Volume"
								name="volume" value="{{old('volume')  ? old('volume') :$editions->volume}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Jilid"
								name="chapter" value="{{old('chapter')  ? old('chapter') :$editions->chapter}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="No"
								name="edition_no" value="{{old('edition_no')  ? old('edition_no') :$editions->edition_no}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="validationServer03">Tanggal Terbit
                                Edisi*</label>
                             <div class="col-lg-2">
                                            <label >Tanggal
                                                <input class="form-control" type="text" tabindex="6"
                                                name="publish_date" value="{{old('publish_date')  ? old('publish_date') :$editions->publish_date}}" placeholder="Tanggal">
                                            </label>
                                    </div>
                                    <div class="col-lg-2">
                                            <label >Bulan
                                            <select class="form-control custom-select"name="publish_month"
                                            id="publish_month_Select" value="{{old('publish_month') ? old('publish_month') :$editions->publish_month}}" required>
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
                                                <input class="form-control" type="text" tabindex="6"
                                                name="publish_year" value="{{old('publish_year') ? old('publish_year') :$editions->publish_year}}" placeholder="Tahun">
                                            </label>
                                    </div>
							</div>
                    </fieldset>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Kode*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="edition_code" value="{{old('edition_code') ? old('edition_code') :$editions->edition_code}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Penulisan Tanggal Asli*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="original_date" value="{{old('original_date') ? old('original_date') :$editions->original_date}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label" for="validationServer03">No. Panggil*</label>
                        <div class="col-sm-10">
                            <input class="form-control is-invalid" type="text" placeholder="" name="call_number" value="{{old('call_number')  ? old('call_number') :$editions->call_number}}">
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Gambar :</label>
                        <div class="col-sm-10">
                            @if($editions->edition_image == null)
                            <img src="/storage/upload/default.png" style="max-width: 150px; height: auto;"class="image-fluid">
                            @else
                        <img src="/storage/upload/{{$editions->edition_image}}" style="max-width: 150px; height: auto; "class="image-fluid">
                        @endif
                        <br>
						<input type="file" name="edition_image" class="form-control-file" id="edition_image">
						@if ($errors->has('edition_image'))
							<span class="help-block">
								<strong>{{ $errors->first('edition_image') }}</strong>
							</span>
							@endif
                            </div>
                    </div>

                    {{ csrf_field() }}

                    (*) Wajib Diisi
                    <div class="form-group" style="text-align: center;">
                    <button type="submit"  class="btn btn-dark" name="submit"
                    style="text-align: center; width:100%; color:white; font-size: 17px; font-weight: 2px" onclick="return confirm('Apakah Anda yakin untuk mengedit?')">
                    EDIT</button>
                                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                </div>
                </form>
            </div>
        </div>

    <br>
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
        <p>
        Dibuat Oleh: <strong> @foreach ($editions->user->where('id', $editions->user_id)->get() as $user) {{$user->longname}} @endforeach </strong>
        <br>
        Dibuat Pada: {{$editions->created_at}}
        <br><br>
        Disunting Oleh: <strong> @foreach ($editions->user->where('id', $editions->updated_by)->get() as $user) {{$user->longname}} @endforeach </strong> <br>
        Disunting Pada: {{$editions->updated_at}}
        </p>
        </div>
</main>
@endsection
