<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\EditionTitle;
use App\Models\ArticleEdition;
use Illuminate\Http\Request;

class ArticleEditionController extends Controller
{
    public function store(Request $request, $id)
    {
        $this->validate(request(), [
            'article_title'=>'required|min:1'
        ]);

        $edition = EditionTitle::findOrFail($id);

        $articles = ArticleEdition::create([
            'user_id'=> Auth::user()->id,
            'edition_title_id' => $id,
            'article_title'=>$request->article_title,
            'writer'=>$request->writer,
            'pages'=>$request->pages,
            'column'=>$request->column,
            'source'=>$request->source,
            'desc'=>$request->desc,

        ]);
        return redirect('/editions/'.$edition->slug)->with('msg', 'berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = ArticleEdition::findOrFail($id);
        return view('articles.edit', compact('articles'));
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
            'article_title'=>'required|min:1'

        ]);

        $articles= ArticleEdition::findOrFail($id);
        $articles->update([
            'article_title'=>$request->article_title,
            'writer'=>$request->writer,
            'pages'=>$request->pages,
            'column'=>$request->column,
            'source'=>$request->source,
            'desc'=>$request->desc,
        ]);
        
        return redirect('/editions/'. $articles->edition_title->slug)->with('msg', 'kutipan berhasil diedit');
    }

    public function destroy($id)
    {
        $articles= ArticleEdition::findOrFail($id);
        $articles->delete();

        return redirect('/editions/'. $articles->edition_title->slug)->with('msg', 'kutipan berhasil di hapus');
    }
    

    
}
