@extends('layouts.table')

@section('title')
Indeks Artikel | Edisi
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
                <li class="breadcrumb-item active" aria-current="page">Edisi</li>
            </ol>

        </div>

        <div class="createnew" style="padding-bottom: 10px">
            <a href="/editions/create"><button>Tambah</button></a>
            <a data-toggle="modal" data-target="#importExcel"><button>Import</button></a>
        </div>

        <!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/editions/import_excel" enctype="multipart/form-data">
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
                    <th>Judul Sumber</th>
                    <th>Jumlah Artikel</th>
                    <th>Action</th>
                </tr>
			</thead>
			<tbody>
            @php $i=1 @endphp
            @foreach ($editions as $edition)
                <tr class="GridItem">
					<td>{{ $i++ }}</td>
                    @if($edition->edition_image == null)
                    <td><img src="{{asset('storage/upload/default.png')}}" style="max-width: 150px; height: auto; "class="image-fluid"></td>
                    @else
                    <td><img src="{{asset('storage/upload/'. $edition->edition_image) }}" style="max-width: 150px; height: auto; "class="image-fluid"></td>
                    @endif
                    <td style="width:300px;">{{$edition->edition_year}}, {{$edition->edition_no}}, {{$edition->original_date}}</td>
                    <td style="width:100px;">{{$edition->edition_year}}</td>
                    <td style="width:100px;">{{$edition->edition_title}}</td>
                    <td style="width:100px;">{{$edition->volume}}</td>
                    <td style="width:100px;">{{$edition->chapter}}</td>
                    <td style="width:100px;">{{$edition->edition_no}}</td>
                    <td style="width:150px;">{{$edition->original_date}}</td>
                    <td style="width:150px;">{{$edition->call_number}}</td>
                    <td style="width:150px;">@foreach ($edition->title()->get() as $title){{$title->title}}@endforeach</td>
                    <td>{{$articles->where('edition_title_id',$edition->id)->count()}}<a href="/editions/create/{{$edition->id}}"><button style="float: right"><strong>+</strong></button></a></td>
                    <td style="width:100px; text-align: center;">
                            <a href='/editions/{{$edition->id}}/edit'><button class="fas fa-edit" style="width:30px;height:30px"></button></a>
                            <br><br>
                            <form method="POST" action="/editions/{{$edition->id}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="fa fa-trash" style="width:30px;height:30px" onclick="return confirm('Apakah Anda yakin untuk menghapus?')"></button>
                                </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <div id="divTools" class="ToolsTable" style="padding-bottom: 10px">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            Export:
                        </td>
                        <td style="border-right-style: solid; border-right-width: 1px; border-right-color: #EBEBEB">
                            &nbsp;</td>
                        <td>
                            <a href="/editions/export_excel"><img src="../../assets/Export_Excel.png"
                                style="margin-top:10px;font-family:Arial;font-size:X-Small;height:40px;"></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> -->
    </main>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );
</script>
@endsection
