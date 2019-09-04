@extends('layouts.appp')

@section('title')
Indeks Artikel | Laporan Kinerja User
@endsection

@section('content')
<main style="height: 100%; padding:45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Kinerja User</li>
            </ol>
        </div>
        <div class="ButtonArea">
            <h3 style="text-align:center; font-weight:bold; font-family: var(--Rubik);padding-bottom: 10px">Laporan
                Kinerja User</h3>
            <div id="Div2"
                style="background:transparent; padding:50px; border-top: 2px solid white;border-bottom: 2px solid white">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <b style="font-size: 20px; font-weight: bold">Kriteria</b>
                            </td>
                            <td style="font-size: 20px;font-weight: bold; padding-left: 20px; padding-right: 20px">:
                            </td>
                            <td>
                                <select class="box">
                                    <option value="">Pilih Kriteria</option>
                                    <option class="dropdown-item">Semua</option>
                                    <option class="dropdown-item">Subyek</option>
                                    <option class="dropdown-item">Pengarang</option>
                                    <option class="dropdown-item">Judul</option>
                                    <option class="dropdown-item">No. Panggil</option>
                                </select>
                                <input>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b style="font-size: 20px; font-weight: bold">Harian</b>
                            </td>
                            <td style="font-size: 20px;font-weight: bold; padding-left: 20px; padding-right: 20px">:
                            </td>
                            <td>
                                <input class="box" type="date">
                                s/d <input class="box" type="date">
                            </td>
                            <td>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px" data-toggle="modal" data-target="#myModal"> Tampilkan Data</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b style="font-size: 20px; font-weight: bold">Bulanan</b>
                            </td>
                            <td style="font-size: 20px;font-weight: bold; padding-left: 20px; padding-right: 20px">:
                            </td>
                            <td>
                                <select class="box">
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
                                <select class="box">
                                @for($year = 2000; $year< now()->year+1; $year++)
												<option value="{{$year}}"  @if($year==now()->year) selected @endif>{{$year}}</option>
												@endfor
                                </select> s/d
                                <select class="box">
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
                                <select class="box">
                                    @for($year = 2000; $year< now()->year+1; $year++)
                                        <option value="{{$year}}"  @if($year==now()->year) selected @endif>{{$year}}</option>
                                    @endfor
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px" ng-click="editUser('new')" data-toggle="modal" data-target="#myModal"> Tampilkan Data</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b style="font-size: 20px; font-weight: bold">Tahunan</b>
                            </td>
                            <td style="font-size: 20px;font-weight: bold; padding-left: 20px; padding-right: 20px">:
                            </td>
                            <td>
                                <select class="box">
                                @for($year = 2000; $year< now()->year+1; $year++)
												<option value="{{$year}}"  @if($year==now()->year) selected @endif>{{$year}}</option>
												@endfor
                                </select> s/d
                                <select class="box">
                                @for($year = 2000; $year< now()->year+1; $year++)
												<option value="{{$year}}"  @if($year==now()->year) selected @endif>{{$year}}</option>
												@endfor
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px" ng-click="editUser('new')" data-toggle="modal" data-target="#myModal"> Tampilkan Data</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Laporan Data Indeks Artikel Harian, Periode 2015 s/d 2016
                        <br> Nama Karyawan : Vincentia Dyah </h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                <div class="modal-body">
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Sumber</th>
                                <th>Deskripsi Singkat</th>
                                <th>Kata Kunci</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Matahari</td>
                                <td>Puti</td>
                                <td>Buku ini</td>
                                <td>yaaaaa</td>
                                <td>1... 2...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="divTools" class="ToolsTable" style="padding-bottom: 10px">
            <table class="col-md-offset-2">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection