@extends('layouts.table')

@section('content')
<main style="background: white; padding:45px">
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="beranda-user.html">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sumber</li>
            </ol>
        </div>
        <div class="createnew" style="padding-bottom: 10px">
            <a href="/titles/create"><button>Tambah Sumber</button></a>
            <a href=""><button>Import</button></a>
            <a href="/titles/export_excel"><button>Eksport</button></a>
        </div>
        <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
           <thead>
                <tr class="GridHeader">
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Judul Sumber</th>
                    <th>Jenis</th>
                    <th>Kala Terbit</th>
                    <th>Tempat Terbit</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Tahun Terbit Pertama</th>
                    <th>Bahasa</th>
                    <th>Format</th>
                    <th>Jumlah Edisi</th>
                    <th>Jumlah Artikel</th>
                    <th>Action</th>
                </tr>
			</head>
			<tbody>
            @php $i=1 @endphp
			@foreach ($titles as $title)
                <tr class="GridItem">
<<<<<<< HEAD
                    <td style="width:20px; text-align: center">{{ $i++ }}</td>
                    <td><img src="{{asset('storage/upload/'. $title->featured_img) }}" style="max-width: 150px; height: auto; "class="image-fluid"></td>
                    <td style="width:300px; text-align: center"><a href="/titles/{{$title->slug}}">{{$title->title}}</a></td>
                    <td style="width:150px; text-align: center">@foreach ($title->types()->get() as $types){{$types->title}}@endforeach</td>
                    <td style="width:150px; text-align: center">@foreach ($title->times()->get() as $times){{$times->title}}@endforeach</td>
                    <td style="width:150px; text-align: center">{{$title->city}}</td>
                    <td style="width:150px;text-align: center">{{$title->publisher}}</td>
                    <td style="width:150px; text-align: center">{{$title->year}}</td>
                    <td style="width:150px; text-align: center">{{$title->first_year}}</td>
                    <td style="width:100px; text-align: center">@foreach ($title->languages()->get() as $languages){{$languages->title}}@endforeach</td>
                    <td style="width:100px; text-align: center">@foreach ($title->formats()->get() as $formats){{$formats->title}}@endforeach</td>
                    <td style="width:100px; text-align: center">{{$editions->where('title_id',$title->id)->count()}}<a href="/editions/create"><button style="float: right"><strong>+</strong></button></a></td>
                    <td style="width:100px; text-align: center">{{$articles->whereIn('edition_title_id',$editions->where('title_id',$title->id)->pluck('id'))->count()}}<a href="/articles/create"><button style="float: right"><strong>+</strong></button></a></td>
                    <td style="width:100px;text-align: center">
=======
                    <td>{{$title->id}}</td>
                    @if($title->featured_img == null)
                    <td><img src="{{asset('storage/upload/default.png')}}" style="max-width: 100px; height: auto;" class="image-fluid"></td>
                    @else
                    <td><img src="{{asset('storage/upload/'. $title->featured_img) }}" style="max-width: 100px; height: auto; "class="image-fluid"></td>
                    @endif
                    <td><a href="/titles/{{$title->slug}}">{{$title->title}}</a></td>
                    <td>@foreach ($title->types()->get() as $types){{$types->title}}@endforeach</td>
                    <td>@foreach ($title->times()->get() as $times){{$times->title}}@endforeach</td>
                    <td>{{$title->city}}</td>
                    <td>{{$title->publisher}}</td>
                    <td>{{$title->year}}</td>
                    <td>{{$title->first_year}}</td>
                    <td>@foreach ($title->languages()->get() as $languages){{$languages->title}}@endforeach</td>
                    <td>@foreach ($title->formats()->get() as $formats){{$formats->title}}@endforeach</td>
                    <td>{{$editions->where('title_id',$title->id)->count()}}<a href="/titles/{{$title->slug}}"><button style="float: right"><strong>+</strong></button></a></td>
                    <td style="text-align: center">{{$articles->whereIn('edition_title_id',$editions->where('title_id',$title->id)->pluck('id'))->count()}}<a href="/editions/"></a></td>
                    <td style="text-align: center">
>>>>>>> b380c3527b45bf36c92f3c7994f1bb9a0290ec26
						<a href="/titles/{{$title->id}}/edit"><button class="fas fa-edit" style="width:30px;height:30px"></button></a>
                        <br><br>
						<a><form method="POST" action="/titles/{{$title->id}}">
                        {{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE"><button type="submit" class="fa fa-trash"
                            style="width:30px;height:30px"></button></form></a>
                    </td>
                </tr>
				 @endforeach
            </tbody>
        </table>
        <div id="divTools" class="ToolsTable" style="padding-bottom: 10px">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            Export:
                        </td>
                        <td style="border-right-style: solid; border-right-width: 1px; border-right-color: #EBEBEB">
                            &nbsp;</td>
                        <td>
                            <a href="/titles/export_excel"><img src="../../assets/Export_Excel.png"
                                style="margin-top:10px;font-family:Arial;font-size:X-Small;height:40px;"></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection
