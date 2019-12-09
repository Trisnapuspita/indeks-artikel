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
    <link rel="stylesheet" href="../src/admin/style-admin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">
</head>

<body>

    <header>
    </header>

    <main style="height: 100%; padding: 45px">

        <div class="mr-auto" style="padding-bottom:10px;">
            <ol class="breadcrumb">
                @foreach($titles as $title)
                @foreach($editions as $edition)
                @if($edition->id == $article->edition_title_id)
                @if($title->id == $edition->title_id)
                <li class="breadcrumb-item"><a href="/displays/hierarki/{{ $title->id }}">Etalase</a></li>
                <li class="breadcrumb-item"><a href="/displays/hierarki/{{ $title->id }}">Hirarki Indeks</a></li>
                <li class="breadcrumb-item"><a href="/displays/hierarki/{{ $title->id }}">Edisi {{$edition->edition_year}}, {{$edition->edition_no}}, {{$edition->original_date}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artikel {{ $article->article_title }}. p: {{ $article->pages }}</li>
                @endif
                @endif
                @endforeach
                @endforeach
            </ol>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td style="width:200px">Judul Artikel</td>
                                <td>:</td>
                                <td><span style="font-weight:bold;">{{ $article->article_title }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:200px">Status Kegunaan</td>
                                <td>:</td>
                                @foreach ($article->statuses()->get() as $stat)
                                <td><span style="font-weight:bold;">{{ $stat->title }}</span>
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td style="width:200px">Pengarang</td>
                                <td>:</td>
                                <td><span style="font-weight:bold;">{{ $article->writer }}</span></td>
                            </tr>
                            <tr>
                                <td style="width:200px">Halaman</td>
                                <td>:</td>
                                <td><span style="font-weight:bold;">{{ $article->pages }}</span></td>
                            </tr>
                            <tr>
                                <td style="width:200px">Kolom</td>
                                <td>:</td>
                                <td><span style="font-weight:bold;">{{ $article->column }}</span></td>
                            </tr>
                            <tr>
                                <td>Sumber Online</td>
                                <td>:</td>
                                <td><span style="font-weight:bold;"><a class="btn-link"href="">{{ $article->source }}</a></span>
                                </td>
                            </tr>
                            <tr>
                                    <td style="width:200px">Deskripsi Singkat</td>
                                    <td>:</td>
                                    <td><span style="font-weight:bold;"><a>{{ $article->desc }}</a></span></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/js/mdb.min.js"></script>
