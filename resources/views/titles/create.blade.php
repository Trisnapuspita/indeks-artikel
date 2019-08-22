@extends('layouts.form')

@section('title')
Indeks Artikel | Buat Judul Sumber
@endsection

@section('content')
<main>
        <div class="mr-auto" style="padding-bottom:10px; padding-right: 50px; padding-left: 50px">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="sumber.html">Sumber</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat Judul Sumber</li>
            </ol>
        </div>
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
            <form class="form" method="POST" action="/titles" enctype="multipart/form-data">
                <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Buat
                    Judul Sumber</h4>
                <fieldset class="form-group">
                    <div class="row was-validated">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis*</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline custom-control-inline custom-radio">
								 @foreach ($types as $types)
                            <label class="form-check-label" for="types" >
                                <input class="form-check-input" type="radio" value='{{$types->id}}' name="types[]" id="type_Select"required>{{$types->title}}
                                </label>
                                 @endforeach
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row was-validated">
                    <label class="col-sm-2 col-form-label">Kala Terbit*</label>
                    <div class="col">
                        <select class="form-control custom-select" name="times[]" id="time_Select" required>
                            @foreach ($times as $times)
                                     <option value='{{$times->id}}'>{{$times->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Judul*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title"
                         value="{{old('title')}}" placeholder="Tulis judul disini" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penerbitan*</label>
                    <div class="col">
                        <input type="text" class="form-control"  name="city" value="{{old('city')}}" placeholder="Kota Terbit">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"  name="publisher" value="{{old('publisher')}}" placeholder="Penerbit">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"   name="year" value="{{old('year')}}" placeholder="Tahun Terbit">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bahasa*</label>
                    <div class="col">
                        <select class="form-control" name="languages[]" id="language_Select">
                            <option>Pilih Bahasa</option>
							@foreach ($languages as $languages)
								<option value='{{$languages->id}}'>{{$languages->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Format*</label>
                    <div class="col">
                        <select class="form-control" name="formats[]" id="format_Select">
                            <option>Pilih Format</option>
							@foreach ($formats as $formats)
								<option value='{{$formats->id}}'>{{$formats->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar</label>
                <div class="col">
                    <input type="file" class="form-control-file" type="file" name="featured_img" id="featured_img">
					  @if ($errors->has('featured_img'))
                    <span class="help-block">
                        <strong>{{ $errors->first('featured_img') }}</strong>
                    </span>
                    @endif
                    </div>
                </div>
                (*) Wajib Diisi
                
                {{ csrf_field() }}
                
                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-dark"
                        style="text-align: center; width:100%; color:white; font-size: 17px; font-weight: 2px">S i m p
                        a n</button>
                </div>
            </form>
        </div>
    </main>
    @endsection