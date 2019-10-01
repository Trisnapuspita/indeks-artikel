@extends('layouts.form')

@section('title')
Indeks Artikel | Edit Judul Sumber
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
            <form class="form" method="POST" action="/titles/{{$title->id}}" enctype="multipart/form-data">
                <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Edit
                    Judul Sumber</h4>
                <fieldset class="form-group">
                    <div class="row was-validated">
                        <legend class="col-form-label col-sm-3 pt-0">Jenis*</legend>
                        <div class="col-sm-8">
                        @foreach ($types as $types)
                            <div class="form-check form-check-inline custom-control-inline custom-radio">
                            <label class="form-check-label" for="types" >
                                <input class="form-check-input" type="radio" name="types[]" id="type_Select"  required 
                                value='{{$types->id}}' @if($title->types()->get()->contains($types->id)) checked @endif>{{$types->title}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row was-validated">
                    <label class="col-sm-3 col-form-label">Kala Terbit*</label>
                    <div class="col">
                        <select class="form-control custom-select" name="times[]" id="time_Select" required>
                            @foreach ($times as $times)
                                     <option required value='{{$times->id}}' @if($title->times()->get()->contains($times->id)) checked @endif>{{$times->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Judul*</label>
                    <div class="col">
                        <input type="text" class="form-control" id="title" name="title"
                         value="{{old('title') ? old('title') :$title->title}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kode*</label>
                    <div class="col">
                        <input type="text" class="form-control" id="kode" name="kode"
                         value="{{old('kode') ? old('kode') :$title->kode}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Penerbitan*</label>
                    <div class="col">
                        <input type="text" class="form-control"  name="city" value="{{old('city') ? old('city') :$title->city}}">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"  name="publisher" value="{{old('publisher') ? old('publisher') :$title->publisher}}">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"   name="year" value="{{old('year') ? old('year') :$title->year}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tahun Terbit Pertama*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="first_year" name="first_year"
                        value="{{old('first_year') ? old('first_year') :$title->first_year}}"  placeholder="Tulis tahun terbit pertama disini" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bahasa*</label>
                    <div class="col">
                        <select class="form-control" name="languages[]" id="language_Select">
							@foreach ($languages as $languages)
                            <option required value='{{$languages->id}}'@if($title->languages()->get()->contains($languages->id)) checked @endif>{{$languages->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Format*</label>
                    <div class="col">
                        <select class="form-control" name="formats[]" id="format_Select">
							@foreach ($formats as $formats)
                            <option required value='{{$formats->id}}'@if($title->formats()->get()->contains($formats->id)) checked @endif>{{$formats->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                <label class="col-sm-3 col-form-label">Gambar</label>
                <div class="col">
                    <img src="/storage/upload/{{$title->featured_img}}" style="max-width: 150px; height: auto; "class="image-fluid"> 
                    <br>
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
        Dibuat Oleh: <strong> @foreach ($title->user->where('id', $title->user_id)->get() as $user) {{$user->longname}} @endforeach </strong>  
        <br>
        Dibuat Pada: {{$title->created_at}} 
        <br><br>
        Disunting Oleh: <strong> @foreach ($title->user->where('id', $title->updated_by)->get() as $user) {{$user->longname}} @endforeach </strong> <br>
        Disunting Pada: {{$title->updated_at}}
        </p>
        </div>
    </main>
    @endsection