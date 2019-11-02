<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Models\Type;
use App\Models\Time;
use App\Models\Language;
use App\Models\Format;
use App\Models\Title;
use App\Models\Status;
use App\Models\EditionTitle;
use App\Models\ArticleEdition;
use App\Exports\ArticleExport;
use App\Imports\ArticleImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleEditionController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = ArticleEdition::with('edition_title')->get();

            return datatables()->of($query)
                    ->addIndexColumn()
                    ->addColumn('titles', function ($article_editions) {
                        return $article_editions->edition_title->title->title;
                    })
                    ->addColumn('editions', function($article_editions){
                        return ' '.$article_editions->edition_title->edition_year.','.$article_editions->edition_title->edition_no.','.$article_editions->edition_title->original_date;
                    })
                    ->addColumn('edit',function($article_editions){
                        return '<a class="btn btn-xs btn-primary" href="articles/'.$article_editions->id.'/edit">Sunting</a>';
                      })
                    ->addColumn('delete', function($data){
                        $button= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-xs">Hapus</button>';
                        return $button;
                    })
                    ->addColumn('status', function ($article_editions) {
                        return $article_editions->statuses->map(function ($status) {
                            return str_limit($status->title, 30, '...');
                        })->implode('<br>');
                    })
                    ->rawColumns(['edit', 'delete', 'editions', 'titles', 'status'])
                    ->make(true);
        }
        return view('articles.index');
    }

    public function create()
    {
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $statuses = Status::all();
        $titles = Title::all();
        $editions = EditionTitle::all();
        return view('articles.create', compact('types', 'times', 'languages', 'formats', 'titles', 'statuses', 'editions'));
    }

    public function store(Request $request, $id)
    {
        $this->validate(request(), [
            'article_title'=>'required|min:1',
            'edition_title'=>'required|min:1'
        ]);


        $slug = str_slug($request->publish_date, '_');

        //cek slug ngga kembar
        if(Title::where('slug', $slug)->first() != null)
            $slug = $slug . '-'.time();

        $fileName= null;

        if($request->edition_image != null) {
            $fileName = $request->edition_image->getClientOriginalName(). '.png';
            $request->file('edition_image')->storeAs('public/upload', $fileName);
        }

        $title = Title::findOrFail($id);
        $editions = EditionTitle::create([
            'user_id'=> Auth::user()->id,
            'edition_year'=>$request->edition_year,
            'edition_title'=>$request->edition_title,
            'slug'=>$slug,
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
        return redirect('/articles')->with('msg', 'Data berhasil ditambahkan');
    }

    public function new_store(Request $request)
    {
        $title;
        if($request->title_id==null) {
            $this->validate(request(), [
                'featured_img' => 'mimes:jpeg,jpg,png|max:1000',
                'kode'=> 'required|unique:titles'
            ], ['kode.unique'=> 'Kode sudah digunakan']);

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
        } else {
            $title = Title::find($request->title_id);
        }

        $editions;

        if ($request->edition_id==null) {

            $this->validate(request(), [
                'edition_image' => 'mimes:jpeg,jpg,png|max:1000',
                'edition_code'=> 'required|unique:edition_titles'
            ], ['edition_code.unique'=> 'Kode sudah digunakan']);

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

            $editions = EditionTitle::create([
                'user_id'=> Auth::user()->id,
                'edition_year'=>$request->edition_year,
                'edition_title'=>$request->edition_title,
                'edition_code'=>$request->edition_code,
                'slugs'=>$slugs,
                'title_id' => $title->id,
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

        return redirect('/articles')->with('msg', 'Data berhasil ditambahkan');
    }

    public function export_excel()
	{
		return Excel::download(new ArticleExport, 'article.xlsx');
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
		$file->move('file_articles',$nama_file);

		// import data
		Excel::import(new ArticleImport(), public_path('/file_articles/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/articles');
	}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuses = Status::all();
        $articles = ArticleEdition::findOrFail($id);
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $titles = Title::all();
        $editions = EditionTitle::all();
        return view('articles.edit', compact('articles', 'types', 'times', 'languages', 'formats', 'titles', 'statuses', 'editions'));
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
            'article_title'=>'required|min:1'

        ]);

        $articles= ArticleEdition::findOrFail($id);
        $articles->update([
            'updated_by'=>Auth::user()->id,
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

        $articles->statuses()->sync($request->statuses);
        return redirect('/articles')->with('msg', 'Artikel berhasil diedit');
    }

    public function destroy($id)
    {
        $articles= ArticleEdition::findOrFail($id);
        $articles->delete();

        return redirect('/articles')->with('msg', 'Artikel berhasil di hapus');
    }

    public function download()
    {
        $path = storage_path('template');
        return response()->download($path);
    }

    public function getEdition()
    {
        $title_id = request('title_id');
        $query = EditionTitle::where('title_id',$title_id);

        return datatables()->of($query)
                ->addIndexColumn()
                    ->rawColumns(['edit', 'delete', 'editions', 'titles', 'status'])
                    ->make(true);
    }

    public function getSumber()
    {
        $id = request('id');
        return Title::find($id);
    }

    public function getEdisi()
    {
        $id_edisi = request('id');
        return EditionTitle::find($id_edisi);
    }

}
