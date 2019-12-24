@extends('layouts.form')

@section('title')
Indeks Artikel | Buat Master Jenis
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
                <li class="breadcrumb-item"><a href="Master-Kalaterbit.html">Setting Master</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Master Kala Terbit</li>
            </ol>
        </div>
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
            <form class="form" method="POST" action="/times">
                <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">
                    Buat Master Kala Terbit</h4>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="tulis nama disini">
                            </div>
                    </div>

                            {{csrf_field() }}
                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-dark"
                        style="text-align: center; width:100%; color:white; font-size: 17px; font-weight: 2px">S i m p
                        a n</button>
                </div>
            </form>
        </div>
</main>
@endsection
