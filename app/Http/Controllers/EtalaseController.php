<?php

namespace App\Http\Controllers;

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

class EtalaseController extends Controller
{
    //buat di dalem
    public function etalase_in(Request $request)
    {
        $editions = EditionTitle::all();
        $articles = ArticleEdition::all();
        $res = DB::table('titles')->paginate(10);
        $search_q = urlencode($request->search);
        if(!empty($request->search))
        $titles = Title::where('title', 'like', '%'.$search_q.'%')->get()-paginate(2);
        else
            $titles = Title::all();
        // $result = Title::when($request->s, function ($search) use ($request){
        //     $search->where('title', 'like', $request->s);
        // })->paginate(10);
        // $datas = null;
        // $search = null;
        // $user = User::all();
        // if(session()->get( 'datas' ) !=null) {
        //     $data = session()->get('datas');
        //     $search = session()->get('search');
        // }
        // $searches = DB::table('titles')->paginate(10);
        // $search = $request->search;
        // $data = DB::table('titles')->where(`title`,`like`,"%".$search."%")->get();
        return view('displays.etalase', compact('titles', 'editions','articles', 'res' ));
    }

    public function etalase_show_in($id)
    {
        $title = Title::find($id);
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();

        if(empty($title)){
            abort(404);
        }

        return view('displays.etalase-sumber', compact('title', 'types', 'times', 'languages', 'formats'));
    }

    public function catalog_show_in($id)
    {
        $title = Title::find($id);

        if(empty($title)){
            abort(404);
        }

        return view('displays.catalog-list', compact('title'));
    }

    public function articlelog_show_in($id)
    {
        $article = ArticleEdition::find($id);//bener
        $editions = EditionTitle::all();
        $titles = Title::all();
        $statuses = Status::all();
        // dd($article);

        if(empty($article)){
            abort(404);
        }

        return view('displays.article-catalog')->with(compact('article', 'titles', 'editions', 'statuses'));
    }

    public function hierarki_show_in($id)
    {
        $title = Title::find($id);

        if(empty($title)){
            abort(404);
        }

        return view('displays.hierarki-list')->with(compact('title'));
    }

    public function hierarkilog_show_in($id)
    {
        $article = ArticleEdition::find($id);//bener
        $editions = EditionTitle::all();
        $titles = Title::all();
        $statuses = Status::all();
        // dd($article);

        if(empty($article)){
            abort(404);
        }

        return view('displays.hierarki-catalog')->with(compact('article', 'titles', 'editions', 'statuses'));
    }

    // $tags=Tag::all();
    //     $search_q = urlencode($request->input('search'));

    //     if(!empty($search_q))
    //         $quotes = Quote::with('tags')->where('title', 'like', '%'.$search_q.'%')->get();

    //     else

    //         $quotes = Quote::with('tags')->get();
    //     return view('quotes.index',compact('quotes', 'tags'));

    //buat di luar
    public function etalase(Request $request)
    {
        $editions = EditionTitle::all();
        $articles = ArticleEdition::all();
        $res = DB::table('titles')->paginate(1);
        $search_q = urlencode($request->search);
        if(!empty($request->search))
            $titles = Title::where('title', 'like', '%'.$search_q.'%')->get()-paginate(2);
        else
            $titles = Title::all();
        // $result = Title::when($request->s, function ($search) use ($request){
        //     $search->where('title', 'like', $request->s);
        // })->paginate(10);
        // $datas = null;
        // $search = null;
        // $user = User::all();
        // if(session()->get( 'datas' ) !=null) {
        //     $data = session()->get('datas');
        //     $search = session()->get('search');
        // }
        // $searches = DB::table('titles')->paginate(10);
        // $search = $request->search;
        // $data = DB::table('titles')->where(`title`,`like`,"%".$search."%")->get();
        return view('etalase', compact('titles', 'editions','articles', 'res' ));
    }
    // $search_q = urlencode($request->input('search'));

    //     if(!empty($search_q))
    //         $quotes = Quote::with('tags')->where('title', 'like', '%'.$search_q.'%')->get();

    //     else

    //         $quotes = Quote::with('tags')->get();

    // public function etalase_search(Request $request)
    // {
    //     $search = $request->search;
    //     $res = DB::select(
    //         DB::raw("SELECT
    //         `titles`.`title`,
    //         `titles`.`id` as `title_id`,
    //         `edition_titles`.`id` as `edition_id`,
    //         `article_edition_status`.`edition_title_id`,
    //         ")
    //     )
    //     return redirect () -> route ('etalase_out')->with([]);
    // }

    public function etalase_show($id)
    {
        $title = Title::find($id);
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();

        if(empty($title)){
            abort(404);
        }

        return view('etalase-sumber', compact('title', 'types', 'times', 'languages', 'formats'));
    }

    public function catalog_show($id)
    {
        $title = Title::find($id);

        if(empty($title)){
            abort(404);
        }

        return view('catalog-list', compact('title'));
    }

    public function articlelog_show($id)
    {
        $article = ArticleEdition::find($id);//bener
        $editions = EditionTitle::all();
        $titles = Title::all();
        $statuses = Status::all();
        // dd($article);

        if(empty($article)){
            abort(404);
        }

        return view('article-catalog')->with(compact('article', 'titles', 'editions', 'statuses'));
    }

    public function hierarki_show($id)
    {
        $title = Title::find($id);

        if(empty($title)){
            abort(404);
        }

        return view('hierarki-list')->with(compact('title'));
    }

    public function hierarkilog_show($id)
    {
        $article = ArticleEdition::find($id);//bener
        $editions = EditionTitle::all();
        $titles = Title::all();
        $statuses = Status::all();
        // dd($article);

        if(empty($article)){
            abort(404);
        }

        return view('hierarki-catalog')->with(compact('article', 'titles', 'editions', 'statuses'));
    }
}
