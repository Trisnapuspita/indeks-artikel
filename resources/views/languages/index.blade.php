@extends('layouts.table')

@section('title')
Indeks Artikel | Master Bahasa
@endsection

@section('content')
    <menu>
            @if (session('msg'))
            <div class="alert alert-success">
                <p> {{session('msg')}} </p>
            </div>
            @endif
        <div class="mr-auto" style="padding-top: 30px">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/languages">Setting Master</a></li>
                <li class="breadcrumb-item active" aria-current="/languages">Master Bahasa</li>
            </ol>
        </div>
		
		
		<div class="container mb-5 mt-3">
                    <div class="col-lg-10">
                        <a class="btn btn-dark" href="/languages/create">Tambah</a>
                        <a class="btn btn-dark" href=''>Import</a>
                    </div>
                </div>
				
        <div class="container mb-5 mt-3">
            <table class="table table-striped table-bordered" id="mydatatable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Jenis</th>
                        <th scope="col">Jumlah</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
				@foreach ($languages as $language)
                    <tr>
                        <th scope="row">{{$language->id}}</th>
                        <td>{{$language->title}}</td>
                        <td><a href="">11</a></td>
                        <td> <div>
                            <a class="btn btn-dark" href='/languages/{{$language->id}}/edit'>Sunting</a>
                                <form method="POST" action="/languages/{{$language->id}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
				@endforeach
                </tbody>
            </table>
        </div>
				
        <div id="divTools" class="ToolsTable" style="padding: 2%">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            Data yang akan diexport:<br>
                            <select name="ctl00$ContentPlaceHolder1$Exporter1$ddlExportData"
                                id="ContentPlaceHolder1_Exporter1_ddlExportData" style="width:150px;">
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
    </menu>            
@endsection