@extends('layouts.app')

@section('content')
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h2> Sumber Bacaan </h2>
            </div>
        </div>
        <hr /> 
            <!-- TABLE -->

            <div class="row">
                    <div class="col-lg-12">
                        <a href='/titles/create' class="btn btn-primary btn-lg">Tambah</a>
                    </div>
                </div>
                <br>

                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sumber Bacaan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Gambar</th>
                                            <th>Judul Sumber</th>
                                            <th>    </th>
                                            <th>Jenis</th>
                                            <th>Kala Terbit</th>
                                            <th>Tempat Terbit</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Bahasa</th>
                                            <th>Format</th>
                                            <th>Jumlah Edisi</th>
                                            <th>    </th>
                                            <th>Jumlah Artikel</th>
                                            <th>    </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($titles as $title)
                                        <tr>
                                            <td>{{$title->id}}</td>
                                            <td><img src="{{asset('storage/upload/'. $title->featured_img) }}" style="max-width: 150px; height: auto; "class="image-fluid"></td>
                                            <td>{{$title->title}}</td>
                                            <td>
                                            <div class="col-md-2">
                                                    <p><a href="/titles/{{$title->id}}/edit" class="btn btn-primary">EDIT</a></p>
                                                <form method="POST" action="/titles/{{$title->id}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                                </form>
                                            </div>
                                            </td>
                                            <td>@foreach ($title->types()->get() as $types){{$types->title}}
                                             @endforeach</td>
                                             <td>@foreach ($title->times()->get() as $times){{$times->title}}
                                             @endforeach</td>
                                            <td>{{$title->city}}</td>
                                            <td>{{$title->publisher}}</td>
                                            <td>{{$title->year}}</td>
                                            <td>@foreach ($title->languages()->get() as $languages){{$languages->title}}
                                             @endforeach</td>
                                             <td>@foreach ($title->formats()->get() as $formats){{$formats->title}}
                                             @endforeach</td>
                                            <td> 5 </td>
                                            <td>
                                            <a href="/titles/{{$title->slug}}" class="btn btn-primary">Tambah</a>
                                            </td>
                                            <td> 5 </td>
                                            <td>
                                            <a href=""
                                            class="btn btn-primary">Tambah</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>    
@endsection