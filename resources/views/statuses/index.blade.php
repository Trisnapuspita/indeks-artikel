@extends('layouts.table')

@section('title')
Indeks Artikel | Master Status Ketersediaan
@endsection

@section('content')
<main style="background: white; padding:45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Setting Master</a></li>
                <li class="breadcrumb-item active" aria-current="page">Master Status Ketersediaan</li>
            </ol>
        </div>
        <div class="createnew" style="padding-bottom: 10px">
            <a href="/statuses/create"><button>Tambah Baru</button></a>
            <button>Import</button>
        </div>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="GridHeader">
                    <th>No.</th>
                    <th>Nama Jenis</th>
                    <th>Jumlah Judul Sumber</th>
                    <th>Action</th>
                </tr>
			</thead>
			<tbody>
			@foreach ($statuses as $status)
                <tr class="GridItem">
                    <td style="width:20px;">{{$status->id}}</td>
                    <td style="width:80px;">{{$status->title}}</td>
                    <td style="width:50px;">....</td>
					<td style="width:50px;"> 
                    <div class="row" style="">
                        <div class="col-md-2">
                        <a href='/statuses/{{$status->id}}/edit'><button class="btn btn-primary">Sunting</button></a>
                        </div>
                        <div class="col-md-2">
                           <p>  </p>
                        </div>
                        <div class="col-md-2">
                            <form method="POST" action="/statuses/{{$status->id}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
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