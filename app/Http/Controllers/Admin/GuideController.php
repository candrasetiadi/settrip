<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Guide;

class GuideController extends Controller
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
        $guides = DB::table('guides')->get();
        $title = 'Guide';

        return view('admin.guides.index', compact('guides', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $talents = DB::table('guide_talents')->get();
        $languages = DB::table('guide_languages')->get();
        $provinces = DB::table('provinces')->get();
        $regencies = DB::table('regencies')->get();
        $title = 'Guide';

        return view('admin.guides.create', compact('talents', 'provinces', 'regencies', 'languages', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Guide::create($request->all());

        $request->session()->flash('flash_message', 'Guide successfully added!');
        
        return redirect()->route('guides.index')
                        ->with('success','Guide created successfully');
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
        $title = 'Guide';
        $guide = Guide::findOrFail($id);
        return view('admin.guides.update', compact('guide', 'title'));
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
        $guide = Guide::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $guide->fill($input)->save();

        $request->session()->flash('flash_message', 'Guide successfully updated!');
        
        return redirect()->route('guides.index')
                        ->with('success','Guide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guides = Guide::find($id);
        $guides->delete();

        // redirect
        return redirect()->route('guides.index')
                        ->with('success','Guide deleted successfully');
    }
}
