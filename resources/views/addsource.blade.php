@extends('layouts.app')

@section('content')
<div id="content">
    <div class="inner" style="min-height: 700px;">
        <div class="row">
            <div class="col-lg-12">
                <h2> Sumber Bacaan </h2>
            </div>
        </div>
        <hr /> 

        <!-- FORM -->

        <div class="row">
                <div class="col-lg-10">
                    <div class="box">
                        <header class="dark">
                            <h5>Membuat Judul Sumber</h5>
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
                            <form class="form-horizontal" id="popup-validation">
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Jenis * :</label>
                                    <div class="col-lg-4">
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" />Surat Kabar
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2" />Majalah
                                    </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Kala Terbit * :</label>
                                    <div class="col-lg-4">
                                        <select name="kala-terbit" id="kala-terbit" class="validate[required] form-control">
                                            <option value="">-- Pilih Kala Terbit --</option>
                                            <option value="option1">Tahunan</option>
                                            <option value="option2">Bulanan</option>
                                            <option value="option3">Dua Mingguan</option>
                                            <option value="option4">Mingguan</option>
                                            <option value="option5">Harian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Judul Surat Kabar/Majalah * :</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="validate[required] form-control" name="req" id="req">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Penerbitan :</label>
                                    <div class="col-lg-2">
                                        <label>Kota Terbit
                                            <input class="form-control autotab" type="text" maxlength="3" tabindex="11" />
                                        </label>
                                        </div>
                                        <div class="col-lg-2">
                                        <label >Penerbit
                                            <input class="form-control autotab" type="text" maxlength="4" tabindex="12" />
                                        </label>
                                        </div>
                                        <div class="col-lg-2">
                                        <label>Tahun Terbit
                                            <input class="form-control autotab" type="text" maxlength="5" tabindex="13" />
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-4">Bahasa :</label>
                                    <div class="col-lg-4">
                                        <select name="bahasa" id="bahasa" class="validate[required] form-control">
                                            <option value="">-- Pilih Bahasa --</option>
                                            <option value="option1">English</option>
                                            <option value="option2">Indonesia</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-4">Format :</label>
                                    <div class="col-lg-4">
                                        <select name="format" id="format" class="validate[required] form-control">
                                            <option value="">-- Pilih Format --</option>
                                            <option value="option1">Cetak</option>
                                            <option value="option2">Digital</option>
                                            <option value="option3">Bentuk Mikro</option>
                                        </select>
                                    </div>
                                </div>

                                <div style="text-align:center" class="form-actions no-margin-bottom">
                                    <input type="submit" value=" Tambah" class="btn btn-primary btn-lg " />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!-- TABLE -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Setting
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul Sumber</th>
                                            <th>    </th>
                                            <th>Jenis</th>
                                            <th>Kala Terbit</th>
                                            <th>Tempat Terbit</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Bahasa</th>
                                            <th>Format</th>
                                            <th>Jumlah Edisi</th>
                                            <th>    </th>
                                            <th>Jumlah Artikel</th>
                                            <th>    </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> 1 </td>
                                            <td>Ketika Cinta Bertasbih</td>
                                            <td> <button class="btn btn-danger">Hapus</button></td>
                                            <td>Majalah</td>
                                            <td>Bulanan</td>
                                            <td>Jakarta</td>
                                            <td>Karya Cipta</td>
                                            <td>2000</td>
                                            <td>Indonesia</td>
                                            <td>Digital</td>
                                            <td> 1 </td>
                                            <td>
                                            <a href="/addedition"
                                            class="btn btn-primary">Tambah</a>
                                            <a class="btn btn-danger">Hapus</a>
                                            </td>
                                            <td> 5 </td>
                                            <td>
                                            <a href="/addarticle"
                                            class="btn btn-primary">Tambah</a>
                                            <button class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>    
@endsection
