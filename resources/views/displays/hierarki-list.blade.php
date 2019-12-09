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
          <h5 style="font-weight: bold; color: black;">{{ $title->title }}</h5>
        </td>
      </tr>
    </tbody>
  </table>
  @foreach ($title->editions->groupBy('publish_year') as $year)  <div class="accordion" id="accordionExample">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header">
                    <a href="" class="card-headingOne" id="headingOne" data-toggle="collapse" data-target="{{'#collapseOne' . $year->first()->publish_year}}" aria-expanded="false" aria-controls="collapseOne">
                           <strong> +  {{ $year->first()->publish_year }} </strong>
                         </a>
                       </div>
                       @foreach($year as $edition)
                       <div id="{{'collapseOne' . $year->first()->publish_year}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                         <div class="kotak">
                           <div><a class="btn-link" data-toggle="collapse" href="{{'#multiCollapseExample1' . $edition->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                 + {{$edition->edition_year}}, {{$edition->edition_no}}, {{$edition->original_date}}
                                </a>
                             <div class="row">
                               <div class="col">
                                 <div class="collapse multi-collapse" id="{{'multiCollapseExample1'.$edition->id}}">
                                   <div style="padding-left:20px">
                                     @foreach ($edition->articles as $article)
                                     <li><a href="/displays/hierarkilog/{{ $article->id }}">{{ $article->article_title }}, p: {{ $article->pages }}</a></li>
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
                 </div>
                 @endforeach
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
