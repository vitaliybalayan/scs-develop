<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
		$default_lang = Language::where('is_default', 1)->first()->code;

        return view('admin.articles.index', compact(
            'articles',
            'default_lang'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $g_languages = Language::where('is_public', 1)->get();

        return view('admin.articles.create', compact(
            'g_languages'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::add($request->all());

        $article->uploadImage($request->file('preview'));
        $article->is_public($request->get('is_public'));
        $article->saveContent($request->get('locale'));

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $article = Article::find($id);
        $default_lang = Language::where('is_default', 1)->first()->code;
		$g_languages = Language::where('is_public', 1)->get();

        return view('admin.articles.edit', compact(
            'article',
            'default_lang',
            'g_languages'
        ));
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
        $article = Article::find($id);

        $article->uploadImage($request->file('preview'));
        $article->is_public($request->get('is_public'));
        $article->localRemove($article->id);
        $article->saveContent($request->get('locale'));

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$article = Article::find($id);
		$article->localRemove($article->id);
		$article->remove();

		return redirect()->route('articles.index');
    }
}
