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
                            <form class="form-horizontal" id="popup-validation">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Keterangan Edisi :</label>
                                        <div class="col-lg-2">
                                            <label>Kota Terbit
                                                <input class="form-control" type="text" maxlength="3" tabindex="5" />
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label >Penerbit
                                                <input class="form-control" type="text" maxlength="4" tabindex="6" />
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>Tahun Terbit
                                                <input class="form-control" type="text" maxlength="5" tabindex="7" />
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label >Penerbit
                                                <input class="form-control" type="text" maxlength="4" tabindex="8" />
                                            </label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>Tahun Terbit
                                                <input class="form-control" type="text" maxlength="5" tabindex="9" />
                                            </label>
                                        </div>
                                    
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tanggal Terbit Edisi * :</label>
                                    <div class="col-lg-2">
                                        <select name="kala-terbit" id="kala-terbit" class="validate[required] form-control">
                                            <option type="number" min="1" max="31" value="">-- Tanggal --</option>
                                            <option  value="option"></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select name="kala-terbit" id="kala-terbit" class="validate[required] form-control">
                                            <option value="">-- Bulan --</option>
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
                                            
                                                <input class="form-control autotab" type="text" maxlength="3" tabindex="11" placeholder="Tahun" />
                                            
                                            </div>
                                </div>
                                <div class="form-group">
                                            <label class="control-label col-lg-2">Penulisan Tanggal Asli :</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="validate[required] form-control" name="req" id="req">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Nomor Panggil :</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="validate[required] form-control" name="req" id="req">
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
