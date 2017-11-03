<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Lodging;

class LodgingController extends Controller
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
        $lodgings = DB::table('lodgings')->get();
        $title = 'Lodging';

        return view('admin.lodgings.index', compact('lodgings', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = DB::table('lodging_types')->get();
        $facilities = DB::table('lodging_facilities')->get();
        $provinces = DB::table('provinces')->get();
        $regencies = DB::table('regencies')->get();
        $title = 'Lodging';

        return view('admin.lodgings.create', compact('types', 'provinces', 'regencies', 'facilities', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lodging::create($request->all());

        $request->session()->flash('flash_message', 'Lodging successfully added!');
        
        return redirect()->route('lodgings.index')
                        ->with('success','Lodging created successfully');
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
        $title = 'Lodging';
        $lodging = RestoCategory::findOrFail($id);
        return view('admin.lodgings.update', compact('lodging', 'title'));
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
        $lodging = Lodging::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $lodging->fill($input)->save();

        $request->session()->flash('flash_message', 'Lodging successfully updated!');
        
        return redirect()->route('lodgings.index')
                        ->with('success','Lodging updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lodgings = Lodging::find($id);
        $lodgings->delete();

        // redirect
        return redirect()->route('lodgings.index')
                        ->with('success','Lodging deleted successfully');
    }
}
