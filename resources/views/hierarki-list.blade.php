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
    <link rel="stylesheet" href="../src/style-admin.css">
    <link rel="stylesheet" href="../src/grid.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">
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
                    <h5 style="font-weight: bold; color: black;">TEMPO : Madjalah Berita Mingguan</h5>
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
    <div class="accordion" id="accordionExample">
        @foreach ($title->editions as $edition)
        
        <div class="card">
            <div class="card-header" id="headingOne" style="background: #e9ecef">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        {{ $edition->publish_year }}
                    </button>
                </h2>
            </div>
            
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">Edisi <a class="btn-link" data-toggle="collapse" href="#CollapseExample"
                        role="button" aria-expanded="false" aria-controls="CollapseExample">{{$edition->edition_year}}, {{$edition->edition_no}}, {{$edition->original_date}}</a>
                    <div class="row">
                        <div class="col"> 
                            <div class="collapse" id="CollapseExample">   
                                <div class="card card-body">Artikel
                                    @foreach ($edition->articles as $article)
                                    <li><a href="/hierarkilog/{{ $article->id }}">{{ $article->article_title }}, {{ $article->pages }}</a></li>
                                    @endforeach
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        @endforeach
    </div>
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