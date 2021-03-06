@extends('layouts.form')

@section('title')
Indeks Artikel | Buat Edisi
@endsection

@section('content')
<main style="background: white; padding: 45px">

        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/titles">Sumber</a></li>
                <li class="breadcrumb-item"><a href="/editions">Edisi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat Edisi</li>
            </ol>
        </div>

        <div id="collapseExample1">
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
           <form class="form" method="POST" action="/editions" enctype="multipart/form-data">
            <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Judul Sumber</h4>
            <fieldset class="form-group">
                    <div class="form-group" style="text-align:right">
                                    <button type="button" data-toggle="modal" data-target="#myModal">Pilih Judul</button>
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
                        <input type="text" class="form-control" id="title" name="title" placeholder="Tulis judul disini" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode*</label>
                    <div class="col">
                        <input type="text" class="form-control {{ $errors->get('kode') ? 'has-error' : '' }}" id="kode" name="kode" placeholder="Tulis kode disini"
                         value="{{old('kode')}}" maxlength="5">
                         @foreach($errors->get('kode') as $error)
                            <span class="help-block">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penerbitan*</label>
                    <div class="col">
                        <label for="">Kota</label>
                        <input type="text" class="form-control"  name="city" id="city" placeholder="Kota">
                    </div>
                    <div class="col">
                        <label for="">Penerbit</label>
                        <input type="text" class="form-control"  name="publisher" id="publisher" placeholder="Penerbit">
                    </div>
                    <div class="col">
                        <label for="">Tahun</label>
                        <input type="text" class="form-control"   name="year" id="year" placeholder="Tahun">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Terbit Pertama*</label>
                    <div class="col-sm-10 col-form-label">
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
                <br>
                <h4 style="font-weight: bold; padding-bottom:10px; text-align:center;color: black">Edisi</h4>
                <br>
                <fieldset class="form-group">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan Edisi</label>
                            <div class="col">
                            <label>Tahun</label>
                                <input class="form-control" type="text" placeholder="Tahun"
								 name="edition_year" value="{{old('edition_year')}}">
                            </div>
                            <div class="col">
                                <label>Edisi</label>
                                <input class="form-control" type="text" placeholder="Edisi"
								name="edition_title" value="{{old('edition_title')}}">
                            </div>
                            <div class="col">
                            <label>Volume</label>
                                <input class="form-control" type="text" placeholder="Volume"
								name="volume" value="{{old('volume')}}">
                            </div>
                            <div class="col">
                            <label>Jilid</label>
                                <input class="form-control" type="text" placeholder="Jilid"
								name="chapter" value="{{old('chapter')}}">
                            </div>
                            <div class="col">
                            <label>Nomor</label>
                                <input class="form-control" type="text" placeholder="Nomor"
								name="edition_no" value="{{old('edition_no')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="validationServer03">Tanggal Terbit
                                Edisi*</label>
                             <div class="col-lg-2">
                                            <label>Tanggal
                                                <input class="form-control" type="text" tabindex="6" placeholder="Tanggal"
                                                name="publish_date" value="{{old('publish_date')}}">
                                            </label>
                                    </div>
                                    <div class="col-lg-2">
                                            <label >Bulan
                                            <select class="form-control custom-select"name="publish_month" id="publish_month_Select" required>
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
                                                <input class="form-control" type="text" tabindex="6" placeholder="Tahun"
                                                name="publish_year" value="{{old('publish_year')}}">
                                            </label>
                                    </div>
							</div>
                    </fieldset>
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kode*</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control {{ $errors->get('edition_code') ? 'has-error' : '' }}" id="edition_code" name="edition_code" required
                         value="{{old('edition_code')}}" placeholder="Tulis kode disini">
                         @foreach($errors->get('edition_code') as $error)
                            <span class="help-block">{{ $error }}</span>
                        @endforeach
                    </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Penulisan Tanggal Asli*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Tulis tanggal asli disini"  name="original_date" value="{{old('original_date')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="validationServer03">No. Panggil</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Tulis nomor panggil disini" name="call_number" value="{{old('call_number')}}">
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
           <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
            <thead>
                <tr class="GridHeader" style="text-align: center" id="example">
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
    </main>
@endsection


@section('scripts')
<script type="text/javascript">

    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ]
        });

        $('#example tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                console.log(table.row(this).data());
                $('#myModal').modal('hide');
                $('#title_id').val(table.row(this).data()[1]);
                $('#title_id').addClass('disabled').attr("disabled", 'disabled');
                $('#title').val(table.row(this).data()[3]);
                $('#title').addClass('disabled').attr("disabled", 'disabled');
                $('#kode').val(table.row(this).data()[4]);
                $('#kode').addClass('disabled').attr("disabled", 'disabled');
                $('#types').val(table.row(this).data()[5]).change();
                $('#types').addClass('disabled').attr("disabled", 'disabled');
                $('#times').val(table.row(this).data()[6]).change();
                $('#times').addClass('disabled').attr("disabled", 'disabled');
                $('#city').val(table.row(this).data()[7]);
                $('#city').addClass('disabled').attr("disabled", 'disabled');
                $('#publisher').val(table.row(this).data()[8]);
                $('#publisher').addClass('disabled').attr("disabled", 'disabled');
                $('#year').val(table.row(this).data()[9]);
                $('#year').addClass('disabled').attr("disabled", 'disabled');
                $('#first_year').val(table.row(this).data()[10]);
                $('#first_year').addClass('disabled').attr("disabled", 'disabled');
                $('#languages').val(table.row(this).data()[11]).change();
                $('#languages').addClass('disabled').attr("disabled", 'disabled');
                $('#formats').val(table.row(this).data()[12]);
                $('#formats').addClass('disabled').attr("disabled", 'disabled');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );

        $('#button').click( function () {
            table.row('.selected').remove().draw( false );
        } );
    } );
</script>

@endsection
