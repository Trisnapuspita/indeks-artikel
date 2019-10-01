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

class ArticleEditionController extends Controller
{
    public function index()
    {
        $title = Title::all();
        $edition = EditionTitle::all();
        $articles = ArticleEdition::all();
        return view('articles.index', compact('articles', 'edition', 'title'));
    }

    public function create()
    {
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $status = Status::all();
        $title = Title::all();
        $edition = EditionTitle::all();
        return view('articles.create', compact('types', 'times', 'languages', 'formats', 'title', 'status', 'edition'));
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
        return redirect('/articles')->with('msg', 'berhasil ditambahkan');
    }

    public function export_excel()
	{
		return Excel::download(new ArticleExport, 'article.xlsx');
    }

    public function import_excel(Request $request, $id)
	{


		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $edition = EditionTitle::findOrFail($id);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_articles',$nama_file);

		// import data
		Excel::import(new ArticleImport($id), public_path('/file_articles/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/editions/'.$edition->slug);
	}

    public function show($id)
    {
        //
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
        return view('articles.edit', compact('articles', 'statuses'));
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
        return redirect('/articles')->with('msg', 'kutipan berhasil diedit');
    }

    public function destroy($id)
    {
        $articles= ArticleEdition::findOrFail($id);
        $articles->delete();

        return redirect('/editions/'. $articles->edition_title->slug)->with('msg', 'kutipan berhasil di hapus');
    }

}
