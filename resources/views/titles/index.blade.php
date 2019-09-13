@extends('layouts.table')

@section('title')
Indeks Artikel | Judul Sumber
@endsection

@section('content')
<main style="background: white; padding:45px">

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
                <li class="breadcrumb-item"><a href="/home">Sumber</a></li>
                <li class="breadcrumb-item active" aria-current="page">Judul</li>
            </ol>
        </div>
        <div class="createnew" style="padding-bottom: 10px">
            <a href="/titles/create"><button>Tambah</button></a>
            <a data-toggle="modal" data-target="#importExcel"><button>Import</button></a>
        </div>

        <div class="search" style="text-align: right">
            <select class="box">
                <option disabled selected hidden>Semua Jenis</option>
                <option class="dropdown-item" href="#">Judul</option>
                <option class="dropdown-item" href="#">Jenis</option>
                <option class="dropdown-item" href="#">Kala Terbit</option>
                <option class="dropdown-item" href="#">Tempat Terbit</option>
                <option class="dropdown-item" href="#">Penerbit</option>
                <option class="dropdown-item" href="#">Tahun Terbit</option>
                <option class="dropdown-item" href="#">Tahun Terbit Pertama</option>
                <option class="dropdown-item" href="#">Bahasa</option>
                <option class="dropdown-item" href="#">Format</option>
            </select>
            <select class="box">
                <option disabled selected hidden>Semua Waktu</option>
                <option class="dropdown-item" href="#">Tepat</option>
                <option class="dropdown-item" href="#">Dimulai Dengan</option>
                <option class="dropdown-item" href="#">Diakhiri Dengan</option>
                <option class="dropdown-item" href="#">Salah Satu Isi</option>
            </select>
            <input type="text" class="search-box" placeholder="Kata Kunci">
            <button type="submit" class="searchButton"><img src="../assets/magnifying-glass-2x.png">
            </button>
        </div>

        <!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/titles/import_excel" enctype="multipart/form-data">
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
                <tr class="GridHeader">
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Judul Sumber</th>
                    <th>Kode</th>
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
                    <th>Action</th>
                </tr>
			</head>
			<tbody>
            @php $i=1 @endphp
			@foreach ($titles as $title)
                <tr class="GridItem">
                    <td>{{ $i++ }}</td>
                    @if($title->featured_img == null)
                    <td><img src="{{asset('storage/upload/default.png')}}" style="max-width: 100px; height: auto;" class="image-fluid"></td>
                    @else
                    <td><img src="{{asset('storage/upload/'. $title->featured_img) }}" style="max-width: 100px; height: auto; "class="image-fluid"></td>
                    @endif
                    <td>{{$title->title}}</td>
                    <td></td>
                    <td>@foreach ($title->types()->get() as $types){{$types->title}}@endforeach</td>
                    <td>@foreach ($title->times()->get() as $times){{$times->title}}@endforeach</td>
                    <td>{{$title->city}}</td>
                    <td>{{$title->publisher}}</td>
                    <td>{{$title->year}}</td>
                    <td>{{$title->first_year}}</td>
                    <td>@foreach ($title->languages()->get() as $languages){{$languages->title}}@endforeach</td>
                    <td>@foreach ($title->formats()->get() as $formats){{$formats->title}}@endforeach</td>
                    <td>{{$editions->where('title_id',$title->id)->count()}}<a href="/titles/{{$title->slug}}"><button style="float: right"><strong>+</strong></button></a></td>
                    <td style="text-align: center">{{$articles->whereIn('edition_title_id',$editions->where('title_id',$title->id)->pluck('id'))->count()}}
                    <a href="/articles/create"><button style="float: right"><strong>+</strong></button></a></td>
                    <td style="text-align: center">
						<a href="/titles/{{$title->id}}/edit"><button class="fas fa-edit" style="width:30px;height:30px"></button></a>
                        <br><br>
						<a><form method="POST" action="/titles/{{$title->id}}">
                        {{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE"><button type="submit" class="fa fa-trash"
                            style="width:30px;height:30px" onclick="return confirm('Apakah Anda yakin untuk menghapus?')"></button></form></a>
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
                            <a href="/titles/export_excel"><img src="../../assets/Export_Excel.png"
                                style="margin-top:10px;font-family:Arial;font-size:X-Small;height:40px;"></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
