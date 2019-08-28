@extends('layouts.table')

@section('content')
<main style="background: white; padding:45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sumber</li>
            </ol>
        </div>
        <table id="Filtering" style="width: 100%">
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
                    <td style="text-align: right; padding: 10px;">
                        <table style="float: right">
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="search box" name="ctl00$ContentPlaceHolder1$ddlKriteria"
                                            id="ContentPlaceHolder1_ddlKriteria" style="width:154px;">
                                            <option selected="selected" value="Source">Judul</option>
                                            <option value="type.NAME">Jenis</option>
                                            <option value="wp.NAME">Kala Terbit</option>
                                            <option value="PUBLISHLOCATION">Tempat Terbit </option>
                                            <option value="PUBLISHER">Penerbit</option>
                                            <option value="PUBLISHYEAR">Tahun Terbit</option>
                                            <option value="PUBLISHYEARFIRST">Tahun Terbit Pertama</option>
                                            <option value="lang.NAME">Bahasa</option>
                                            <option value="form.NAME">Format</option>
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
        <div class="createnew" style="padding-bottom: 10px">
            <a href="/titles/create"><button>Tambah Sumber</button></a>
            <a href=""><button>Import</button></a>
        </div>
        <table class="Grid" cellspacing="0" cellpadding="4" id="ContentPlaceHolder1_dgData"
            style="font-family:Tahoma;font-size:12px;width:100%;border-collapse:collapse;">
           <thead>
                <tr class="GridHeader">
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Judul Sumber</th>
                    <th>&nbsp;</th>
                    <th>Jenis</th>
                    <th>Kala Terbit</th>
                    <th>Tempat Terbit</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Tahun Terbit Pertama</th>
                    <th>Bahasa</th>
                    <th>Format</th>
                    <th>Jumlah Edisi</th>
                    <th>Jumlah Artikel</th>
                </tr>
			</head>
			<tbody>
            @php $i=1 @endphp
			@foreach ($titles as $title)
                <tr class="GridItem">
                    <td style="width:20px; text-align: center">{{ $i++ }}</td>
                    <td><img src="{{asset('storage/upload/'. $title->featured_img) }}" style="max-width: 150px; height: auto; "class="image-fluid"></td>
                    <td style="width:300px; text-align: center"><a href="/titles/{{$title->slug}}">{{$title->title}}</a></td>
                    <td style="width:100px;text-align: center">
						<a href="/titles/{{$title->id}}/edit"><button class="fa fa-pencil"></button></a>
						<a><form method="POST" action="/titles/{{$title->id}}">
                        {{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit" class="fa fa-trash"></button></form></a></td>
                    <td style="width:150px; text-align: center">@foreach ($title->types()->get() as $types){{$types->title}}@endforeach</td>
                    <td style="width:150px; text-align: center">@foreach ($title->times()->get() as $times){{$times->title}}@endforeach</td>
                    <td style="width:150px; text-align: center">{{$title->city}}</td>
                    <td style="width:150px;text-align: center">{{$title->publisher}}</td>
                    <td style="width:150px; text-align: center">{{$title->year}}</td>
                    <td style="width:150px; text-align: center">{{$title->first_year}}</td>
                    <td style="width:100px; text-align: center">@foreach ($title->languages()->get() as $languages){{$languages->title}}@endforeach</td>
                    <td style="width:100px; text-align: center">@foreach ($title->formats()->get() as $formats){{$formats->title}}@endforeach</td>
                    <td style="width:100px; text-align: center">-<a href="/titles/{{$title->slug}}"><button style="float: right"><strong>+</strong></button></a></td>
                    <td style="width:100px; text-align: center">-<a href="/articles/create"><button style="float: right"><strong>+</strong></button></a></td>
                </tr>
				 @endforeach
            </tbody>
        </table>
        <nav style="padding-top:10px;">
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
