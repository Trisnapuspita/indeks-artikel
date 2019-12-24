<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/0543565c6e.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style-admin.css">
    <link rel="stylesheet" href="../../css/grid.css">
    <!-- datatable css -->
    {{--  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <style>
        body {
            padding: 45px;
        }
    </style>
</head>

<body>
        <h5 style="font-weight: bold; color: black;">{{ $title->title }}</h5>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <td style="text-align: center">No.</td>
                    <td style="text-align: center">Judul Artikel</td>
                    <td style="text-align: center">Subyek</td>
                    <td style="text-align: center">Keterangan Sumber</td>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($title->editions as $edition)
                @foreach ($edition->articles as $article)
                <tr>
                    <td style="width:5px; text-align: center">{{ $i++ }}</td>
                    <td style="width:300px;"><a href="/articlelog/{{ $article->id }}">{{ $article->article_title }}. p: {{ $article->pages }}</a></td>
                    <td style="width:20px; text-align: center">{{ $article->subject }}</td>
                    <td style="width:300px"><a>{{$edition->edition_year}}, {{$edition->edition_no}}, {{$edition->original_date}}</a></td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </body>

</html>

<!-- SCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- Datatable -->
    {{--  <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>  --}}
    {{--  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>  --}}
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
            $(document).ready(function() {
                var t = $('#example').DataTable( {
                    "columnDefs": [ {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    } ],
                    "order": [[ 1, 'asc' ]]
                } );

                t.on( 'order.dt search.dt', function () {
                    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
            } );
    </script>
