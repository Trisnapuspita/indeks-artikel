@extends('layouts.table')

@section('title')
Indeks Artikel | Artikel
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
                    <td>No</td>
                    <th>Judul Artikel</th>
                    <th>Subyek</th>
                    <th>Pengarang</th>
                    <th>Halaman</th>
                    <th>Kolom</th>
                    <th>Sumber</th>
                    <th>Deskripsi Singkat</th>
                    <th>Kata Kunci</th>
                    <th>Keterangan Gambar</th>
                    <th>No. Panggil</th>
                    <th>Status Ketersediaan</th>
                    <th>Judul Sumber</th>
                    <th>Edisi</th>
                    <td></td>
                    <td></td>
                </tr>
			</thead>

            <tfoot>
                <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari ...." data-column="0" hidden>
                    </td>
                <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari Judul Artikel...." data-column="1">
                    </td>
                <td>
                    <input type="text" class = "form-control filter-input" placeholder="Cari Subyek...." data-column="2">
                </td>
                <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari Pengarang...." data-column="3">
                </td>
                <td>
                    <input type="text" class = "form-control filter-input" placeholder="Cari Halaman...." data-column="4">
                </td>
                <td>
                        <input type="text" class = "form-control filter-input" placeholder="Cari Kolom...." data-column="5">
                    </td>
                <td>
                    <input type="text" class = "form-control filter-input" placeholder="Cari Sumber...." data-column="6">
                </td>
                <td>
                    <input type="text" class = "form-control filter-input" placeholder="Cari Deskripsi Singkat...." data-column="7">
                </td>
                <td>
                    <input type="text" class = "form-control filter-input" placeholder="Cari Kata Kunci...." data-column="8">
                </td>
                <td>
                    <input type="text" class = "form-control filter-input" placeholder="Cari Keterangan Gambar...." data-column="9">
                </td>
                <td>
                    <input type="text" class = "form-control filter-input" placeholder="Cari No Panggil...." data-column="10">
                </td>
                <td>
                    <input type="text" class = "form-control filter-input" placeholder="Cari Status Ketersediaan...." data-column="11">
                </td>
                <td>
                    <input type="text" class = "form-control filter-input" placeholder="Cari Judul Sumber...." data-column="12">
                </td>
                <td>
                    <input type="text" class = "form-control filter-input" placeholder="Cari Edisi...." data-column="13">
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
                            <a href="/articles/export_excel"><img src="../../img/Export_Excel.png"
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
        url: "{{ route('articles.index') }}"
        },
        columns:[
        {
        data:'DT_RowIndex',
        name:'DT_RowIndex',
        searchable: false
        },
        {
        data: 'article_title',
        name: 'article_title'
        },
        {
        data: 'subject',
        name: 'subject'
        },
        {
        data:'writer',
        name:'writer'
        },
        {
        data:'pages',
        name:'pages'
        },
        {
        data:'column',
        name:'column'
        },
        {
        data:'source',
        name:'source'
        },
        {
        data: 'desc',
        name: 'desc'
        },
        {
        data:'keyword',
        name:'keyword'
        },
        {
        data:'detail_img',
        name:'detail_img'
        },
        {
        data:'edition_title.call_number',
        name:'edition_title.call_number'
        },
        {
        data:'status',
        name:'status'
        },
        {
        data:'titles',
        name:'titles'
        },
        {
        data:'editions',
        name:'editions'
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

        var article_editions_id;

        $(document).on('click', '.delete', function(){
        article_editions_id = $(this).attr('id');
        $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function(){
        $.ajax({
        url:"articles/delete/"+article_editions_id,
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
