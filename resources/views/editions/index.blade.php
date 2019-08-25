@extends('layouts.app')

@section('content')
<div id="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h2> Edisi </h2>
            </div>
        </div>
        <hr /> 
        <!--form-->

        <div class="row">
                <div class="col-lg-10">
                    <div class="box">
                        <header class="dark">
                            <h5>Membuat Edisi Sumber</h5>
                        </header>
                        <div>
                            <form class="form-horizontal" id="popup-validation" method="POST" action="/editions" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Keterangan Edisi :</label>
                                        <div class="col-lg-2">
                                            <label>Tahun
                                                <input class="form-control" type="text" maxlength="4" tabindex="5" 
                                                name="edition_year" value="{{old('edition_year')}}"/>
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label >Edisi
                                                <input class="form-control" type="text" tabindex="6" 
                                                name="edition_title" value="{{old('edition_title')}}"/>
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>Volume
                                                <input class="form-control" type="text" tabindex="7" 
                                                name="volume" value="{{old('volume')}}"/>
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label >Jilid
                                                <input class="form-control" type="text" tabindex="8" 
                                                name="chapter" value="{{old('chapter')}}"/>
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>No
                                                <input class="form-control" type="text"  tabindex="9" 
                                                name="edition_no" value="{{old('edition_no')}}"/>
                                            </label>
                                        </div>
                                    
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tanggal Terbit Edisi * :</label>
                                    <div class="col-lg-2">
                                        <select name="publish_date" value="{{old('publish_date')}}" class="validate[required] form-control">
                                            <option type="number" min="1" max="31" value="">-- Tanggal --</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-lg-2">
                                        <select class="validate[required] form-control"
                                        name="publish_month" value="{{old('publish_month')}}">
                                            <option value="option">-- Bulan --</option>
                                            <option value="option1">Januari</option>
                                            <option value="option2">Februari</option>
                                            <option value="option3">Maret</option>
                                            <option value="option4">April</option>
                                            <option value="option5">Mei</option>
                                            <option value="option1">Juni</option>
                                            <option value="option2">Juli</option>
                                            <option value="option3">Agustus</option>
                                            <option value="option4">September</option>
                                            <option value="option5">Oktober</option>
                                            <option value="option4">November</option>
                                            <option value="option5">Desember</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-lg-2">
                                        <input class="form-control autotab" type="text" name="publish_year" value="{{old('publish_year')}}" tabindex="11" placeholder="Tahun" />
                                     </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Penulisan Tanggal Asli :</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="validate[required] form-control" name="original_date" value="{{old('original_date')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Nomor Panggil :</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="validate[required] form-control" name="call_number" value="{{old('original_date')}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-1">Gambar :</label>
                                    <input type="file" name="edition_image" id="edition_image">
                                    @if ($errors->has('edition_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('edition_image') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    
                                 {{ csrf_field() }}
                                
                                <div style="text-align:center" class="form-actions no-margin-bottom">
                                    <button type="submit" class="btn btn-default">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TABLE -->

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
                                            <th>Tahun</th>
                                            <th>Judul Edisi</th>
                                            <th>Judul Artikel</th>
                                            <th>    </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($editions as $edition)
                                        <tr>
                                            <td>{{$edition->id}}</td>
                                            <td><img src="{{asset('storage/upload/'. $edition->edition_image) }}" style="max-width: 150px; height: auto; "class="image-fluid"></td>
                                            <td>{{$edition->year}}</td>
                                            <td>{{$edition->edition_title}}</td>
                                            <td>Judul Artikel</td>
                                            <td>
                                            <div class="col-md-2">
                                                    <p><a href='/editions/create' class="btn btn-primary">Tambah</p>
                                                    <p><a href="/editions/{{$edition->id}}/edit" class="btn btn-primary">EDIT</a></p>
                                                <form method="POST" action="/editions/{{$edition->id}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                                </form>
                                            </div>
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