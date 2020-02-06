<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();

        return view('admin.languages.index', compact(
            'languages'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.languages.create');
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
            'name' => 'required',
            'code' => 'required'
        ]);

        $language = Language::add($request->all());
        $language->uploadImage($request->file('icon'));
        $language->is_public($request->get('is_public'));
        $language->is_default($request->get('is_default'));

        return redirect()->route('languages.index');
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
        $language = Language::find($id);

        return view('admin.languages.edit', compact(
            'language'
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
        $language = Language::find($id);

        $this->validate($request, [
            'name' => 'required',
            'code' => 'required'
        ]);

        $language->edit($request->all());
        $language->uploadImage($request->file('icon'));
        $language->is_public($request->get('is_public'));
        $language->is_default($request->get('is_default'));

        return redirect()->route('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        DB::delete('delete from localization where language = ?', [$language->code]);
        $language->remove($id);

        return redirect()->route('languages.index');
    }
}
