<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statuses.create');
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
        if(Status::where('slug', $slug)->first() != null)
            $slug = $slug . '-'.time();

        $statuses = Status::create([
            'title' => $request->title,
            'slug' => $slug,
            'user_id'=> Auth::user()->id
        ]);

        return redirect('statuses')->with('msg', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('statuses.index', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status= Status::findOrFail($id);
        return view('statuses.edit', compact('status'));
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

        $status= Status::findOrFail($id);
        if ($status->isOwner())
            $status->update([
            'title'=> $request->title
        ]);

        else abort(403);

        return redirect('statuses')->with('msg', 'kutipan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status= Status::findOrFail($id);
        if($status->isOwner())
            $status->delete();
        else abort(404);

        return redirect('statuses')->with('msg', 'kutipan berhasil di hapus');
    }
}
