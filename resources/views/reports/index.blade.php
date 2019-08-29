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
                            <td colspan="2">
                                <select class="box">
                                    <option value="">Pilih Kriteria</option>
                                    <option class="dropdown-item">Semua User</option>
                                    <option class="dropdown-item">User Entry</option>
                                    <option class="dropdown-item">User Verifikator</option>
                                    <option class="dropdown-item">Jenis Artikel</option>
                                    <option class="dropdown-item">Kala Terbit</option>
                                    <option class="dropdown-item">Format</option>
                                    <option class="dropdown-item">Bahasa</option>
                                    <option class="dropdown-item">Status</option>
                                </select>
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
                                    style="color: white; font-size: 13px; font-weight:2px">Tampilkan
                                    Frekuensi</button>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px">Tampilkan Data</button>
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
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
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
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px">Tampilkan
                                    Frekuensi</button>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px">Tampilkan Data</button>
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
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                </select> s/d
                                <select class="box">
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px">Tampilkan
                                    Frekuensi</button>
                                <button class="btn btn-dark btn-sm"
                                    style="color: white; font-size: 13px; font-weight:2px">Tampilkan Data</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="formcontent">
            <div class="table-responsive">
                <iframe src="" width="100%" height="580px" frameborder="2px">
                </iframe>
            </div>
        </div>
    </main>
@endsection