<?php

namespace App\Http\Controllers\Admin;

use App\Location;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        $default_lang = Language::where('is_default', 1)->first()->code;

        return view('admin.locations.index', compact(
            'locations',
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

        return view('admin.locations.create', compact(
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
        $location = Location::add($request->all());

        $location->is_public($request->get('is_public'));
        $location->saveContent($request->get('locale'));

        return redirect()->route('locations.index');
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
        $location = Location::find($id);
        $default_lang = Language::where('is_default', 1)->first()->code;
        $g_languages = Language::where('is_public', 1)->get();

        return view('admin.locations.edit', compact(
            'location',
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
        $location = Location::find($id);

        $location->is_public($request->get('is_public'));
        $location->localRemove($location->id);
        $location->saveContent($request->get('locale'));

        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->localRemove($location->id);
        $location->remove();

        return redirect()->route('locations.index');
    }
}
