<?php
namespace App\Http\Controllers;


use Session;
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
use App\Imports\TitleImport;
use App\Exports\TitleExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use DB;

class TitleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $titles = Title::all();
        $editions = EditionTitle::all();
        $articles = ArticleEdition::all();
        return view('titles.index', compact('titles', 'editions','articles'));
    }

    public function etalase()
    {
        $titles = Title::all();
        $editions = EditionTitle::all();
        $articles = ArticleEdition::all();
        return view('etalase', compact('titles', 'editions','articles'));
    }


    public function create()
    {
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        return view('titles.create', compact('types', 'times', 'languages', 'formats'));
    }
    
    public function store(Request $request)
    {
        $this->validate(request(), [
            'featured_img' => 'mimes:jpeg,jpg,png|max:1000'
        ]);
        $slug = str_slug($request->title, '_');
        //cek slug ngga kembar
        if(Title::where('slug', $slug)->first() != null)
            $slug = $slug . '-'.time();

        $fileName= null;

        if($request->featured_img != null) {
            $fileName = $request->featured_img->getClientOriginalName(). '.png';
            $request->file('featured_img')->storeAs('public/upload', $fileName);
        }
        
        $title = Title::create([
            'user_id'=> Auth::user()->id,
            'title'=>$request->title,
            'kode' => $request->kode,
            'slug' => $slug,
            'city'=>$request->city,
            'publisher'=>$request->publisher,
            'year'=>$request->year,
            'first_year'=>$request->first_year,
            'featured_img'=> $fileName
        ]);
        $title->types()->attach($request->types);
        $title->times()->attach($request->times);
        $title->languages()->attach($request->languages);
        $title->formats()->attach($request->formats);
        return redirect('titles')->with('msg', 'berhasil ditambahkan');
    }

    public function create_article($id)
    {
        $title = Title::findOrFail($id);
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $statuses = Status::all();
        $editions = EditionTitle::all();
        return view('titles.add_article', compact('types', 'times', 'languages', 'formats', 'title', 'statuses', 'editions'));
    }
    
    public function store_article(Request $request, $id)
    { dd($request);
        $this->validate(request(), [
            'article_title'=>'required|min:1',
            'edition_title'=>'required|min:1'
        ]);
        $editions;

        if ($request->edition_id==null) {
            $slugs = str_slug($request->publish_date, '_');
            //cek slugs ngga kembar
            if (EditionTitle::where('slugs', $slugs)->first() != null) {
                $slugs = $slugs . '-'.time();
            }

            $fileName= null;

            if ($request->edition_image != null) {
                $fileName = $request->edition_image->getClientOriginalName(). '.png';
                $request->file('edition_image')->storeAs('public/upload', $fileName);
            }

            $title = Title::findOrFail($id);
            $editions = EditionTitle::create([
            'user_id'=> Auth::user()->id,
            'edition_year'=>$request->edition_year,
            'edition_title'=>$request->edition_title,
            'slugs'=>$slugs,
            'title_id' => $id,
            'volume'=>$request->volume,
            'chapter'=>$request->chapter,
            'edition_no'=>$request->edition_no,
            'year'=>$request->year,
            'publish_date'=>$request->publish_date,
            'publish_month'=>$request->publish_month,
            'publish_year'=>$request->publish_year,
            'original_date'=>$request->original_date,
            'call_number'=>$request->call_number,
            'edition_image'=> $fileName
            ]);
        } else {
            $editions = EditionTitle::find($request->edition_id);
        }
            $articles = ArticleEdition::create([
            'user_id'=> Auth::user()->id,
            'edition_title_id' => $editions->id,
            'article_title'=>$request->article_title,
            'subject'=>$request->subject,
            'writer'=>$request->writer,
            'pages'=>$request->pages,
            'column'=>$request->column,
            'source'=>$request->source,
            'desc'=>$request->desc,
            'keyword'=>$request->keyword,
            'detail_img'=>$request->detail_img
        ]);
            $articles->statuses()->attach($request->statuses);

        return redirect('/titles')->with('msg', 'berhasil ditambahkan');
    }

    public function show($slug)
    {
        $title= Title::with('editions')->where('slug', $slug)->first();
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $status = Status::all();
        $articles = ArticleEdition::all();
        if(empty($title)){
            abort(404);
        }

        return view('titles.single', compact('types', 'times', 'languages', 'formats', 'title', 'status', 'edition', 'articles'));
    }

    public function search(Request $request) {
        $param = $request->param;
        $column = $request->column;
        $titles;

        if($column == "type") {
            $titles = Type::where('title','like','%'.$param.'%')->get();
        }else if ($column == "time") {
            $titles = Time::where('title','like','%'.$param.'%')->get();
        }else if ($column == "language") {
            $titles = Language::where('title','like','%'.$param.'%')->get();
        }else if ($column == "format") {
            $titles = Format::where('title','like','%'.$param.'%')->get();
        }else {
            $titles = DB::select(DB::raw("SELECT * FROM `titles` WHERE
            `title` LIKE '%".$param."%' OR
            `city` LIKE '%".$param."%' OR
            `publisher` LIKE '%".$param."%' OR
            `year` LIKE '%".$param."%' OR
            `first_year` LIKE '%".$param."%'"));
        }

        return view('titles.index', compact('param', 'colomn', 'titles'));

    }

    public function etalase_in()
    {
        $titles = Title::all();
        $editions = EditionTitle::all();
        $articles = ArticleEdition::all();
        return view('displays.etalase', compact('titles', 'editions','articles'));
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
        // dd($article);

        if(empty($article)){
            abort(404);
        }

        return view('displays.article-catalog')->with(compact('article', 'titles', 'editions'));
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
        $title = Title::find($id);
        $article = ArticleEdition::find($id);
        $edition = EditionTitle::find($id);
        // dd($article);

        if(empty($article)){
            abort(404);
        }

        return view('displays.hierarki-catalog')->with(compact('article', 'title', 'edition'));
    }

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
        // dd($article);

        if(empty($article)){
            abort(404);
        }

        return view('article-catalog')->with(compact('article', 'titles', 'editions'));
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
        $title = Title::find($id);
        $article = ArticleEdition::find($id);
        $edition = EditionTitle::find($id);
        // dd($article);

        if(empty($article)){
            abort(404);
        }

        return view('hierarki-catalog')->with(compact('article', 'title', 'edition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $title = Title::findOrFail($id);
        return view('titles.edit', compact('user','types', 'times', 'languages', 'formats', 'title'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'featured_img' => 'mimes:jpeg,jpg,png|max:1000'
        ]);

        $fileName= null;
        $title= Title::findOrFail($id);

        if($request->featured_img != null) {
            $fileName = $request->featured_img->getClientOriginalName(). '.png';
            $request->file('featured_img')->storeAs('public/upload', $fileName);
        } else {
            $fileName = $title->featured_img;
        }

        // $fileName = time(). '.png';
        // $request->file('featured_img')->storeAs('public/upload', $fileName);

        $title->update([
                    'updated_by'=>Auth::user()->id,
                    'title'=>$request->title,
                    'kode'=>$request->kode,
                    'city'=>$request->city,
                    'publisher'=>$request->publisher,
                    'year'=>$request->year,
                    'featured_img'=> $fileName
                ]);

        $title->types()->sync($request->types);
        $title->times()->sync($request->times);
        $title->languages()->sync($request->languages);
        $title->formats()->sync($request->formats);
        return redirect('titles')->with('msg', 'kutipan berhasil diedit');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $title= Title::findOrFail($id);
        $title->delete();
        return redirect('titles')->with('msg', 'kutipan berhasil di hapus');
    }

    public function export_excel()
    {
        return Excel::download(new TitleExport, 'judul.xlsx');
    }

    public function import_excel(Request $request)
	{

		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
        ]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_titles',$nama_file);

		// import data
		Excel::import(new TitleImport(), public_path('/file_titles/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/titles');
    }


}
