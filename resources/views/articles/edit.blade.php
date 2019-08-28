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
                <li class="breadcrumb-item active" aria-current="page">Buat Artikel Sumber</li>
            </ol>
        </div>
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
            <form class="form" method="POST" action="/articles/{{$articles->id}}" enctype="multipart/form-data">
                <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Buat
                    Artikel Sumber</h4>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Judul Artikel*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="article_title" name="article_title"
                        value="{{old('article_title') ? old('article_title') :$articles->article_title}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Pengarang*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="writer" name="writer"
                        value="{{old('writer') ? old('writer') :$articles->writer}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Halaman*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="pages" name="pages"
                        value="{{old('pages') ? old('pages') :$articles->pages}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kolom*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="column" name="column"
                        value="{{old('column') ? old('column') :$articles->column}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Sumber Online*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="source" name="source"
                        value="{{old('source') ? old('source') :$articles->source}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Deskripsi Singkat*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="desc" name="desc"
                        value="{{old('desc') ? old('desc') :$articles->desc}}" required>
                    </div>
                </div>
                (*) Wajib Diisi
                
                {{ csrf_field() }}
                
                <div class="form-group" style="text-align: center;">
                    <input type="submit"  class="btn btn-dark" name="submit" value="Edit" 
                    style="text-align: center; width:100%; color:white; font-size: 17px; font-weight: 2px" onclick="return confirm('Apakah Anda yakin untuk mengedit?')">
                                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                </div>
            </form>
        </div>
    </main>
    @endsection