<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',

        ]);

        // $slug = str_slug($request->title, '_');

        // if(Language::where('slug', $slug)->first() != null)
        //     $slug = $slug . '-'.time();

            // $user = User::findOrFail($id);

        $languages = Language::create([
            'user_id'=> Auth::user()->id,
            'title' => $request->title
        ]);



        return redirect('languages')->with('msg', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('languages.index', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language= Language::findOrFail($id);
        return view('languages.edit', compact('language'));
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
            'title' => 'required|min:3',

        ]);

        $language= Language::findOrFail($id);
            $language->update([
            'title'=> $request->title
        ]);

        return redirect('languages')->with('msg', 'kutipan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language= Language::findOrFail($id);
        try {
            $language->delete();
            Session::flash('success', 'Berhasil menghapus');
        }catch(\Illuminate\Database\QueryException $e) {
            
            Session::flash('error', 'Gagal menghapus, karena jenis ini direferensikan oleh beberapa judul sumber');
        }

        return redirect('languages');
    }
}
