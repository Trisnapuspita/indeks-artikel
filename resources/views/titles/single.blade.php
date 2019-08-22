@extends('layouts.coba')

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
                            <form class="form-horizontal" id="popup-validation" method="POST" action="/editions/{{$title->id}}" enctype="multipart/form-data">
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
                                            <label >Tanggal
                                                <input class="form-control" type="text" tabindex="6" 
                                                name="publish_date" value="{{old('publish_date')}}">
                                            </label>
                                    </div>
                                    <div class="col-lg-2">
                                            <label >Bulan
                                                <input class="form-control" type="text" tabindex="6" 
                                                name="publish_month" value="{{old('publish_month')}}">
                                            </label>
                                    </div>
                                    <br>
                                    <div class="col-lg-2">
                                    <label >Tanggal
                                                <input class="form-control" type="text" tabindex="6" 
                                                name="publish_date" value="{{old('publish_date')}}">
                                            </label>
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
                    <div>
                        <div>
                            Sumber Bacaan
                        </div>
                        <div>
                            <div>
                                <table>
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
                                    @foreach ($title->editions as $edition)
                                        <tr>
                                            <td>{{$edition->id}}</td>
                                            <td><img src="{{asset('storage/upload/'. $edition->edition_image)}}" style="max-width: 150px; height: auto; "class="image-fluid"></td>
                                            <td>{{$edition->edition_year}}</td>
                                            <td>{{$edition->edition_title}}</td>
                                            <td>Disana disini dimanamana</td>
                                            <td>
                                                <button href=" " class="btn btn-primary">Tambah</button>
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
</div>    
@endsection