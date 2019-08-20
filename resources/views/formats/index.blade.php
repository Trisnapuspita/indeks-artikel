@extends('layouts.app')

@section('content')
        <!--PAGE CONTENT -->
        <div id="content">
            @if (session('msg'))
            <div class="alert alert-success">
                <p> {{session('msg')}} </p>
            </div>
            @endif
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> Setting Format </h2>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-12">
                        <a href='/formats/create' class="btn btn-primary btn-lg">Tambah</a>
                    </div>
                </div>
                <br>

                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Setting
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Jenis</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($formats as $format)
                                        <tr class="odd gradeX">
                                            <td>{{$format->id}}</td>
                                            <td>{{$format->title}}</td>
                                            <td>
                                                <a href='/formats/{{$format->id}}/edit' class="btn btn-primary">Sunting</a>
                                                <form method="POST" action="/formats/{{$format->id}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
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
@endsection