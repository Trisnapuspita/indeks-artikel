<?php

namespace App\Http\Controllers;

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

        $slug = str_slug($request->title, '_');
        //cek slug ngga kembar
        if(Time::where('slug', $slug)->first() != null)
            $slug = $slug . '-'.time();

        $times = Time::create([
            'title' => $request->title,
            'slug' => $slug,
            'user_id'=> Auth::user()->id
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
        if ($time->isOwner())
            $time->update([
            'title'=> $request->title
        ]);

        else abort(403);

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
        if($time->isOwner())
            $time->delete();
        else abort(404);

        return redirect('times')->with('msg', 'kutipan berhasil di hapus');
    }
}
