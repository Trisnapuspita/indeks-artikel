<?php

namespace App\Http\Controllers;

use Auth;
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
        $user = Auth::user();
        $data = null;
        if(session()->get( 'data' ) !=null) {
            $data = session()->get( 'data' );
        }
        
        return view('reports.index', compact('data', 'user'));       
    }

    public function searchByDay(Request $request) {
        $param = $request->param;
        $column = $request->column;
        $firstDay = $request->firstHarian;
        $lastDay = $request->lastHarian;
        $user = Auth::user();
        $result;
        if($column != "all" and $column != "call_number") {
            $result = ArticleEdition::where($column,'like','%'.$param.'%')
            ->whereDate('created_at', '>=', $firstDay)
            ->whereDate('created_at', '<=',$lastDay)
            ->where('user_id', $user->id)
            ->get();
        }else if ($column == "call_number") {     
            $result = EditionTitle::where($column,'like','%'.$param.'%')
            ->whereDate('created_at', '>=', $firstDay)
            ->whereDate('created_at', '<=',$lastDay)
            ->where('user_id', $user->id)
            ->get(); 
        }else {
            $result = DB::select(DB::raw("SELECT * FROM `article_editions` WHERE
            (`article_title` LIKE '%".$param."%' OR 
            `subject` LIKE '%".$param."%' OR        
            `writer` LIKE '%".$param."%' OR         
            `desc` LIKE '%".$param."%' OR           
            `keyword` LIKE '%".$param."%') AND 
            `created_at` >= '".$firstDay ."' AND 
            `created_at` <= '". $lastDay ."' AND
            `user_id` = '". $user->id. "'"));   
        }
        
        return redirect()->route( 'reportsIndex' )->with( [ 'data' => $result ] );
    }

    public function searchByMonth(Request $request) {
        $param = $request->param;
        $column = $request->column;
        $firstMonth = $request->firstBulanan;
        $lastMonth = $request->lastBulanan;
        $firstYear = $request->firstTahunBulanan;
        $lastYear = $request->lastTahunBulanan;
        $firstDate = $firstYear . "-" . $firstMonth . "-1";
        $lastDate = $lastYear . "-" . $lastMonth . "-31";
        $user = Auth::user();
        $result;
        if($column != "all" and $column != "call_number") {
            $result = ArticleEdition::where($column,'like','%'.$param.'%')
            ->whereDate('created_at', '>=', $firstDate)
            ->whereDate('created_at', '<=',$lastDate)
            ->where('user_id', $user->id)
            ->get();
        }else if ($column == "call_number") {     
            $result = EditionTitle::where($column,'like','%'.$param.'%')
            ->whereDate('created_at', '>=', $firstDate)
            ->whereDate('created_at', '<=',$lastDate)
            ->where('user_id', $user->id)
            ->get(); 
        }else {
            $result = DB::select(DB::raw("SELECT * FROM `article_editions` WHERE
            `article_title` LIKE '%".$param."%' OR 
            `subject` LIKE '%".$param."%' OR        
            `writer` LIKE '%".$param."%' OR         
            `desc` LIKE '%".$param."%' OR           
            `keyword` LIKE '%".$param."%') AND 
            `created_at` >= '".$firstDate ."' AND 
            `created_at` <= '". $lastDate ."' AND
            `user_id` = '". $user->id. "'"));
        }
        dd($result);
        return redirect()->route( 'reports.index' )->with( [ 'id' => $id ] );
    }

    public function searchByYear(Request $request) {
        $param = $request->param;
        $column = $request->column;
        $firstYear = $request->firstTahunan;
        $lastYear = $request->lastTahunan;
        $firstDate = $firstYear . "-01-01";
        $lastDate = $lastYear . "-12-31";
        $user = Auth::user();
        $result;
        if($column != "all" and $column != "call_number") {
            $result = ArticleEdition::where($column,'like','%'.$param.'%')
            ->whereDate('created_at', '>=', $firstDate)
            ->whereDate('created_at', '<=',$lastDate)
            ->where('user_id', $user->id)
            ->get();
        }else if ($column == "call_number") {     
            $result = EditionTitle::where($column,'like','%'.$param.'%')
            ->whereDate('created_at', '>=', $firstDate)
            ->whereDate('created_at', '<=',$lastDate)
            ->where('user_id', $user->id)
            ->get(); 
        }else {
            $result = DB::select(DB::raw("SELECT * FROM `article_editions` WHERE
            `article_title` LIKE '%".$param."%' OR 
            `subject` LIKE '%".$param."%' OR        
            `writer` LIKE '%".$param."%' OR         
            `desc` LIKE '%".$param."%' OR           
            `keyword` LIKE '%".$param."%') AND 
            `created_at` >= '".$firstDate ."' AND 
            `created_at` <= '". $lastDate ."' AND
            `user_id` = '".$user->id."'"));       
        }

        return redirect()->route( 'reports.index' )->with( [ 'id' => $id ] );
    }
}