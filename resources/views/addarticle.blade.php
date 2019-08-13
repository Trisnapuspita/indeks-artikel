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
                            <h5>Membuat Artikel</h5>
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
                                            <label class="control-label col-lg-4">Judul Artikel</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="validate[required] form-control" name="req" id="req">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Subjek</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="validate[required] form-control" name="req" id="req">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Pengarang</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="validate[required] form-control" name="req" id="req">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Halaman</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="req" id="req">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Kolom</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="req" id="req">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text4" class="control-label col-lg-4">Deskripsi Singkat</label>

                                            <div class="col-lg-8">
                                                <textarea id="text4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Kata Kunci</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="validate[required] form-control" name="req" id="req">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text4" class="control-label col-lg-4">Keterangan Gambar</label>

                                            <div class="col-lg-8">
                                                <textarea id="text4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Status Ketersediaan * :</label>
                                            <div class="col-lg-4">
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" />Dapat Digunakan
                                            </label>
                                            </div>
                                            <div class="col-lg-4">
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2" />Tidak Dapat Digunakan
                                            </label>
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
                                            <td>
                                            <button class="btn btn-primary">Tambah</button>
                                            <button class="btn btn-danger">Hapus</button>
                                            </td>
                                            <td>Majalah</td>
                                            <td>Bulanan</td>
                                            <td>Jakarta</td>
                                            <td>Karya Cipta</td>
                                            <td>2000</td>
                                            <td>Indonesia</td>
                                            <td>Digital</td>
                                            <td> 1 </td>
                                            <td>
                                            <button class="btn btn-primary">Tambah</button>
                                            <button class="btn btn-danger">Hapus</button>
                                            </td>
                                            <td> 5 </td>
                                            <td>
                                            <button class="btn btn-primary">Tambah</button>
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
