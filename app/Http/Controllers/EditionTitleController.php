<?php
namespace App\Http\Controllers;

use Session;
use Auth;
use App\Models\Status;
use App\Imports\EditionImport;
use App\Exports\EditionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Title;
use App\Models\EditionTitle;
use App\Models\ArticleEdition;
use Illuminate\Http\Request;
class EditionTitleController extends Controller
{

    public function index()
    {
        $editions = EditionTitle::all();
        $articles = ArticleEdition::all();
        return view('editions.index', compact('titles', 'editions','articles'));
    }

    public function create()
    {
        $title = Title::all();
        return view('editions.create', compact('title'));
    }

    public function store(Request $request, $id)
    {
        $this->validate(request(), [
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
        return redirect('/titles/'.$title->slug)->with('msg', 'berhasil ditambahkan');
    }

    public function export_excel($id)
	{
		return Excel::download(new EditionExport($id), 'edition.xlsx');
    }

    public function import_excel(Request $request, $id)
	{

		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $title = Title::findOrFail($id);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_editions',$nama_file);

		// import data
		Excel::import(new EditionImport($id), public_path('/file_editions/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/titles/'.$title->slug);
	}

    public function show($slug)
    {
        $editions= EditionTitle::with('articles')->where('slug', $slug)->first();
        $statuses= Status::all();
        $articles= ArticleEdition::all();
        return view('editions.single', compact('editions', 'statuses', 'articles'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editions = EditionTitle::findOrFail($id);
        return view('editions.edit', compact('editions'));
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
            'edition_title'=>'required|min:1'

        ]);
        $fileName= null;
        $editions= EditionTitle::findOrFail($id);

        if($request->edition_image != null) {
            $fileName = $request->edition_image->getClientOriginalName(). '.png';
            $request->file('edition_image')->storeAs('public/upload', $fileName);
        } else {
            $fileName = $editions->edition_image;
        }

        $editions->update([
            'edition_year'=>$request->edition_year,
            'edition_title'=>$request->edition_title,
            'volume'=>$request->volume,
            'edition_no'=>$request->edition_no,
            'year'=>$request->year,
            'publish_date'=>$request->publish_date,
            'publish_month'=>$request->publish_month,
            'publish_year'=>$request->publish_year,
            'original_date'=>$request->original_date,
            'call_data'=>$request->call_data,
            'edition_image'=> $fileName
        ]);

        return redirect('/titles/'. $editions->title->slug)->with('msg', 'kutipan berhasil diedit');
    }
    public function destroy($id)
    {
        $editions= EditionTitle::findOrFail($id);
        $editions->delete();
        return redirect('/titles/'. $editions->title->slug)->with('msg', 'kutipan berhasil di hapus');
    }

}
