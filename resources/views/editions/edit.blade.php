@extends('layouts.form')

@section('title')
Indeks Artikel | Edit Edisi
@endsection

@section('content')
<main style="background: white; padding: 45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="sumber.html">Sumber</a></li>
                <li class="breadcrumb-item"><a href="sumber.html">Tempo : Madjalah Berita Mingguan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
        <div id="collapseExample">
            <div class="container" style="background:whitesmoke;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
                 <form class="form-horizontal" id="popup-validation" method="POST" action="/editions/{{$editions->id}}" enctype="multipart/form-data">
                    <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Edit Edisi Sumber</h4>
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan Edisi</label>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Tahun"
								 name="edition_year" value="{{old('edition_year') ? old('edition_year') :$editions->edition_year}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Edisi"
								name="edition_title" value="{{old('edition_title')  ? old('edition_title') :$editions->edition_title}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Volume"
								name="volume" value="{{old('volume')  ? old('volume') :$editions->volume}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Jilid"
								name="chapter" value="{{old('chapter')  ? old('chapter') :$editions->chapter}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="No"
								name="edition_no" value="{{old('edition_no')  ? old('edition_no') :$editions->edition_no}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="validationServer03">Tanggal Terbit
                                Edisi*</label>
                             <div class="col-lg-2">
                                            <label >Tanggal
                                                <input class="form-control" type="text" tabindex="6" 
                                                name="publish_date" value="{{old('publish_date')  ? old('publish_date') :$editions->publish_date}}" placeholder="Tanggal">
                                            </label>
                                    </div>
                                    <div class="col-lg-2">
                                            <label >Bulan
                                            <select class="form-control custom-select"name="publish_month" 
                                            id="publish_month_Select" value="{{old('publish_month') ? old('publish_month') :$editions->publish_month}}" required>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                            </label>
                                    </div>
                                    <br>
                                    <div class="col-lg-2">
                                    <label >Tahun
                                                <input class="form-control" type="text" tabindex="6" 
                                                name="publish_year" value="{{old('publish_year') ? old('publish_year') :$editions->publish_year}}" placeholder="Tahun">
                                            </label>
                                    </div>
							</div>
                    </fieldset>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Penulisan Tanggal Asli*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="original_date" value="{{old('original_date') ? old('original_date') :$editions->original_date}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label" for="validationServer03">No. Panggil*</label>
                        <div class="col-sm-10">
                            <input class="form-control is-invalid" type="text" placeholder="" name="call_number" value="{{old('call_number')  ? old('call_number') :$editions->call_number}}"
                                required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Gambar :</label>
                        <div class="col-sm-10">
                        <img src="/storage/upload/{{$editions->edition_image}}" style="max-width: 150px; height: auto; "class="image-fluid"> 
                        <br>
						<input type="file" name="edition_image" id="edition_image">
						@if ($errors->has('edition_image'))
							<span class="help-block">
								<strong>{{ $errors->first('edition_image') }}</strong>
							</span>
							@endif
                            </div>
                    </div>
                    
                    {{ csrf_field() }}

                    (*) Wajib Diisi
                    <div class="form-group" style="text-align: center;">
                    <button type="submit"  class="btn btn-dark" name="submit"
                    style="text-align: center; width:100%; color:white; font-size: 17px; font-weight: 2px" onclick="return confirm('Apakah Anda yakin untuk mengedit?')">
                    EDIT</button>
                                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                </div>
                </form>
            </div>
        </div>
    </div>

    <br>

    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            <h5
                style="width: 100%;background: whitesmoke; height: 50px; padding-top:15px; padding-left: 15px; border-radius: 4px">Rincian<i class="fas fa-angle-down" style="padding-right: 20px; float: right"></i></h5>
        </a>

        <div id="collapseExample">
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
        <table id="example" class="table table-striped table-bordered">
           <thead>
                <tr class="GridHeader">
                    <th>No.</th>
                    <th>Dibuat Oleh</th>
                    <th>Diedit Oleh</th>
                    <th>Dibuat Pada</th>
                    <th>Diedit Pada</th>
                </tr>
        </head>
        <tbody>
        @php $i=1 @endphp
        <tr class="GridItem">
                    <td>{{ $i++ }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
            </tbody>
        </table>
            </div>
        </div>
</main>
@endsection