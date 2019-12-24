@extends('layouts.form')

@section('title')
Indeks Artikel | Buat Artikel
@endsection

@section('content')
<main style="background: white; padding: 45px">

        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/titles">Sumber</a></li>
                <li class="breadcrumb-item"><a href="/articles">Artikel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat Artikel</li>
            </ol>
        </div>

        <div id="collapseExample1">
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
           <form class="form" method="POST" action="/articles" enctype="multipart/form-data">
           <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Judul Sumber</h4>
            <fieldset class="form-group">
                    <div class="form-group" style="text-align:right">
                                    <button type="button" data-toggle="modal" data-target="#myModal1">Pilih Judul Sumber</button>
                                    <input type="hidden" class="form-control" id="title_id" name="title_id">
                                </div>
                    <div class="row was-validated">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis*</legend>
                        <div class="col-sm-8">
                        @foreach ($types as $types)
                            <div class="form-check form-check-inline custom-control-inline custom-radio">
                            <label class="form-check-label" for="types" >
                                <input class="form-check-input" type="radio" value='{{$types->id}}' name="types[]" id="type_Select" >{{$types->title}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kala Terbit*</label>
                    <div class="col">
                        <select class="form-control custom-select" name="times[]" id="time_Select" required>
                            @foreach ($times as $times)
                                <option disabled selected hidden>Pilih Kala Terbit</option>
                                     <option required value='{{$times->id}}'>{{$times->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Judul*</label>
                    <div class="col">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Tulis judul disini">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode*</label>
                    <div class="col">
                        <input type="text" class="form-control {{ $errors->get('kode') ? 'has-error' : '' }}" id="kode" name="kode" maxlength="5" placeholder="Tulis kode disini"
                         value="{{old('kode')}}">
                         @foreach($errors->get('kode') as $error)
                            <span class="help-block">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row" hidden>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kode*</label>
                        <div class="col">
                            <input type="text" class="form-control {{ $errors->get('kode') ? 'has-error' : '' }}" id="kode" name="kode" maxlength="5" placeholder="Tulis kode disini"
                             value="{{old('kode')}}" disabled>
                             @foreach($errors->get('kode') as $error)
                                <span class="help-block">{{ $error }}</span>
                            @endforeach
                        </div>
                    </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penerbitan*</label>
                    <div class="col">
                        <input type="text" class="form-control"  name="city" id="city" placeholder="Kota">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"  name="publisher" id="publisher" placeholder="Penerbit">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Tahun"  name="year" id="year">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Terbit Pertama*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="first_year" name="first_year" placeholder="Tulis tahun terbit pertama disini">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bahasa*</label>
                    <div class="col">
                        <select class="form-control" name="languages[]" id="language_Select">
							@foreach ($languages as $languages)
                            <option disabled selected hidden>Pilih Bahasa</option>
                            <option required value='{{$languages->id}}'>{{$languages->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Format*</label>
                    <div class="col">
                        <select class="form-control" name="formats[]" id="format_Select">
							@foreach ($formats as $formats)
                            <option disabled selected hidden>Pilih Format</option>
                            <option required value='{{$formats->id}}'>{{$formats->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar</label>
                <div class="col">
                    <input type="file" class="form-control-file" type="file" name="featured_img" id="featured_img">
                    </div>
                </div>
                <br>
                <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Edisi</h4>
                <fieldset class="form-group">
                        <div class="form-group" style="text-align:right">
                            <button type="button" data-toggle="modal" data-target="#myModal">Pilih Edisi</button>
                            <input type="hidden" class="form-control" id="edition_id" name="edition_id">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan Edisi</label>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Tahun"
								 name="edition_year" id="edition_year" value="{{old('edition_year')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Edisi"
								name="edition_title" id="edition_title" value="{{old('edition_title')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Volume"
								name="volume" id="volume" value="{{old('volume')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Jilid"
								name="chapter" id="chapter" value="{{old('chapter')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="No"
								name="edition_no" id="edition_no" value="{{old('edition_no')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="validationServer03">Tanggal Terbit
                                Edisi*</label>
                             <div class="col-lg-2">
                                            <label >Tanggal
                                                <input class="form-control" type="text" tabindex="6"
                                                name="publish_date" id="publish_date" value="{{old('publish_date')}}" placeholder="Tanggal">
                                            </label>
                                    </div>
                                    <div class="col-lg-2">
                                            <label >Bulan
                                            <select class="form-control custom-select" name="publish_month" id="publish_month_Select" required>
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
                                                name="publish_year" id="publish_year" value="{{old('publish_year')}}" placeholder="Tahun">
                                            </label>
                                    </div>
							</div>
                    </fieldset>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode*</label>
                    <div class="col">
                        <input type="text" class="form-control {{ $errors->get('edition_code') ? 'has-error' : '' }}" id="edition_code" name="edition_code" maxlength="5" placeholder="Tulis kode disini"
                         value="{{old('edition_code')}}">
                         @foreach($errors->get('edition_code') as $error)
                            <span class="help-block">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Penulisan Tanggal Asli*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Tulis tanggal asli disini" id="original_date"  name="original_date" value="{{old('original_date')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="validationServer03">No. Panggil</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Tulis nomor panggil disini" name="call_number" id="call_number" value="{{old('call_number')}}">
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
                    <br>
                    <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Artikel</h4>
                        <div class="form-group row was-validated">
                            <label class="col-sm-2 col-form-label">Judul Artikel*</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder=""  name="article_title" value="{{old('article_title')}}" required>
                            </div>
                        </div>
                        <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Subyek*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="subject" value="{{old('subject')}}" required>
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
                            <textarea rows="4" class="form-control" type="text" placeholder=""  name="desc" value="{{old('desc')}}" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Kata Kunci*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="keyword" value="{{old('keyword')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Keterangan Gambar*</label>
                        <div class="col-sm-10">
                            <textarea rows="3" class="form-control" type="text" placeholder=""  name="detail_img" value="{{old('detail_img')}}" required></textarea>
                        </div>
                    </div>
                    <div class="row was-validated">
                        <legend class="col-form-label col-sm-2">Status Ketersediaan*</legend>
                        <div class="col-sm-8">
                        @foreach ($statuses as $statuses)
                            <div class="form-check form-check-inline custom-control-inline custom-radio">
                            <label class="form-check-label" for="statuses" >
                                <input class="form-check-input" type="radio" value='{{$statuses->id}}' name="statuses[]" id="statuses_Select"required>{{$statuses->title}}
                                </label>
                            </div>
                        @endforeach
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

    <!-- Modal -->
    <div id="myModal1" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Judul</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
           <div class="table-responsive">
           <table id="examples" class="table table-striped table-bordered table-responsive" style="width:100%">
            <thead>
                <tr class="GridHeader" style="text-align: center" id="examples">
                    <th>No.</th>
                    <th>ID</th>
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
                </tr>
			</thead>
			<tbody>
            @php $i=1 @endphp
            @foreach ($titles as $title)
                <tr class="GridItem">
                    <td>{{ $i++ }}</td>
                    <td>{{$title->id}}</td>
                    @if($title->featured_img == null)
                    <td><img src="{{asset('storage/upload/default.png')}}" style="max-width: 100px; height: auto;" class="image-fluid"></td>
                    @else
                    <td><img src="{{asset('storage/upload/'. $title->featured_img) }}" style="max-width: 100px; height: auto; "class="image-fluid"></td>
                    @endif
                    <td>{{$title->title}}</td>
                    <td>{{$title->kode}}</td>
                    <td>@foreach ($title->types()->get() as $types){{$types->title}}@endforeach</td>
                    <td>@foreach ($title->times()->get() as $times){{$times->title}}@endforeach</td>
                    <td>{{$title->city}}</td>
                    <td>{{$title->publisher}}</td>
                    <td>{{$title->year}}</td>
                    <td>{{$title->first_year}}</td>
                    <td>@foreach ($title->languages()->get() as $languages){{$languages->title}}@endforeach</td>
                    <td>@foreach ($title->formats()->get() as $formats){{$formats->title}}@endforeach</td>
                </tr>
                @endforeach
            </tbody>
        </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </div>
          </div>
    </div>

     <!-- Modal -->
     <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edisi</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
             <div class="table-responsive">
             <table id="tblEdisi" class="table table-striped table-bordered table-responsive" style="width:100%">
              <thead>
                  <tr class="GridHeader" style="text-align: center" id="example">
                      <th>No</th>
                      <th>ID</th>
                      <th>Gambar</th>
                      <th>Kode</th>
                      <th>Tahun</th>
                      <th>Edisi</th>
                      <th>Volume</th>
                      <th>Jilid</th>
                      <th>Nomor</th>
                      <th>Tanggal</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Tanggal Asli</th>
                      <th>Nomor Panggil</th>
                  </tr>
              </thead>
          </table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
      </div>
    </main>
@endsection

@section('scripts')
<script type="text/javascript">

$(document).ready(function() {
    var vtable ;
    var table = $('#examples').DataTable({
        "columnDefs": [
        {
            "targets": [ 1 ],
            "visible": false,
            "searchable": false
        }
    ]
    });
    $('#examples tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            console.log(table.row(this).data());

            title(table.row(this).data()[1]);
            edisi( table.row(this).data()[1]);
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );


title = function(id_sumber){
$.ajax({
    url : '/articles/getSumber?id='+id_sumber,
    success : function(data){
        console.log(data);
        $('#title_id').val(data.id);
            $('#title').val(data.title);
            $('#title').addClass('disabled');
            $('#kode').val(data.kode);
            $('#kode').addClass('disabled');
            // $('#types').val(table.row(this).data()[5]).change();
            // $('#types').addClass('disabled');
            // $('#times').val(table.row(this).data()[6]).change();
            // $('#times').addClass('disabled');
            $('#city').val(data.city);
            $('#city').addClass('disabled');
            $('#publisher').val(data.publisher);
            $('#publisher').addClass('disabled');
            $('#year').val(data.year);
            $('#year').addClass('disabled');
            $('#first_year').val(data.first_year);
            $('#first_year').addClass('disabled');
            // $('#languages').val(table.row(this).data()[11]).change();
            // $('#languages').addClass('disabled');
            // $('#formats').val(table.row(this).data()[12]);
            // $('#formats').addClass('disabled');
    }
})
    $('#myModal1').modal('hide');

}
edisi = function(id_sumber){
if(vtable!=null){
vtable.destroy();
}
vtable = $('#tblEdisi').DataTable({
    columnDefs: [
        {
            "targets": [ 1 ],
            "visible": false,
            "searchable": false
        }
    ],
processing: true,
serverSide: true,
"responsive": true,
ajax:{
url: "/articles/getEdition?title_id="+id_sumber
},
columns:[
    {name:'DT_RowIndex',data:'DT_RowIndex', orderable:false, searchable:false},
    {name:'id',data:'id'},
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
    {name:'edition_code',data:'edition_code'},
    {name:'edition_year',data:'edition_year'},
    {name:'edition_title',data:'edition_title'},
    {name:'volume',data:'volume'},
    {name:'chapter',data:'chapter'},
    {name:'edition_no',data:'edition_no'},
    {name:'publish_date',data:'publish_date'},
    {name:'publish_month',data:'publish_month'},
    {name:'publish_year',data:'publish_year'},
    {name:'original_date',data:'original_date'},
    {name:'call_number',data:'call_number'},
]

});
$('#tblEdisi tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            console.log(vtable.row(this).data());

            // title(table.row(this).data()[1]);
            edisii( vtable.row(this).data().id);
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );


edisii = function(id_edisi){
$.ajax({
    url : '/articles/getEdisi?id='+id_edisi,
    success : function(data){
        console.log(data);
       $('#myModal').modal('hide');
        $('#edition_id').val(data.id);
        $('#edition_id').addClass('disabled');
        $('#edition_code').val(data.edition_code);
        $('#edition_code').addClass('disabled');
        $('#edition_year').val(data.edition_year);
        $('#edition_year').addClass('disabled');
        $('#edition_title').val(data.edition_title);
        $('#edition_title').addClass('disabled');
        $('#volume').val(data.volume);
        $('#volume').addClass('disabled');
        $('#chapter').val(data.chapter);
        $('#chapter').addClass('disabled');
        $('#edition_no').val(data.edition_no);
        $('#edition_no').addClass('disabled');
        $('#publish_date').val(data.publish_date);
        $('#publish_date').addClass('disabled');
        $('#publish_month').val(data.publish_month);
        $('#publish_month').addClass('disabled');
        $('#publish_year').val(data.publish_year);
        $('#publish_year').addClass('disabled');
        $('#original_date').val(data.original_date);
        $('#original_date').addClass('disabled');
        $('#call_number').val(data.call_number);
        $('#call_number').addClass('disabled');
    }
})
    $('#myModal1').modal('hide');

}
}


} );
</script>

@endsection
