<?php

namespace App\Http\Controllers;

use App\Article;
use App\Localization;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index($lang)
    {
    	$articles = Article::where('is_public', 1)->get();

    	return view('articles.index', compact(
    		'articles'
    	));
    }

    public function show($lang, $slug)
    {
    	$article_id = Localization::where('language', $lang)
    								->where('field', 'slug')
    								->where('value', $slug)
    								->first()->lozalizable_id;

    	$article = Article::find($article_id);


    	$article_next_id = Localization::where('language', $lang)
    								->where('lozalizable_type', Article::class)
    								->where('lozalizable_id', '<>', $article_id)
    								->first()->lozalizable_id;

    	$article_next = Article::find($article_next_id);

    	return view('articles.show', compact(
    		'article',
    		'article_next'
    	));
    }
}
