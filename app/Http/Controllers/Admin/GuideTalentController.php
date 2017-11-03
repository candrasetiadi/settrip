<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\GuideTalent;

class GuideTalentController extends Controller
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
        $guideTalents = DB::table('guide_talents')->get();
        $title = 'Guide Talent';

        return view('admin.guideTalents.index', compact('guideTalents', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Guide Talent';
        return view('admin.guideTalents.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GuideTalent::create($request->all());

        $request->session()->flash('flash_message', 'Guide Talent successfully added!');
        
        return redirect()->route('guideTalent.index')
                        ->with('success','Guide Talent created successfully');
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
        $title = 'Guide Talent';
        $guideTalent = GuideTalent::findOrFail($id);
        return view('admin.guideTalents.update', compact('guideTalent', 'title'));
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
        $guideTalent = GuideTalent::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $guideTalent->fill($input)->save();

        $request->session()->flash('flash_message', 'Guide Talent successfully updated!');
        
        return redirect()->route('guideTalent.index')
                        ->with('success','Guide Talent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guideTalents = GuideTalent::find($id);
        $guideTalents->delete();

        // redirect
        return redirect()->route('guideTalent.index')
                        ->with('success','Guide Talent deleted successfully');
    }
}
