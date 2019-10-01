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
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Subyek*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="subject" name="subject"
                        value="{{old('subject') ? old('subject') :$articles->subject}}" required>
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
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Sumber*</label>
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
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kata Kunci*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="keyword" name="keyword"
                        value="{{old('keyword') ? old('keyword') :$articles->keyword}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan Gambar*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="detail_img" name="detail_img"
                        value="{{old('detail_img') ? old('detail_img') :$articles->detail_img}}" required>
                    </div>
                </div>
                <div class="row was-validated">
                        <legend class="col-form-label col-sm-3 pt-0">Status Ketersediaan*</legend>
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
        <br><br>
        Disunting Oleh: <strong> @foreach ($articles->user->where('id', $articles->updated_by)->get() as $user) {{$user->longname}} @endforeach </strong> <br>
        Disunting Pada: {{$articles->updated_at}}
        </p>
        </div>
    </main>
    @endsection