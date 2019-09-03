@extends('layouts.mix')

@section('title')
Indeks Artikel | Edisi
@endsection

@section('content')
<main style="background: white; padding: 45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/titles">Sumber</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title->title }}</li>
            </ol>
        </div>

        <div class="createnew" style="padding-bottom: 10px">
            <a data-toggle="modal" data-target="#importExcel"><button>Import</button></a>
        </div>

        <!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/editions/import_excel/{{$title->id}}" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">

							{{ csrf_field() }}

							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            <h5
                style="width: 100%;background: whitesmoke; height: 50px; padding-top:15px; padding-left: 15px; border-radius: 4px">Tambah Edisi<i class="fas fa-angle-down" style="padding-right: 20px; float: right"></i></h5>
        </a>
        <div id="collapseExample">
            <div class="container" style="background:whitesmoke;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
                 <form class="form-horizontal" id="popup-validation" method="POST" action="/editions/{{$title->id}}" enctype="multipart/form-data">
                    <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Data Edisi Sumber</h4>
                    <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan Edisi</label>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Tahun"
								 name="edition_year" value="{{old('edition_year')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Edisi"
								name="edition_title" value="{{old('edition_title')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Volume"
								name="volume" value="{{old('volume')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Jilid"
								name="chapter" value="{{old('chapter')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="No"
								name="edition_no" value="{{old('edition_no')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="validationServer03">Tanggal Terbit
                                Edisi*</label>
                             <div class="col-lg-2">
                                            <label >Tanggal
                                                <input class="form-control" type="text" tabindex="6"
                                                name="publish_date" value="{{old('publish_date')}}" placeholder="Tanggal">
                                            </label>
                                    </div>
                                    <div class="col-lg-2">
                                            <label >Bulan
                                            <select class="form-control custom-select"name="publish_month" id="publish_month_Select" required>
                                                <option disabled selected hidden>Pilih Bulan</option>
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
                                                name="publish_year" value="{{old('publish_year')}}" placeholder="Tahun">
                                            </label>
                                    </div>
							</div>
                    </fieldset>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Penulisan Tanggal Asli*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="original_date" value="{{old('original_date')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label" for="validationServer03">No. Panggil*</label>
                        <div class="col-sm-10">
                            <input class="form-control is-invalid" type="text" placeholder="" name="call_number" value="{{old('call_number')}}"
                                required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Gambar :</label>
                        <div class="col-sm-10">
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
                    <div class="form-group" style="text-align: center">
                        <button type="submit" class="btn btn-dark"
                            style="text-align: center; width:100%; color:white; font-size: 17px; font-weight: 2px">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br>
        <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
            <thead>
                <tr class="GridHeader" style="text-align: center">
					<td>No</td>
                    <th>Gambar</th>
                    <th>Keterangan Edisi</th>
                    <th>Tahun</th>
                    <th>Edisi</th>
                    <th>Volume</th>
                    <th>Jilid</th>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Nomor Panggil</th>
                    <th>Judul Artikel</th>
                    <th>Jumlah Artikel</th>
                    <th>Action</th>
                </tr>
			</thead>
			<tbody>
            @php $i=1 @endphp
            @foreach ($title->editions as $edition)
                <tr class="GridItem">
					<td>{{ $i++ }}</td>
                    @if($edition->edition_image == null)
                    <td><img src="{{asset('storage/upload/default.png')}}" style="max-width: 150px; height: auto; "class="image-fluid"></td>
                    @else
                    <td><img src="{{asset('storage/upload/'. $edition->edition_image) }}" style="max-width: 150px; height: auto; "class="image-fluid"></td>
                    @endif
                    <td style="width:300px;"><a href="/editions/{{$edition->slug}}">{{$edition->edition_year}}, {{$edition->edition_no}}, {{$edition->original_date}}</a></td>
                    <td style="width:100px;">{{$edition->edition_year}}</td>
                    <td style="width:100px;">{{$edition->edition_title}}</td>
                    <td style="width:100px;">{{$edition->volume}}</td>
                    <td style="width:100px;">{{$edition->chapter}}</td>
                    <td style="width:100px;">{{$edition->edition_no}}</td>
                    <td style="width:150px;">{{$edition->original_date}}</td>
                    <td style="width:150px;">{{$edition->call_number}}</td>
                    <td style="width:300px;">{{ $title->title }}</td>
                    <td style="width:100px;">49</td>
                    <td style="width:100px; text-align: center;">
                            <a href='/editions/{{$edition->id}}/edit'><button class="fas fa-edit" style="width:30px;height:30px"></button></a>
                            <br><br>
                            <form method="POST" action="/editions/{{$edition->id}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="fa fa-trash" style="width:30px;height:30px"></button>
                                </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="divTools" class="ToolsTable" style="padding-bottom: 10px">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            Export:
                        </td>
                        <td style="border-right-style: solid; border-right-width: 1px; border-right-color: #EBEBEB">
                            &nbsp;</td>
                        <td>
                            <a href="/editions/export_excel/{{$title->id}}"><img src="../../assets/Export_Excel.png"
                                style="margin-top:10px;font-family:Arial;font-size:X-Small;height:40px;"></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
