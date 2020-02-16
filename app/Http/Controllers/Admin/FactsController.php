<?php

namespace App\Http\Controllers\Admin;

use App\Fact;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facts = Fact::all();
        $default_lang = Language::where('is_default', 1)->first()->code;

        return view('admin.facts.index', compact(
            'facts',
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

        return view('admin.facts.create', compact(
            'g_languages',
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
        $fact = Fact::add($request->all());

        $fact->saveContent($request->get('locale'));
        $fact->is_public($request->get('is_public'));

        return redirect()->route('facts.index');
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
        $fact = Fact::find($id);
        $default_lang = Language::where('is_default', 1)->first()->code;
        $g_languages = Language::where('is_public', 1)->get();

        return view('admin.facts.edit', compact(
            'g_languages',
            'default_lang',
            'fact'
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
        $fact = Fact::find($id);

        $fact->edit($request->all());
        $fact->saveContent($request->get('locale'));
        $fact->is_public($request->get('is_public'));

        return redirect()->route('facts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fact = Fact::find($id);
        $fact->localRemove($fact->id);
        $fact->remove();

        return redirect()->route('facts.index');
    }
}
