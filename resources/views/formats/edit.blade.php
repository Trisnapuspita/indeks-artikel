@extends('layouts.coba')

@section('content')
        <div id="content">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form method="POST" action="/formats/{{$format->id}}">
                <div class= "form-group">
                    <label for="title">Judul</label>
                    <input format="text" name="title" class="form-control" 
                    value="{{old('title') ? old('title') :$format->title}}" placeholder="tulis nama disini">
                </div>

                {{csrf_field() }}

                <input format='hidden' name='_method' value='PUT'>
                
                <button format="submit" class="btn btn-default btn-block">Simpan</button>
                
            </form>
    </div>
@endsection
