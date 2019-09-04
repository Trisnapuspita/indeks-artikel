<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/0543565c6e.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indeks Artikel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style-admin.css">
    <link rel="stylesheet" href="../../css/grid.css">
    <!-- datatable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
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
                    <td>Tahun</td>
                    <td>Judul Edisi</td>
                    <td>Judul Artikel</td>
                </tr>
            </thead>
            <tbody>
                    @foreach ($title->editions as $edition)
                <tr>

                    <td style="width:20px; text-align: center">{{ $edition->publish_year }}</td>
                    <td style="width:300px"><a>{{$edition->edition_year}}, {{$edition->edition_no}}, {{$edition->original_date}}</a>
                    </td>
                    <td style="width:100px;">
                        @foreach ($edition->articles as $article)
                        @if($article->verification == 1)
                        <li style="display: block"><a href="/displays/articlelog/{{ $article->id }}">{{ $article->article_title }}. p: {{ $article->pages }}</a></li>
                        @endif
                        @endforeach
                    </td>

                </tr>
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
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="
    https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
