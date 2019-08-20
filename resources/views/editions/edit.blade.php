@extends('layouts.coba')

@section('content')
<div id="content">   
            <div class="row">
                <div class="col-lg-10">
                    <div class="box">
                        <header class="dark">
                            <h5>Membuat Edisi Sumber</h5>
                            <div class="toolbar">
                                <ul class="nav">
                                    <li>
                                        <div class="btn-group">
                                            <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                                                href="#collapse2">
                                                <i class="icon-chevron-up"></i>
                                            </a>
                                            <button class="btn btn-xs btn-danger close-box"><i class="icon-remove"></i></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </header>
                        <div id="collapse2" class="body collapse in">
                            <form class="form-horizontal" id="popup-validation" method="POST" action="/editions" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Keterangan Edisi :</label>
                                        <div class="col-lg-2">
                                            <label>Tahun
                                                <input class="form-control" type="text" maxlength="4" tabindex="5" 
                                                name="edition_year" value="{{old('edition_year') ? old('edition_year') :$editions->edition_year}}}}"/>
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label >Edisi
                                                <input class="form-control" type="text" tabindex="6" 
                                                name="edition_title" value="{{old('edition_title')  ? old('edition_title') :$editions->edition_title}}"/>
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>Volume
                                                <input class="form-control" type="text" tabindex="7" 
                                                name="volume" value="{{old('volume')  ? old('volume') :$editions->volume}}"/>
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label >Jilid
                                                <input class="form-control" type="text" tabindex="8" 
                                                name="chapter" value="{{old('chapter')  ? old('chapter') :$editions->chapter}}"/>
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>No
                                                <input class="form-control" type="text"  tabindex="9" 
                                                name="edition_no" value="{{old('edition_no')  ? old('edition_no') :$editions->edition_no}}"/>
                                            </label>
                                        </div>
                                    
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tanggal Terbit Edisi * :</label>
                                    <div class="col-lg-2">
                                        <select name="publish_date" value="{{old('publish_date')  ? old('publish_date') :$editions->publish_date}}" class="validate[required] form-control">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select id="kala-terbit" class="validate[required] form-control"
                                        name="publish_month" value="{{old('publish_month') ? old('publish_month') :$editions->publish_month}}">
                                            <option value="option1">Januari</option>
                                            <option value="option2">Februari</option>
                                            <option value="option3">Maret</option>
                                            <option value="option4">April</option>
                                            <option value="option5">Mei</option>
                                            <option value="option1">Juni</option>
                                            <option value="option2">Juli</option>
                                            <option value="option3">Agustus</option>
                                            <option value="option4">September</option>
                                            <option value="option5">Oktober</option>
                                            <option value="option4">November</option>
                                            <option value="option5">Desember</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-2">
                                        <input class="form-control autotab" type="text" name="publish_year" value="{{old('publish_year')  ? old('publish_year') :$publishs->edition_year}}" tabindex="11" placeholder="Tahun" />
                                     </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Penulisan Tanggal Asli :</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="validate[required] form-control" name="original_date" value="{{old('original_date')  ? old('original_date') :$editions->original_date}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Nomor Panggil :</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="validate[required] form-control" name="call_number" value="{{old('call_number')  ? old('call_number') :$editions->call_number}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-1">Gambar :</label>
                                    <input type="file" name="edition_image" id="edition_image">
                                    @if ($errors->has('edition_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('edition_image') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    
                                <div style="text-align:center" class="form-actions no-margin-bottom">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Edit" onclick="return confirm('Apakah Anda yakin untuk mengedit?')">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
@endsection
