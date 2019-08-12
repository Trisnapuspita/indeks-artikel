@extends('layouts.coba')

@section('content')
<div id="content">

    <!-- @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif -->

        <form method="POST" action="/types">
            <div class= "form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="tulis nama disini">
            </div>

            {{csrf_field() }}

            <button type="submit" class="btn btn-default btn-block">Simpan</button>
        </form>
</div>
@endsection
