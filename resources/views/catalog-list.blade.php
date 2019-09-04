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
    <table id="Filtering" style="width: 100%">
        <tbody>
            <tr>
                <td style="width: 400px;">
                    <h5 style="font-weight: bold; color: black;">{{ $title->title }}</h5>
                </td>
                <td style="text-align: right; padding: 10px;">
                    <table style="float: right">
                        <tbody>
                            <tr>
                                <td>
                                    <select class="search box" name="ctl00$ContentPlaceHolder1$ddlKriteria"
                                        id="ContentPlaceHolder1_ddlKriteria" style="width:180px;">
                                        <option selected="selected" value="1">Semua Kategori</option>
                                        <option value="2">Tahun</option>
                                        <option value="3">Judul Edisi</option>
                                        <option value="4">Judul Artikel</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="search search-box" name="ctl00$ContentPlaceHolder1$txtKataKunci"
                                        type="text" id="ContentPlaceHolder1_txtKataKunci" style="width:150px;">
                                </td>
                                <td>
                                    <button type="submit" class="searchButton"><img
                                            src="../assets/magnifying-glass-2x.png">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="Grid" cellspacing="0" cellpadding="4" id="ContentPlaceHolder1_dgData"
        style="font-family:Tahoma;font-size:12px;width:100%;border-collapse:collapse;">
        <tbody>
            <tr class="GridHeader">
                <td>Tahun</td>
                <td>Judul Edisi</td>
                <td>Judul Artikel</td>
            </tr>
            @foreach ($title->editions as $edition)
            <tr class="GridItem">
                <td style="width:20px; text-align: center">{{ $edition->publish_year }}</td>
                <td style="width:300px"><a>{{$edition->edition_year}}, {{$edition->edition_no}}, {{$edition->original_date}}</a></td>
                <td style="width:100px;">
                    @foreach ($edition->articles as $article)
                    <li style="display: block"><a href="/articlelog/{{ $article->id }}">{{ $article->article_title }}. p: {{ $article->pages }}</a></li>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav style="padding-top:30px;">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1<span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item" aria-current="page">
                <a class="page-link" href="#">2 </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

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
