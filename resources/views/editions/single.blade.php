@extends('layouts.mix')

@section('title')
Indeks Artikel | Article
@endsection

@section('content')
<main style="background: white; padding: 45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item"><a href="sumber.html">Sumber</a></li>
                <li class="breadcrumb-item"><a href="sumber.html">Tempo : Madjalah Berita Mingguan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edisi 1</li>
            </ol>
        </div>
        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            <h5
                style="width: 100%;background: whitesmoke; height: 50px; padding-top:15px; padding-left: 15px; border-radius: 4px">Tambah Artikel<i class="fas fa-angle-down" style="padding-right: 20px; float: right"></i></h5>
        </a>
        <div id="collapseExample">
            <div class="container" style="background:whitesmoke;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
                 <form class="form-horizontal" id="popup-validation" method="POST" action="/articles/{{$editions->id}}" enctype="multipart/form-data">
                    <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Data Artikel Sumber</h4>
                    <fieldset class="form-group">
                        <div class="form-group row was-validated">
                            <label class="col-sm-2 col-form-label">Judul Artikel*</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder=""  name="article_title" value="{{old('article_title')}}" required>
                            </div>
                        </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Pengarang*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="writer" value="{{old('writer')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Halaman*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="pages" value="{{old('pages')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Kolom*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="column" value="{{old('column')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Sumber*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="source" value="{{old('source')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Deskripsi Singkat*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="desc" value="{{old('desc')}}" required>
                        </div>
                    </div>
                    </fieldset>

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
                                            <option value="2">Judul</option>
                                            <option value="3">Pengarang</option>
                                            <option value="4">Halaman</option>
                                            <option value="5">Kolom</option>
                                            <option value="6">Sumber Online</option>
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
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Halaman</th>
                    <th>Kolom</th>
                    <th>Sumber Online</th>
                    <th>Deskripsi Singkat</th>
                    <th> </th>
                </tr>
			</thead>
			<tbody>
            @php $i=1 @endphp
            @foreach ($editions->articles as $article)
                <tr class="GridItem">
                    <td style="width:20px;text-align: center">{{$i++}}</td>
                    <td style="width:100px;">{{$article->article_title}}</td>
                    <td style="width:100px;">{{$article->writer}}</td>
                    <td style="width:100px;">{{$article->pages}}</td>
                    <td style="width:100px;">{{$article->column}}</td>
                    <td style="width:100px;">{{$article->source}}</td>
                    <td style="width:100px;">{{$article->desc}}</td>
                    <td style="width:100px">
                        <div class="row">
                            <div class="col-md-2">
                                <a href='/articles/{{$article->id}}/edit'><button>Sunting</button></a>
                            </div>
                            <div class="col-md-2">
                                <p>     </p>
                            </div>
                            <div class="col-md-2">
                                <p></p>
                            </div>
                            <div class="col-md-2">
                                <form method="POST" action="/articles/{{$article->id}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit">Hapus</button>
                                    </form>
                                </div>
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
