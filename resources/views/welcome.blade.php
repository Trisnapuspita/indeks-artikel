@extends('layouts.welcome')

@section('title')
Indeks Artikel | Beranda
@endsection

@section('content')

    <main class="imgBeranda">
        <div class="container text-center" style="padding-top: 90px;">
            <div class="row">
                <div class="col-lg-12 col-md-7">
                <img src="../../img/logo-perpunas.png" width="153" height="150" class="d-inline-block align-top" alt="">
                    <h6>Perpustakaan Nasional Republik Indonesia</h6>
                    <h1>INDEKS ARTIKEL</h1>
                    <div class="form-search-wrap mb-3">
                        <form method="post" action="/search">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 col-xl-6">
                                    <input type="text" class="form-control rounded" name="param" id="param"
                                        placeholder="Kata Kunci">
                                </div>
                                <div class="col-lg-12 col-xl-4">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control rounded" name="column" id="column">
                                            <option value="all">Sembarang</option>
                                            <option value="subject">Subjek</option>
                                            <option value="article_title">Judul Artikel</option>
                                            <option value="writer">Pengarang</option>
                                            <option value="title">Nama Surat Kabar/Majalah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-xl-1">
                                    <input type="submit" class="btn btn-dark btn-block rounded" value="Telusuri">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
    @if($datas != null)
    <div class="container ">
        <h2>Hasil Pencarian</h2>
        <p>Menampilkan semua hasil pencarian dengan kata kunci "{{ $param }}"</p>

        <div class="padding"></div>

        <div class="row">
            <div class="col-md-6 text-right">
                <div class="btn-group" style="display: none">
                    <button type="button" class="btn btn-primary active"><i class="fa fa-list"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fa fa-th"></i></button>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover" id="result_area">
                <tbody>
                    @foreach ($datas as $data)
{{-- {{dd($data->edition_title->)}} --}}
                    @if($data['article_title'] != null)

                    <tr onclick="window.location='/datas/{{ $data['article_id'] }}'">
                        <td>
                        @if($data['featured_img']==null)
                        <img src="{{asset('storage/upload/default.png')}}" class="border" onmouseover="this.style.cursor='pointer';" style="width:50px;height:50px">
                        @else
                        <img src="{{ asset('storage/upload/'.$data['featured_img']) }}" class="border" onmouseover="this.style.cursor='pointer';" style="width:50px;height:50px">
                        @endif
                        </td>
                        <td class="product"><strong>{{ $data['subject'] }}</strong><br>
                            <br>
                            {{ $data['writer'] }}

                            <br>
                            <br>
                            <strong>{{ $data['article_title'] }}. {{ $data['title'] }}. - {{$data['edition_year']}},
                                {{$data['edition_no']}}, {{$data['original_date']}}.
                                - {{ $data['publisher'] }}, {{ $data['first_year'] }}. p:
                                {{ $data['pages'] }}</strong><br>

                            <br>


                            {{ $data['desc'] }}

                            <br>
                            <br>
                            @foreach ($types as $type)
                            @if($type->titles()->get()->where('id',$data['title_id'])->count() > 0)
                            {{ $type->title }}
                            @endif
                            @endforeach


                            -
                            @foreach ($times as $time)
                            @if($time->titles()->get()->where('id',$data['title_id'])->count() > 0)
                            {{ $time->title }}
                            @endif
                            @endforeach
                            -
                            @foreach ($languages as $language)
                            @if($language->titles()->get()->where('id',$data['title_id'])->count() > 0)
                            {{ $language->title }}
                            @endif
                            @endforeach


                            -
                            @foreach ($formats as $format)
                            @if($format->titles()->get()->where('id',$data['title_id'])->count() > 0)
                            {{ $format->title }}
                            @endif
                            @endforeach


                            -
                            {{ $data['call_number'] }}

                            <br>
                            <br>

                            dibuat oleh:
                            @foreach ($user->where('id', $data['user_id']) as $u)
                            {{ $u->longname }}
                            @endforeach


                        </td>

                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

                {{-- {{$countBuilds->links()}} --}}

                {{-- {{ $searches->links() }} --}}

                {{--  <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li>  --}}
            </ul>
        </nav>
    </div>
    @endif
    </main>
    @endsection

