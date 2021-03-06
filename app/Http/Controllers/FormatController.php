<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Models\User;
use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formats = Format::all();
        return view('formats.index', compact('formats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formats.create');
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

        // if(Format::where('slug', $slug)->first() != null)
        //     $slug = $slug . '-'.time();

            // $user = User::findOrFail($id);

        $formats = Format::create([
            'user_id'=> Auth::user()->id,
            'title' => $request->title
        ]);

        return redirect('formats')->with('msg', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('formats.index', compact('format'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $format= Format::findOrFail($id);
        return view('formats.edit', compact('format'));
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

        $format= Format::findOrFail($id);
            $format->update([
            'title'=> $request->title
        ]);

        return redirect('formats')->with('msg', 'kutipan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $format= Format::findOrFail($id);
        try {
            $format->delete();
            Session::flash('success', 'Berhasil menghapus');
        }catch(\Illuminate\Database\QueryException $e) {
            
            Session::flash('error', 'Gagal menghapus, karena jenis ini direferensikan oleh beberapa judul sumber');
        }

        return redirect('formats');
    }
}
