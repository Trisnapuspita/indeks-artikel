@extends('layouts.form')

@section('title')
Indeks Artikel | Edit Master Kala Terbit
@endsection

@section('content')
<main>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="mr-auto" style="padding-bottom:10px; padding-right: 50px; padding-left: 50px">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="sumber.html">Sumber</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Master Format</li>
            </ol>
        </div>
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
            <form class="form" method="POST" action="/formats/{{$format->id}}">
                <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">
                    Edit Master Format</h4>
                    <div class="form-group row was-validated">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama*</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="{{old('title') ? old('title') :$format->title}}" required>
                            </div>

                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">                        
                        <button type="submit" class="btn btn-dark" style="text-align: center; width:100%; color:white; font-size: 17px; font-weight: 2px" onclick="return confirm('Apakah Anda yakin untuk mengedit?')">
                        S i m p a n</button>
                    </div>
            </form>
        </div>
</main>
@endsection

