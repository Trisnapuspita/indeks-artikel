@extends('layouts.form')

@section('title')
Indeks Artikel | Edisi
@endsection

@section('content')
<main style="background: white; padding: 45px">

        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/titles">Sumber</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title->title }}</li>
            </ol>
        </div>
        
        <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
            aria-controls="collapseExample1">
            <h5
                style="width: 100%;background: whitesmoke; height: 50px; padding-top:15px; padding-left: 15px; border-radius: 4px">Judul Sumber<i class="fas fa-angle-down" style="padding-right: 20px; float: right"></i></h5>
        </a>
        <div id="collapseExample1">
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
            <form class="form" method="POST" action="/titles" enctype="multipart/form-data">
                <fieldset class="form-group">
                    <div class="row was-validated">
                        <legend class="col-form-label col-sm-3 pt-0">Jenis*</legend>
                        <div class="col-sm-8">
                        @foreach ($title->types as $types)
                            <div class="form-check form-check-inline custom-control-inline custom-radio">
                            <label class="form-check-label" for="types" >
                                <input class="form-check-input" type="radio" value='{{$types->id}}' name="types[]" id="type_Select" disabled>{{$types->title}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kala Terbit*</label>
                    <div class="col">
                        <select class="form-control custom-select" name="times[]" id="time_Select" disabled>
                            @foreach ($title->times as $times)
                                     <option>{{$times->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Judul*</label>
                    <div class="col">
                        <input type="text" class="form-control" id="title" name="title"
                         value="{{$title->title}}" placeholder="Tulis judul disini" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Penerbitan*</label>
                    <div class="col">
                        <input type="text" class="form-control"  name="city" value="{{$title->city}}" placeholder="Kota Terbit" disabled>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"  name="publisher" value="{{$title->publisher}}" placeholder="Penerbit" disabled>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"   name="year" value="{{$title->year}}" placeholder="Tahun Terbit" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tahun Terbit Pertama*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="first_year" name="first_year"
                         value="{{$title->first_year}}" placeholder="Tulis tahun terbit pertama disini" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bahasa*</label>
                    <div class="col">
                        <select class="form-control" name="languages[]" id="language_Select" disabled>
							@foreach ($title->languages as $languages)
								<option>{{$languages->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Format*</label>
                    <div class="col">
                        <select class="form-control" name="formats[]" id="format_Select" disabled>
							@foreach ($title->formats as $formats)
								<option>{{$formats->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                <label class="col-sm-3 col-form-label">Gambar</label>
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
            </form>
            </div>
        </div>

        <br>

        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            <h5
                style="width: 100%;background: whitesmoke; height: 50px; padding-top:15px; padding-left: 15px; border-radius: 4px">Tambah Edisi<i class="fas fa-angle-down" style="padding-right: 20px; float: right"></i></h5>
        </a>
        <div id="collapseExample">
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
                 <form class="form-horizontal" id="popup-validation" method="POST" action="/editions/create_edition/{{$title->id}}" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan Edisi</label>
                            <div class="col">
                                <label for="validationServer03">Tahun</label>
                                <input class="form-control is-invalid" type="text" placeholder="Tahun"
								 name="edition_year" value="{{old('edition_year')}}">
                            </div>
                            <div class="col">
                                <label for="validationServer03">Edisi</label>
                                <input class="form-control is-invalid" type="text" placeholder="Edisi"
								name="edition_title" value="{{old('edition_title')}}">
                            </div>
                            <div class="col">
                                <label for="validationServer03">Volume</label>
                                <input class="form-control is-invalid" type="text" placeholder="Volume"
								name="volume" value="{{old('volume')}}">
                            </div>
                            <div class="col">
                                <label for="validationServer03">Jilid</label>
                                <input class="form-control is-invalid" type="text" placeholder="Jilid"
								name="chapter" value="{{old('chapter')}}">
                            </div>
                            <div class="col">
                                <label for="validationServer03">Nomor</label>
                                <input class="form-control is-invalid" type="text" placeholder="No"
								name="edition_no" value="{{old('edition_no')}}">
                            </div>
                        </div>
                        <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Kode*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Tulis Kode"  name="edition_code" value="{{old('edition_code')}}" required>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="validationServer03">Tanggal Terbit
                                Edisi*</label>
                             <div class="col-lg-2">
                                            <label >Tanggal
                                                <input class="form-control is-invalid" type="text" tabindex="6"
                                                name="publish_date" value="{{old('publish_date')}}" placeholder="Tanggal">
                                            </label>
                                    </div>
                                    <div class="col-lg-2">
                                            <label >Bulan
                                            <select class="form-control custom-select is-invalid" name="publish_month" id="publish_month_Select" required>
                                                <option disabled selected hidden>Pilih Bulan</option>
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
                                                <input class="form-control is-invalid" type="text" tabindex="6"
                                                name="publish_year" value="{{old('publish_year')}}" placeholder="Tahun">
                                            </label>
                                    </div>
							</div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Penulisan Tanggal Asli*</label>
                        <div class="col-sm-10">
                            <input class="form-control is-invalid" type="text" placeholder=""  name="original_date" value="{{old('original_date')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label" for="validationServer03">No. Panggil*</label>
                        <div class="col-sm-10">
                            <input class="form-control is-invalid" type="text" placeholder="" name="call_number" value="{{old('call_number')}}"
                                required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Gambar :</label>
                        <div class="col-sm-10">
						<input type="file" name="edition_image" id="edition_image">
						@if ($errors->has('edition_image'))
							<span class="help-block">
								<strong>{{ $errors->first('edition_image') }}</strong>
							</span>
							@endif
                            </div>
                    </div>

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
