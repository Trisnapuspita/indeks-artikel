@extends('layouts.form')

@section('content')
<div id="content">   
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Sumber Bacaan </h2>
                    </div>
                </div>
            <hr /> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <header>
                            <h5>Mengedit Judul Sumber</h5>
                        </header>
                        <div>
                            <form class="form-horizontal" method="POST" action="/titles/{{$title->id}}" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Jenis * :</label>
                                   <div class="col-lg-4">
                                        <select name="types[]" id="type_Select" class="validate[required] form-control">
                                        @foreach ($types as $types)
                                            <option value='{{$types->id}}' @if($title->types()->get()->contains($types->id)) checked @endif>{{$types->title}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Kala Terbit * :</label>
                                    <div class="col-lg-4">
                                        <select name="times[]" id="time_Select" class="validate[required] form-control">
                                        @foreach ($times as $times)
                                            <option value='{{$times->id}}' @if($title->times()->get()->contains($times->id)) checked @endif>{{$times->title}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label class="control-label col-lg-4">Judul Surat Kabar/Majalah * :</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="validate[required] form-control" id="title" name="title" required
                                        value="{{old('title') ? old('title') :$title->title}}" placeholder="tulis judul disini">
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Penerbitan :</label>
                                    <div class="col-lg-2">
                                        <label>Kota Terbit
                                            <input class="form-control autotab" type="text" tabindex="11" 
                                            name="city" value="{{old('city') ? old('city') :$title->city}}" placeholder="tulis kota penerbit"/>
                                        </label>
                                        </div>
                                        <div class="col-lg-2">
                                        <label >Penerbit
                                            <input class="form-control autotab" type="text" tabindex="12" 
                                            name="publisher" value="{{old('publisher') ? old('publisher') :$title->publisher}}" placeholder="tulis penerbit"/>
                                        </label>
                                        </div>
                                        <div class="col-lg-2">
                                        <label>Tahun Terbit
                                            <input class="form-control autotab" type="text" maxlength="4" tabindex="13" 
                                            name="year" value="{{old('year') ? old('year') :$title->year }}" placeholder="tulis tahun penerbit"/>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Bahasa :</label>
                                    <div class="col-lg-4">
                                    <select name="languages[]" id="language_Select" class="validate[required] form-control">
                                            @foreach ($languages as $languages)
                                            <option value='{{$languages->id}}'@if($title->languages()->get()->contains($languages->id)) checked @endif>{{$languages->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Format :</label>
                                    <div class="col-lg-4">
                                        <select name="formats[]" id="format_Select" class="validate[required] form-control">
                                            @foreach ($formats as $formats)
                                            <option value='{{$formats->id}}'@if($title->formats()->get()->contains($formats->id)) checked @endif>{{$formats->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-1">Gambar :</label>
                                    <img src="/storage/upload/{{$title->featured_img}}" style="max-width: 150px; height: auto; "class="image-fluid" alt=""> 
                                    <input type="file" name="featured_img" id="featured_img">
                                    @if ($errors->has('featured_img'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('featured_img') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                <div style="text-align:center" class="form-actions no-margin-bottom">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Edit" onclick="return confirm('Apakah Anda yakin untuk mengedit?')">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
