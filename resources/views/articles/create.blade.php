@extends('layouts.form')

@section('title')
Indeks Artikel | Edisi
@endsection

@section('content')
<main style="background: white; padding: 45px">

        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/titles">Sumber</a></li>
                <li class="breadcrumb-item"><a href="/titles">Artikel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Artikel</li>
            </ol>
        </div>

        <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
            aria-controls="collapseExample1">
            <h5
                style="width: 100%;background: whitesmoke; height: 50px; padding-top:15px; padding-left: 15px; border-radius: 4px">Judul Sumber<i class="fas fa-angle-down" style="padding-right: 20px; float: right"></i></h5>
        </a>
        <div id="collapseExample1">
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
            <form class="form" method="POST" action="/titles" enctype="multipart/form-data">
                <fieldset class="form-group">
                    <div class="row was-validated">
                        <legend class="col-form-label col-sm-3 pt-0">Jenis*</legend>
                        <div class="col-sm-8">
                        @foreach ($types as $types)
                            <div class="form-check form-check-inline custom-control-inline custom-radio">
                            <label class="form-check-label" for="types" >
                                <input class="form-check-input" type="radio" value='{{$types->id}}' name="types[]" id="type_Select" disabled>{{$types->title}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kala Terbit*</label>
                    <div class="col">
                        <select class="form-control custom-select" name="times[]" id="time_Select"  >
                            <option disabled selected hidden> Pilih Kala Terbit</option>
                            @foreach ($times as $times)
                                     <option value='{{$times->id}}' disabled>{{$times->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Judul*</label>
                    <div class="col">
                        <input type="text" class="form-control" id="title" name="title"
                         value="{{old('title')}}" placeholder="Tulis judul disini" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Penerbitan*</label>
                    <div class="col">
                        <input type="text" class="form-control"  name="city" value="{{old('city')}}" placeholder="Kota Terbit" disabled>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"  name="publisher" value="{{old('publisher')}}" placeholder="Penerbit" disabled>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control"   name="year" value="{{old('year')}}" placeholder="Tahun Terbit" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tahun Terbit Pertama*</label>
                    <div class="col-sm-4 col-form-label">
                        <input type="text" class="form-control" id="first_year" name="first_year"
                         value="{{old('first_year')}}" placeholder="Tulis tahun terbit pertama disini" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Bahasa*</label>
                    <div class="col">
                        <select class="form-control" name="languages[]" id="language_Select">
                            <option disabled selected hidden> Pilih Bahasa</option>
							@foreach ($languages as $languages)
								<option value='{{$languages->id}}' disabled>{{$languages->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Format*</label>
                    <div class="col">
                        <select class="form-control" name="formats[]" id="format_Select">
                            <option disabled selected hidden> Pilih Format</option>
							@foreach ($formats as $formats)
								<option value='{{$formats->id}}' disabled>{{$formats->title}}</option>
							@endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                <label class="col-sm-3 col-form-label">Gambar</label>
                <div class="col">
                    <input type="file" class="form-control-file" type="file" name="featured_img" id="featured_img" disabled>
					  @if ($errors->has('featured_img'))
                    <span class="help-block">
                        <strong>{{ $errors->first('featured_img') }}</strong>
                    </span>
                    @endif
                    </div>
                </div>
                (*) Wajib Diisi
            </form>
            </div>
        </div>

        <br>

        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            <h5
                style="width: 100%;background: whitesmoke; height: 50px; padding-top:15px; padding-left: 15px; border-radius: 4px">Edisi<i class="fas fa-angle-down" style="padding-right: 20px; float: right"></i></h5>
        </a>

        <div id="collapseExample">
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
                 <form class="form-horizontal" id="popup-validation" method="POST" action="/editions" enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <div class="form-group" style="text-align:right">
                            <button type="button" data-toggle="modal" data-target="#myModal">Pilih Edisi</button>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan Edisi</label>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Tahun"
								 name="edition_year" value="{{old('edition_year')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Edisi"
								name="edition_title" value="{{old('edition_title')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Volume"
								name="volume" value="{{old('volume')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="Jilid"
								name="chapter" value="{{old('chapter')}}">
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" placeholder="No"
								name="edition_no" value="{{old('edition_no')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="validationServer03">Tanggal Terbit
                                Edisi*</label>
                             <div class="col-lg-2">
                                            <label >Tanggal
                                                <input class="form-control" type="text" tabindex="6"
                                                name="publish_date" value="{{old('publish_date')}}" placeholder="Tanggal">
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
                                                <input class="form-control" type="text" tabindex="6"
                                                name="publish_year" value="{{old('publish_year')}}" placeholder="Tahun">
                                            </label>
                                    </div>
							</div>
                    </fieldset>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label">Penulisan Tanggal Asli*</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder=""  name="original_date" value="{{old('original_date')}}" required>
                        </div>
                    </div>
                    <div class="form-group row was-validated">
                        <label class="col-sm-2 col-form-label" for="validationServer03">No. Panggil*</label>
                        <div class="col-sm-10">
                            <input class="form-control is-invalid" type="text" placeholder="" name="call_number" value="{{old('call_number')}}"
                                required>
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

                    {{ csrf_field() }}

                    (*) Wajib Diisi
                </form>
            </div>
        </div>

         <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Judul Sumber</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
           <div class="table-responsive">
              <table class="table" id="example">
                <thead>
                  <tr>
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
                  </tr>
                </thead>
                <tbody>
                @php $i=1 @endphp
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>Gambar</td>
                    <td>Judul Sumber</td>
                    <td>Kode</td>
                    <td>Jenis</td>
                    <td>Kala Terbit</td>
                    <td>Tempat Terbit</td>
                    <td>Penerbit</td>
                    <td>Tahun Terbit</td>
                    <td>Tahun Terbit Pertama</td>
                    <td>Bahasa</td>
                    <td>Format</td>
                  </tr>
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

        <br>

        <a data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false"
            aria-controls="collapseExample2">
            <h5
                style="width: 100%;background: whitesmoke; height: 50px; padding-top:15px; padding-left: 15px; border-radius: 4px">Artikel<i class="fas fa-angle-down" style="padding-right: 20px; float: right"></i></h5>
        </a>

        <div id="collapseExample2">
        <div class="container" style="background:white;-webkit-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 17px -4px rgba(0,0,0,0.75);">
                 <form class="form-horizontal" id="popup-validation" method="POST" action="/articles" enctype="multipart/form-data">
                    <fieldset class="form-group">
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
                        @foreach ($status as $statuses)
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
    </main>
@endsection
