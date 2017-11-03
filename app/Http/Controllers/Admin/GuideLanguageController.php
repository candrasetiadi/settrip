<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\GuideLanguage;

class GuideLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $guideLanguages = DB::table('guide_languages')->get();
        $title = 'Guide Language';

        return view('admin.guideLanguages.index', compact('guideLanguages', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Guide Language';
        return view('admin.guideLanguages.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GuideLanguage::create($request->all());

        $request->session()->flash('flash_message', 'Guide Language successfully added!');
        
        return redirect()->route('guideLanguage.index')
                        ->with('success','Guide Language created successfully');
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
        $title = 'Guide Language';
        $guideLanguage = GuideLanguage::findOrFail($id);
        return view('admin.guideLanguages.update', compact('guideLanguage', 'title'));
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
        $guideLanguage = GuideLanguage::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $guideLanguage->fill($input)->save();

        $request->session()->flash('flash_message', 'Guide Language successfully updated!');
        
        return redirect()->route('guideLanguage.index')
                        ->with('success','Guide Language updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guideLanguages = GuideLanguage::find($id);
        $guideLanguages->delete();

        // redirect
        return redirect()->route('guideLanguage.index')
                        ->with('success','Guide Language deleted successfully');
    }
}
