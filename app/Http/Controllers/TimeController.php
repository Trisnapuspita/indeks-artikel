<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Models\User;
use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::all();
        return view('times.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('times.create');
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

        // if(Time::where('slug', $slug)->first() != null)
        //     $slug = $slug . '-'.time();

            // $user = User::findOrFail($id);

        $times = Time::create([
            'user_id'=> Auth::user()->id,
            'title' => $request->title
        ]);

        return redirect('times')->with('msg', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('times.index', compact('time'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time= Time::findOrFail($id);
        return view('times.edit', compact('time'));
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

        $time= Time::findOrFail($id);
            $time->update([
            'title'=> $request->title
        ]);

        return redirect('times')->with('msg', 'kutipan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time= Time::findOrFail($id);
        try {
            $time->delete();
            Session::flash('success', 'Berhasil menghapus');
        }catch(\Illuminate\Database\QueryException $e) {
            
            Session::flash('error', 'Gagal menghapus, karena jenis ini direferensikan oleh beberapa judul sumber');
        }

        return redirect('times');
    }

    
}
