<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Models\Status;
use App\Models\EditionTitle;
use App\Models\ArticleEdition;
use App\Exports\ArticleExport;
use App\Imports\ArticleImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ArticleEditionController extends Controller
{
    public function store(Request $request, $id)
    {
        $this->validate(request(), [
            'article_title'=>'required|min:1'
        ]);

        $edition = EditionTitle::findOrFail($id);

        $articles = ArticleEdition::create([
            'user_id'=> Auth::user()->id,
            'edition_title_id' => $id,
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
        return redirect('/editions/'.$edition->slug)->with('msg', 'berhasil ditambahkan');
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
		Excel::import(new ArticleImport, public_path('/file_articles/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
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
        return redirect('/editions/'. $articles->edition_title->slug)->with('msg', 'kutipan berhasil diedit');
    }

    public function destroy($id)
    {
        $articles= ArticleEdition::findOrFail($id);
        $articles->delete();

        return redirect('/editions/'. $articles->edition_title->slug)->with('msg', 'kutipan berhasil di hapus');
    }

    public function verif($id) {
        $article = ArticleEdition::find($id);
        $article->update([
            'verification'=> 1
        ]);
        return redirect('/editions/'. $article->edition_title->slug)->with('msg', 'Artikel berhasil di verifikasi');
    }
    

    
}
