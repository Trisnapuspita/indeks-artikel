<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Type;
use App\Models\Time;
use App\Models\Language;
use App\Models\Format;
use App\Models\Title;
use App\Models\Status;
use App\Models\EditionTitle;
use App\Models\ArticleEdition;
use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    public function article_in($id){
        $article = ArticleEdition::find($id);//bener
        $editions = EditionTitle::all();
        $titles = Title::all();
        // dd($article);

        if(empty($article)){
            abort(404);
        }
        return view('article-list', compact('article', 'titles', 'editions'));
    }

    public function index(){
        $user = User::all();
        $datas = null;
        $types = null;
        $times = null;
        $languages = null;
        $formats = null;
        $param = null;
        //$searches = DB::table('titles')->paginate(10);
        $articles = null;
        if(session()->get( 'datas' ) !=null){
            $types = Type::with('titles')->get();
            $times = Time::with('titles')->get();
            $languages = Language::with('titles')->get();
            $formats = Format::with('titles')->get();
            $datas = session()->get( 'datas' );
            $param = session()->get( 'param' );
        }
        // dd($datas);
        return view('welcome', compact('user', 'datas', 'types', 'times', 'languages', 'formats','param'));
    }

    public function indexWelcome(Request $request){
        $param = $request->param;
        $column = $request->column;


        if($column != "all" and $column != "title") {
            // $result = ArticleEdition::where($column,'like','%'.$param.'%')->get();
            //dd($article);
            // dd($result);
            $result = DB::select(
                DB::raw("SELECT
                `titles`.`title`,
                `titles`.`id` as `title_id`,
                `titles`.`first_year`,
                `titles`.`publisher`,
                `titles`.`featured_img`,
                `edition_titles`.`id` as `edition_id`,
                `edition_titles`.`edition_title`,
                `edition_titles`.`edition_no`,
                `edition_titles`.`edition_year`,
                `edition_titles`.`original_date`,
                `edition_titles`.`call_number`,
                `article_editions`.`id` as `article_id`,
                `article_editions`.`article_title`,
                `article_editions`.`subject`,
                `article_editions`.`writer`,
                `article_editions`.`desc`,
                `article_editions`.`pages`,
                `article_editions`.`keyword`,
                `article_editions`.`user_id` as `user_id`,
                `article_edition_status`.`status_id`
            FROM `titles`
                LEFT JOIN `edition_titles` ON `edition_titles`.`title_id` = `titles`.`id`
                LEFT JOIN `article_editions` ON `article_editions`.`edition_title_id` = `edition_titles`.`id`
                LEFT JOIN `article_edition_status` ON `article_edition_status`.`article_edition_id` = `article_editions`.`id`
            WHERE
            `titles`.`title`  LIKE '%".$param."%' OR
            `titles`.`first_year` LIKE '%".$param."%' OR
            `titles`.`publisher`  LIKE  '%".$param."%' OR
            `titles`.`featured_img` LIKE '%".$param."%' OR
            `edition_titles`.`edition_title` LIKE '%".$param."%' OR
            `edition_titles`.`edition_no` LIKE '%".$param."%' OR
            `edition_titles`.`edition_year` LIKE '%".$param."%' OR
            `edition_titles`.`original_date` LIKE '%".$param."%' OR
            `edition_titles`.`call_number` LIKE  '%".$param."%' OR
            `article_editions`.`article_title` LIKE '%".$param."%' OR
            `article_editions`.`subject` LIKE '%".$param."%' OR
            `article_editions`.`writer` LIKE '%".$param."%' OR
            `article_editions`.`desc` LIKE '%".$param."%' OR
            `article_editions`.`pages` LIKE '%".$param."%' OR
            `article_editions`.`keyword` LIKE '%".$param."%' OR
            `article_editions`.`user_id` LIKE '%".$param."%' OR
            `article_edition_status`.`status_id` LIKE '%".$param."%'"));


        }else if ($column == "title") {
            // $result = Title::where($column,'like','%'.$param.'%')->get();
            //dd($title);
            $result = DB::select(
                DB::raw("SELECT
                `titles`.`title`,
                `titles`.`id` as `title_id`,
                `titles`.`first_year`,
                `titles`.`publisher`,
                `titles`.`featured_img`,
                `edition_titles`.`id` as `edition_id`,
                `edition_titles`.`edition_title`,
                `edition_titles`.`edition_no`,
                `edition_titles`.`edition_year`,
                `edition_titles`.`original_date`,
                `edition_titles`.`call_number`,
                `article_editions`.`id` as `article_id`,
                `article_editions`.`article_title`,
                `article_editions`.`subject`,
                `article_editions`.`writer`,
                `article_editions`.`desc`,
                `article_editions`.`pages`,
                `article_editions`.`keyword`,
                `article_editions`.`user_id` as `user_id`,
                `article_edition_status`.`status_id`
            FROM `titles`
                LEFT JOIN `edition_titles` ON `edition_titles`.`title_id` = `titles`.`id`
                LEFT JOIN `article_editions` ON `article_editions`.`edition_title_id` = `edition_titles`.`id`
                LEFT JOIN `article_edition_status` ON `article_edition_status`.`article_edition_id` = `article_editions`.`id`
            WHERE
            `titles`.`title`  LIKE '%".$param."%' OR
            `titles`.`first_year` LIKE '%".$param."%' OR
            `titles`.`publisher`  LIKE  '%".$param."%' OR
            `titles`.`featured_img` LIKE '%".$param."%' OR
            `edition_titles`.`edition_title` LIKE '%".$param."%' OR
            `edition_titles`.`edition_no` LIKE '%".$param."%' OR
            `edition_titles`.`edition_year` LIKE '%".$param."%' OR
            `edition_titles`.`original_date` LIKE '%".$param."%' OR
            `edition_titles`.`call_number` LIKE  '%".$param."%' OR
            `article_editions`.`article_title` LIKE '%".$param."%' OR
            `article_editions`.`subject` LIKE '%".$param."%' OR
            `article_editions`.`writer` LIKE '%".$param."%' OR
            `article_editions`.`desc` LIKE '%".$param."%' OR
            `article_editions`.`pages` LIKE '%".$param."%' OR
            `article_editions`.`keyword` LIKE '%".$param."%' OR
            `article_editions`.`user_id` LIKE '%".$param."%' OR
            `article_edition_status`.`status_id` LIKE '%".$param."%'"));

        }else {
            $result = DB::select(
                DB::raw("SELECT
                `titles`.`title`,
                `titles`.`id` as `title_id`,
                `titles`.`first_year`,
                `titles`.`publisher`,
                `titles`.`featured_img`,
                `edition_titles`.`id` as `edition_id`,
                `edition_titles`.`edition_title`,
                `edition_titles`.`edition_no`,
                `edition_titles`.`edition_year`,
                `edition_titles`.`original_date`,
                `edition_titles`.`call_number`,
                `article_editions`.`id` as `article_id`,
                `article_editions`.`article_title`,
                `article_editions`.`subject`,
                `article_editions`.`writer`,
                `article_editions`.`desc`,
                `article_editions`.`pages`,
                `article_editions`.`keyword`,
                `article_editions`.`user_id` as `user_id`,
                `article_edition_status`.`status_id`
            FROM `titles`
                LEFT JOIN `edition_titles` ON `edition_titles`.`title_id` = `titles`.`id`
                LEFT JOIN `article_editions` ON `article_editions`.`edition_title_id` = `edition_titles`.`id`
                LEFT JOIN `article_edition_status` ON `article_edition_status`.`article_edition_id` = `article_editions`.`id`
            WHERE
            `titles`.`title`  LIKE '%".$param."%' OR
            `titles`.`first_year` LIKE '%".$param."%' OR
            `titles`.`publisher`  LIKE  '%".$param."%' OR
            `titles`.`featured_img` LIKE '%".$param."%' OR
            `edition_titles`.`edition_title` LIKE '%".$param."%' OR
            `edition_titles`.`edition_no` LIKE '%".$param."%' OR
            `edition_titles`.`edition_year` LIKE '%".$param."%' OR
            `edition_titles`.`original_date` LIKE '%".$param."%' OR
            `edition_titles`.`call_number` LIKE  '%".$param."%' OR
            `article_editions`.`article_title` LIKE '%".$param."%' OR
            `article_editions`.`subject` LIKE '%".$param."%' OR
            `article_editions`.`writer` LIKE '%".$param."%' OR
            `article_editions`.`desc` LIKE '%".$param."%' OR
            `article_editions`.`pages` LIKE '%".$param."%' OR
            `article_editions`.`keyword` LIKE '%".$param."%' OR
            `article_editions`.`user_id` LIKE '%".$param."%' OR
            `article_edition_status`.`status_id` LIKE '%".$param."%'"));

        }
        return redirect () -> route ('welcomeHome')->with(['datas' => $result, 'param' => $param]);
    }

}
