<?php

namespace App\Http\Controllers;

use App\Models\EditionTitle;
use App\Models\ArticleEdition;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('reports.index');
    }

    public function search(Request $request) {
        $param = $request->param;
        $column = $request->column;

        if($column != "all" and $column != "call_number") {
            $article = ArticleEdition::where($column,'like','%'.$param.'%')->get();
        }else if ($column == "call_number") {     
            $call_number = EditionTitle::where($column,'like','%'.$param.'%')->get(); 
        }else {
            $article = DB::select(DB::raw("SELECT * FROM `article_editions` WHERE
            `article_title` LIKE '%".$param."%' OR 
            `subject` LIKE '%".$param."%' OR        
            `writer` LIKE '%".$param."%' OR         
            `desc` LIKE '%".$param."%' OR           
            `keyword` LIKE '%".$param."%'"));   
        }

        return redirect()->route( 'reports.index' )->with( [ 'id' => $id ] );
    }
}
