@extends('layouts.table')

@section('title')
Indeks Artikel | Master Status Ketersediaan
@endsection

@section('content')
<main style="background: white; padding:45px">
        @if (Session::has('success'))

        <div class="alert alert-success" role="alert">
        <strong>Success:</strong>{{ Session::get('success')}}
        </div>

        @endif

        @if (Session::has('error'))

        <div class="alert alert-danger" role="alert">
        <strong>Error:</strong>{{ Session::get('error')}}
        </div>

        @endif
        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Setting Master</a></li>
                <li class="breadcrumb-item active" aria-current="page">Master Status Ketersediaan</li>
            </ol>
        </div>
        <div class="createnew" style="padding-bottom: 10px">
            <a href="/statuses/create"><button>Tambah Baru</button></a>
        </div>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="GridHeader">
                    <th>No.</th>
                    <th>Nama Status</th>
                    <th>Jumlah Judul Sumber</th>
                    <th>Action</th>
                </tr>
			</thead>
			<tbody>
            @php $i=1 @endphp
			@foreach ($statuses as $status)
                <tr class="GridItem">
                    <td style="width:20px; text-align: center">{{$i++}}</td>
                    <td style="width:80px; text-align: center">{{$status->title}}</td>
                    {{--  <td style="text-align: center">{{  }}$articles->whereIn('edition_title_id',$editions->where('title_id',$title->id)->pluck('id'))->count()}}<a href="/editions/"></a></td>  --}}
                    <td style="width:50px; text-align: center">{{ $status->articles()->count() }}</td>
					<td style="width:50px; text-align: center">
                    <div class="row" style="">
                        <div class="col-md-2">
                        <a href='/statuses/{{$status->id}}/edit'><button class="btn btn-primary">Sunting</button></a>
                        </div>
                        <div class="col-md-2">
                           <p>  </p>
                        </div>
                        <div class="col-md-2">
                            <form method="POST" action="/statuses/{{$status->id}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin untuk menghapus?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
				@endforeach
            </tbody>
        </table>
    </main>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );
</script>
@endsection
