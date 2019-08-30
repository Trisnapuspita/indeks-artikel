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
use Illuminate\Http\Request;
class EditionTitleController extends Controller
{

    // public function source_list()
    // {
    //     $titles = Title::all();
    //     $editions = EditionTitle::all();
    //     return view('catalog-list', compact('titles', 'editions'));
    // }

    public function store(Request $request, $id)
    {
        $this->validate(request(), [
            'edition_title'=>'required|min:1'
        ]);
        $slug = str_slug($request->edition_title, '_');
        //cek slug ngga kembar
        if(Title::where('slug', $slug)->first() != null)
            $slug = $slug . '-'.time();
        $fileName = time(). '.png';
        $request->file('edition_image')->storeAs('public/upload', $fileName);
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
<<<<<<< HEAD

        $title = Title::findOrFail($id);
		return Excel::download(new EditionExportView(), 'edition.xlsx');
=======
		return Excel::download(new EditionExport($id), 'edition.xlsx');
>>>>>>> 1918c0f563e8d30ecfe80a0e7cd7665eb4486388
    }

    public function import_excel(Request $request, $id)
	{
<<<<<<< HEAD
        Auth::user()->id;
=======
>>>>>>> 1918c0f563e8d30ecfe80a0e7cd7665eb4486388

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
<<<<<<< HEAD
		Excel::import(new EditionImport, public_path('/file_editions/'.$nama_file));

=======
		Excel::import(new EditionImport($id), public_path('/file_editions/'.$nama_file));
 
>>>>>>> 1918c0f563e8d30ecfe80a0e7cd7665eb4486388
		// notifikasi dengan session
		Session::flash('sukses','Data Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/titles/'.$title->slug);
	}

    public function show($slug)
    {
        $editions= EditionTitle::with('articles')->where('slug', $slug)->first();
        $statuses= Status::all();
        return view('editions.single', compact('editions', 'statuses'));
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
        $fileName = time(). '.png';
        $request->file('edition_image')->storeAs('public/upload', $fileName);
        $editions= EditionTitle::findOrFail($id);
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
