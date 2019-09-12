@extends('layouts.table')

@section('title')
Indeks Artikel | Artikel
@endsection

@section('content')
<main style="background: white; padding: 45px">

        {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif

		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $sukses }}</strong>
		</div>
		@endif

        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/titles">Sumber</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artikel</li>

            </ol>
        </div>
        <div class="createnew" style="padding-bottom: 10px">
            <a href="/articles/create"><button>Tambah</button></a>
            <a data-toggle="modal" data-target="#importExcel"><button>Import</button></a>
        </div>


        <!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/articles/import_excel" enctype="multipart/form-data">
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
        <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
            <thead>

                <tr class="GridHeader" style="text-align: center">
                    <th>No</th>
                    <th>Judul</th>
                    <th>Subyek</th>
                    <th>Pengarang</th>
                    <th>Halaman</th>
                    <th>Kolom</th>
                    <th>Sumber</th>
                    <th>Deskripsi Singkat</th>
                    <th>Kata Kunci</th>
                    <th>Keterangan Gambar</th>
                    <th>Status Ketersediaan</th>
                    <th>Status Verifikasi</th>
                    <th>Action</th>
                </tr>
			</thead>
			<tbody>
            @php $i=1 @endphp
            @foreach ($articles as $article)
                <tr class="GridItem">
                    <td>{{$i++}}</td>
                    <td>{{$article->article_title}}</td>
                    <td>{{$article->subject}}</td>
                    <td>{{$article->writer}}</td>
                    <td>{{$article->pages}}</td>
                    <td>{{$article->column}}</td>
                    <td>{{$article->source}}</td>
                    <td>{{$article->desc}}</td>
                    <td>{{$article->keyword}}</td>
                    <td>{{$article->detail_img}}</td>
                    <td>@foreach ($article->statuses()->get() as $statuses) {{$statuses->title}} @endforeach</td>
                    @if($article->verification==1)
                    <td>Sudah Terverifikasi</td>
                    @elseif($article->verification==0)
                    <td>Belum Terverifikasi</td>
                    @endif
                    <td style="center";>
                            <div class="col-md-2">
                                <a href='/articles/{{$article->id}}/edit'><button class="fas fa-edit" title="Edit" style="width:35px;height:35px"></button></a>
                            </div>
                            <br>
                            <div class="col-md-2">
                                <form method="POST" action="/articles/{{$article->id}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="fa fa-trash" style="width:35px;height:35px" title="Hapus" onclick="return confirm('Apakah Anda yakin untuk menghapus?')"></button>
                                </form>
                            </div>
                            <br>
                            <div class="col-md-2">
                                <a href='/articles/{{$article->id}}/verif'><button class="fa fa-check" title="Verifikasi" style="width:35px;height:35px" onclick="return confirm('Apakah Anda yakin untuk melakukan verifikasi?')"></button></a>
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
                            <a href="/articles/export_excel"><img src="../../assets/Export_Excel.png"
                                style="margin-top:10px;font-family:Arial;font-size:X-Small;height:40px;"></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection