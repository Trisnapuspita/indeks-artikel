<?php

namespace App\Http\Controllers;

use App\Models\ArticleEdition;
use App\Models\Title;
use Illuminate\Http\Request;
use DB;

class HomeController1 extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function indexPost(Request $request) {
        $param = $request->param;
        $column = $request->column;

        if($column != "all" and $column != "title") {
            $article = ArticleEdition::where($column,'like','%'.$param.'%')->get();
            dd($article);

        }else if ($column == "title") {
            $title = Title::where($column,'like','%'.$param.'%')->get();
            dd($title);
        }else {
            $article = DB::select(DB::raw("SELECT * FROM `article_editions` WHERE
            `article_title` LIKE '%".$param."%' OR
            `subject` LIKE '%".$param."%' OR
            `writer` LIKE '%".$param."%' OR
            `desc` LIKE '%".$param."%' OR
            `keyword` LIKE '%".$param."%'"));

            dd($article);
        }

    }

}
