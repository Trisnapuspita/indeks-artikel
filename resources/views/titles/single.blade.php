@extends('layouts.mix')

@section('title')
Indeks Artikel | Edisi
@endsection

@section('content')
<main style="background: white; padding: 45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="sumber.html">Sumber</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tempo : Madjalah Berita Mingguan</li>
            </ol>
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
        <table id="Filtering" style="width: 100%;">
            <tbody>
                <tr>
                    <td style="width: 300px">
                        Show :
                        <select name="ctl00$ContentPlaceHolder1$ddlPage"
                            onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ddlPage\',\'\')', 0)"
                            id="ContentPlaceHolder1_ddlPage" style="width:50px; height:29.3px">
                            <option selected="selected" value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>

                        </select>
                        entries
                    </td>
                    <td style="text-align: right; padding-top:10px; padding-bottom: 20px;">
                        <table style="float: right">
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="search box" name="ctl00$ContentPlaceHolder1$ddlKriteria"
                                            id="ContentPlaceHolder1_ddlKriteria" style="width:154px;">
                                            <option selected="selected" value="1">Ket. Edisi</option>
                                            <option value="2">Tahun</option>
                                            <option value="3">Edisi</option>
                                            <option value="4">Volume</option>
                                            <option value="5">Jilid</option>
                                            <option value="6">Nomor</option>
                                            <option value="7">Tanggal</option>
                                            <option value="8">Nomor Panggil</option>
                                            <option value="8"> </option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search search-box" name="ctl00$ContentPlaceHolder1$txtKataKunci"
                                            type="text" id="ContentPlaceHolder1_txtKataKunci" style="width:150px;">
                                    </td>
                                    <td>
                                        <button type="submit" class="searchButton"><img
                                                src="../../assets/magnifying-glass-2x.png">
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="Grid" cellspacing="0" cellpadding="4"
            style="font-family:Tahoma;font-size:12px;width:100%;border-collapse:collapse;">
            <thead>
                <tr class="GridHeader" style="text-align: center">
                    <th>No</th>
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
            @foreach ($title->editions as $edition)
                <tr class="GridItem">
                    <td style="width:20px;text-align: center">{{$edition->id}}</td>
                    <td><img src="{{asset('storage/upload/'. $edition->edition_image) }}" style="max-width: 150px; height: auto; "class="image-fluid"></td>
                    <td style="width:300px;"><a href="/editions/{{$edition->slug}}">{{$edition->edition_year}}, {{$edition->edition_no}}, {{$edition->original_date}}</a></td>
                    <td style="width:100px;">{{$edition->edition_year}}</td>
                    <td style="width:100px;">{{$edition->edition_title}}</td>
                    <td style="width:100px;">{{$edition->volume}}</td>
                    <td style="width:100px;">{{$edition->chapter}}</td>
                    <td style="width:100px;">{{$edition->edition_no}}</td>
                    <td style="width:150px;">{{$edition->original_date}}</td>
                    <td style="width:150px;">{{$edition->call_number}}</td>
                    <td style="width:300px;">TEMPO : Madjalah Berita Mingguan</td>
                    <td style="width:100px;">49</td>
                    <td style="width:100px; text-align: center;">
                    <div class="row" style="text-align: center">
                        <div>
                            <a href='/editions/{{$edition->id}}/edit'><button>Sunting</button></a>
                            <br>
                            <form method="POST" action="/editions/{{$edition->id}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit">Hapus</button>
                                </form>
                            </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav style="padding-top:30px;">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1<span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item" aria-current="page">
                    <a class="page-link" href="#">2 </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        <div id="divTools" class="ToolsTable" style="padding-bottom: 10px">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            Data yang akan diexport:
                            <select name="ctl00$ContentPlaceHolder1$Exporter1$ddlExportData"
                                id="ContentPlaceHolder1_Exporter1_ddlExportData" style="width:150px; height: 29.3px;">
                                <option value="0">Halaman ini saja</option>
                                <option value="1">Semua data</option>
                                <option value="2">Maks. jumlah data</option>

                            </select>
                            <input name="ctl00$ContentPlaceHolder1$Exporter1$txtMaksJumlahData" type="text" value="200"
                                id="ContentPlaceHolder1_Exporter1_txtMaksJumlahData"
                                onkeypress="NumericValidation(event)" style="width: 25px; display: none;">
                        </td>
                        <td style="border-right-style: solid; border-right-width: 1px; border-right-color: #EBEBEB">
                            &nbsp;</td>
                        <td>
                            <input type="image" name="ctl00$ContentPlaceHolder1$Exporter1$btExportToExcel"
                                id="ContentPlaceHolder1_Exporter1_btExportToExcel" title="Export To Excel"
                                src="../../assets/Export_Excel.png"
                                style="margin-top:10px;font-family:Arial;font-size:X-Small;height:40px;">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection