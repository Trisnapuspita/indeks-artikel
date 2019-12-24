@extends('layouts.table')

@section('title')
Indeks Artikel | Edisi
@endsection

@section('content')
<main style="background: white; padding: 45px">

        @if (session('msg'))
                <div class="alert alert-success">
                    <p> {{session('msg')}} </p>
                </div>
            @endif

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
					<td>No</td>
                    <td>Gambar</td>
                    <th>Keterangan Edisi</th>
                    <th>Kode</th>
                    <th>Tahun</th>
                    <th>Edisi</th>
                    <th>Volume</th>
                    <th>Jilid</th>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Nomor Panggil</th>
                    <td>Judul Sumber</td>
                    <td>Jumlah Artikel</td>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                    <td>
                            <input type="text" class = "form-control filter-input" placeholder="Cari ...." data-column="0" hidden>
                        </td>
                    <td>
                            <input type="text" class = "form-control filter-input" placeholder="Cari ...." data-column="1" hidden>
                        </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari Kode...." data-column="2">
                    </td>
                    <td>
                            <input type="text" class = "form-control filter-input" placeholder="Cari Tahun...." data-column="3">
                    </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari Edisi...." data-column="4">
                    </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari Volume...." data-column="5">
                    </td>
                    <td>
                            <input type="text" class = "form-control filter-input" placeholder="Cari Jilid...." data-column="6">
                    </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari Nomor...." data-column="7">
                    </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari Tanggal...." data-column="8">
                    </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari Nomor Panggil...." data-column="9">
                    </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari Judul Sumber...." data-column="10">
                    </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari ...." hidden>
                    </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari ...." hidden>
                    </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari ...." hidden>
                    </td>
                    <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari ...." hidden>
                    </td>
                </tfoot>
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

        <div id="confirmModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Konfirmasi</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <h5 style="center">Apakah Anda yakin ingin menghapus?</h5>
                        </div>
                        <div class="modal-footer">
                         <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Ya</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>

    </main>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
    var table = $('#example').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax:{
    url: "{{ route('editions.index') }}"
    },
    columns:[
    {
    data:'DT_RowIndex',
    name:'DT_RowIndex',
    searchable: false
    },
    {
    data: 'edition_image',
    name: 'edition_image',
    render: function(data, type, full, meta)
    {
        if (data == null) {
                return "<img src=\"/storage/upload/default.png" + "\" height=\"auto\" width=\"100\" />";
            }
            else
            {
                return "<img src=\"/storage/upload/" + data + "\" height=\"auto\" width=\"100\" />";
            }
    }
    },
    {
    data: 'mergeColumn',
    name: 'mergeColumn'
    },
    {
    data: 'edition_code',
    name: 'edition_code'
    },
    {
    data: 'edition_year',
    name: 'edition_year'
    },
    {
    data: 'edition_title',
    name: 'edition_title'
    },
    {
    data:'volume',
    name:'volume'
    },
    {
    data:'chapter',
    name:'chapter'
    },
    {
    data: 'edition_no',
    name: 'edition_no'
    },
    {
    data: 'original_date',
    name: 'original_date'
    },
    {
    data:'call_number',
    name:'call_number'
    },
    {
    data: 'title.title',
    name: 'title.title'
    },
    {
    data:'article',
    name:'article'
    },
    {
    data: 'edit',
    name: 'edit',
    orderable: false
    },
    {
    data: 'delete',
    name: 'delete',
    orderable: false
    }
    ]
    });

    $('.filter-input').keyup(function() {
        table.column( $(this).data('column') )
        .search( $(this).val())
        .draw();
    });

    var edition_titles_id;

    $(document).on('click', '.delete', function(){
    edition_titles_id = $(this).attr('id');
    $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function(){
    $.ajax({
    url:"editions/delete/"+edition_titles_id,
    beforeSend:function(){
        $('#ok_button').text('Deleting...');
    },
    success:function(data)
    {
        setTimeout(function(){
        $('#confirmModal').modal('hide');
        $('#example').DataTable().ajax.reload();
        }, 2000);
    }
    })
    });
});
</script>
@endsection
