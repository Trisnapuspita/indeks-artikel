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
        // $fileName = time(). '.png';
        // $request->file('featured_img')->storeAs('public/upload', $fileName);

        $title = Title::create([
            'user_id'=> Auth::user()->id,
            'title'=>$request->title,
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
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $title = Title::findOrFail($id);
        return view('titles.edit', compact('types', 'times', 'languages', 'formats', 'title'));
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
                    'title'=>$request->title,
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
