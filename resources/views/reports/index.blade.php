@extends('layouts.appp')

@section('title')
Indeks Artikel | Laporan Kinerja User
@endsection

@section('content')
<main style="height: 100%; padding:45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Kinerja Karyawan</li>
            </ol>
        </div>
        <div class="ButtonArea">
            <h3 style="text-align:center; font-weight:bold; font-family: var(--Rubik);padding-bottom: 10px">Laporan
                Kinerja Karyawan</h3>
            <div id="Div2"
                style="background:transparent; padding:50px; border-top: 2px solid white;border-bottom: 2px solid white">
            <form method="POST" action="/reports/search">
                            {{ csrf_field() }}
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <b style="font-size: 20px; font-weight: bold">Kriteria</b>
                            </td>
                            <td style="font-size: 20px;font-weight: bold; padding-left: 20px; padding-right: 20px">:
                            </td>
                            <td>
                                <select class="box" name="column" id="column" required>
                                    <option disabled selected hidden>Pilih Kriteria</option>
                                    <option class="dropdown-item" value="all">Semua</option>
                                    <option class="dropdown-item" value="subject">Subyek</option>
                                    <option class="dropdown-item" value="writer">Pengarang</option>
                                    <option class="dropdown-item" value="article_title">Judul Artikel</option>
                                    <option class="dropdown-item" value="call_number">No. Panggil</option>
                                </select>
                                <input name="param" id="param">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b style="font-size: 20px; font-weight: bold">Harian</b>
                            </td>
                            <td style="font-size: 20px;font-weight: bold; padding-left: 20px; padding-right: 20px">:
                            </td>
                            <td>
                                <input class="box" type="date" name="firstHarian" id="firstHarian">
                                s/d <input class="box" type="date" name="lastHarian" id="lastHarian">
                            </td>
                            <td>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px" type="submit"
                                    onclick='this.form.action="/reports/searchByDay"'> Tampilkan Data</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b style="font-size: 20px; font-weight: bold">Bulanan</b>
                            </td>
                            <td style="font-size: 20px;font-weight: bold; padding-left: 20px; padding-right: 20px">:
                            </td>
                            <td>
                                <select class="box" name="firstBulanan" id="firstBulanan">
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
                                <select class="box" name="firstTahunBulanan" id="firstTahunBulanan">
                                @for($year = 2000; $year< now()->year+1; $year++)
												<option value="{{$year}}"  @if($year==now()->year) selected @endif>{{$year}}</option>
												@endfor
                                </select> s/d
                                <select class="box" name="lastBulanan" id="lastBulanan">
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
                                <select class="box" name="lastTahunBulanan" id="lastTahunBulanan">
                                    @for($year = 2000; $year< now()->year+1; $year++)
                                        <option value="{{$year}}"  @if($year==now()->year) selected @endif>{{$year}}</option>
                                    @endfor
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px" type="submit"
                                    onclick='this.form.action="/reports/searchByMonth"'> Tampilkan Data</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b style="font-size: 20px; font-weight: bold">Tahunan</b>
                            </td>
                            <td style="font-size: 20px;font-weight: bold; padding-left: 20px; padding-right: 20px">:
                            </td>
                            <td>
                                <select class="box" name="firstTahunan" id="firstTahunan">
                                @for($year = 2000; $year< now()->year+1; $year++)
												<option value="{{$year}}"  @if($year==now()->year) selected @endif>{{$year}}</option>
												@endfor
                                </select> s/d
                                <select class="box" name="lastTahunan" id="lastTahunan">
                                @for($year = 2000; $year< now()->year+1; $year++)
												<option value="{{$year}}"  @if($year==now()->year) selected @endif>{{$year}}</option>
												@endfor
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px" type="submit"
                                    onclick='this.form.action="/reports/searchByYear"'> Tampilkan Data</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
        <br>
        <div>
            <div>
                <div class="headline" style="text-align: center;">
                <h5 style="text-align:center; font-weight:bold; font-family: var(--Rubik);padding-bottom: 10px">
                Laporan Data Indeks Artikel Harian, Periode 2015 s/d 2016</h5>
                <h5 style="text-align:center; font-weight:bold; font-family: var(--Rubik);padding-bottom: 10px">
                Trisna Hastuti Puspita Ningrum</h5>
                </div>
            <div>
        <br>
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
        </div>
    </div>
</div>
</main>
@endsection