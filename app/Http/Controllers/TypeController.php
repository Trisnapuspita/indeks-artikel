<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Auth;
use Session;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = Title::all();
        $types = Type::all();
        return view('types.index', compact('types', 'titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
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

        $types = Type::create([
            'user_id'=> Auth::user()->id,
            'title' => $request->title
        ]);

        return redirect('types')->with('msg', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('types.index', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type= Type::findOrFail($id);
        return view('types.edit', compact('type'));
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

        $type= Type::findOrFail($id);
            $type->update([
                'title' => $request->title,
        ]);

        return redirect('types')->with('msg', 'kutipan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type= Type::findOrFail($id);
        try {
            $type->delete();
            Session::flash('success', 'Berhasil menghapus');
        }catch(\Illuminate\Database\QueryException $e) {

            Session::flash('error', 'Gagal menghapus, karena jenis ini direferensikan oleh beberapa judul sumber');
        }

        return redirect('types');
    }
}
