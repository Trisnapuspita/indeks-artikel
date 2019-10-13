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
use App\Imports\EditionImport;
use App\Exports\EditionExport;
use App\Models\EditionTitle;
use App\Models\ArticleEdition;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use DB;

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
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $status = Status::all();
        $titles = Title::all();
        $editions = EditionTitle::all();
        return view('editions.create', compact('types', 'times', 'languages', 'formats', 'titles', 'status', 'editions'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'edition_title'=>'required|min:1',
            'featured_img' => 'mimes:jpeg,jpg,png|max:1000',
            'kode'=> 'required|unique:titles,kode',
            'edition_code'=> 'required|unique:edition_titles,edition_code',
        ]);
        $title;
        if($request->title_id==null) {
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

        $slugs = str_slug($request->publish_date, '_');

        if(EditionTitle::where('slugs', $slugs)->first() != null)
            $slugs = $slugs . '-'.time();

        $file= null;

        if($request->edition_image != null) {
            $file = $request->edition_image->getClientOriginalName(). '.png';
            $request->file('edition_image')->storeAs('public/upload', $file);
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
            'edition_image'=> $file
        ]);
        
        return redirect('editions')->with('msg', 'berhasil ditambahkan');
    }

    public function create_article($id)
    {
        $editions = EditionTitle::find($id);
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $statuses = Status::all();
        $title = Title::all();
        return view('editions.add_article', compact('types', 'times', 'languages', 'formats', 'title', 'statuses', 'editions'));
    }

    public function store_article(Request $request, $id)
    {
        $this->validate(request(), [
            'article_title'=>'required|min:1'
        ]);
            $editions = EditionTitle::find($id);
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

        return redirect('/articles')->with('msg', 'berhasil ditambahkan');
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

    public function show($id)
    {
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        $statuses = Status::all();
        $title = Title::findOrFail($id);
        $editions= EditionTitle::where('title_id',$id)->get();
        $articles = ArticleEdition::all();
        return view('editions.single', compact('types', 'times', 'languages', 'formats', 'title', 'statuses', 'editions', 'articles'));
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
        $types = Type::all();
        $times = Time::all();
        $languages = Language::all();
        $formats = Format::all();
        
        return view('editions.edit', compact('editions', 'types', 'times', 'languages', 'formats'));
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
            'updated_by'=>Auth::user()->id,
            'edition_year'=>$request->edition_year,
            'edition_title'=>$request->edition_title,
            'volume'=>$request->volume,
            'edition_no'=>$request->edition_no,
            'year'=>$request->year,
            'publish_date'=>$request->publish_date,
            'publish_month'=>$request->publish_month,
            'publish_year'=>$request->publish_year,
            'original_date'=>$request->original_date,
            'call_number'=>$request->call_number,
            'edition_image'=> $fileName
        ]);

        return redirect('/editions')->with('msg', 'kutipan berhasil diedit');
    }
    public function destroy($id)
    {
        $editions= EditionTitle::findOrFail($id);
        $editions->delete();
        return redirect('/editions')->with('msg', 'kutipan berhasil di hapus');
    }

}
