<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Title;
use App\Models\EditionTitle;
use Illuminate\Http\Request;

class EditionTitleController extends Controller
{
    public function store(Request $request, $id)
    {
        $this->validate(request(), [
            'edition_title'=>'required|min:1',
            'edition_image' => 'mimes:jpeg,jpg,png|max:1000'
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

    public function show($slug)
    {
        $editions= EditionTitle::with('articles')->where('slug', $slug)->first();
        return view('editions.single', compact('editions'));
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
            'edition_title'=>'required|min:1',
            'edition_image' => 'mimes:jpeg,jpg,png|max:1000'

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
