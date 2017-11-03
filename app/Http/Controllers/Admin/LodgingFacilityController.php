<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\LodgingFacility;

class LodgingFacilityController extends Controller
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
        $lodgingFacilities = DB::table('lodging_facilities')->get();
        $title = 'Lodging Facility';

        return view('admin.lodgingFacilities.index', compact('lodgingFacilities', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Lodging Facility';
        return view('admin.lodgingFacilities.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LodgingFacility::create($request->all());

        $request->session()->flash('flash_message', 'Lodging Facility successfully added!');

        return redirect()->route('lodgingFacility.index')
                        ->with('success','Lodging Facility created successfully');
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
        $title = 'Lodging Facility';
        $LodgingFacility = LodgingFacility::findOrFail($id);
        return view('admin.LodgingFacilities.update', compact('LodgingFacility', 'title'));
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
        $lodgingFacility = LodgingFacility::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $lodgingFacility->fill($input)->save();

        $request->session()->flash('flash_message', 'Lodging Facility successfully updated!');

        return redirect()->route('lodgingFacility.index')
                        ->with('success','Lodging Facility updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lodgingTypes = LodgingFacility::find($id);
        $lodgingTypes->delete();

        // redirect
        return redirect()->route('lodgingFacility.index')
                        ->with('success','Lodging Facility deleted successfully');
    }
}
