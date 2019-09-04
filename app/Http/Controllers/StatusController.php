<?php

namespace App\Http\Controllers;

use App\Models\ArticleEdition;
use App\Models\EditionTitle;
use Auth;
use App\Models\User;
use App\Models\Status;
use App\Models\Title;
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
        $titles = Title::all();
        $editions = EditionTitle::all();
        $articles = ArticleEdition::all();
        return view('statuses.index', compact('statuses', 'titles', 'editions', 'articles'));
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

        // $slug = str_slug($request->title, '_');

        // if(Status::where('slug', $slug)->first() != null)
        //     $slug = $slug . '-'.time();

            // $user = User::findOrFail($id);

        $statuses = Status::create([
            'user_id'=> Auth::user()->id,
            'title' => $request->title
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
            $status->update([
            'title'=> $request->title
        ]);

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
        $status->delete();

        return redirect('statuses')->with('msg', 'kutipan berhasil di hapus');
    }
}
