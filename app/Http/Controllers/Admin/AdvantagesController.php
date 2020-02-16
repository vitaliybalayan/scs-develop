<?php

namespace App\Http\Controllers\Admin;

use App\Advantage;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvantagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advantages = Advantage::all();
        $default_lang = Language::where('is_default', 1)->first()->code;

        return view('admin.advantages.index', compact(
            'advantages',
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

        return view('admin.advantages.create', compact(
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
        $advantage = Advantage::add($request->all());

        $advantage->saveContent($request->get('locale'));
        $advantage->uploadImage($request->file('image'));
        $advantage->is_public($request->get('is_public'));

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
        $advantage = Advantage::find($id);
        $g_languages = Language::where('is_public', 1)->get();
        $default_lang = Language::where('is_default', 1)->first()->code;

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
        $advantage = Advantage::find($id);

        $advantage->edit($request->all());
        $advantage->saveContent($request->get('locale'));
        $advantage->uploadImage($request->file('image'));
        $advantage->is_public($request->get('is_public'));

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
        $advantage = Advantage::find($id);
        $advantage->localRemove($advantage->id);
        $advantage->remove();

        return redirect()->route('facts.index');
    }
}
