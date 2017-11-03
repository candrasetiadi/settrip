<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DestinationFacility;

class DestinationFacilityController extends Controller
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
        $destinationFacilities = DB::table('destination_facilities')->get();
        $title = 'Destination Facility';

        return view('admin.destinationFacilities.index', compact('destinationFacilities', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Destination Facility';
        return view('admin.destinationFacilities.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DestinationFacility::create($request->all());

        $request->session()->flash('flash_message', 'Destination Facility successfully added!');
        
        return redirect()->route('destinationFacility.index')
                        ->with('success','Destination Facility Type created successfully');
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
        $title = 'Destination Facility';
        $destinationFacility = DestinationFacility::findOrFail($id);
        return view('admin.destinationFacilities.update', compact('destinationFacility', 'title'));
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
        $destinationFacility = DestinationFacility::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $destinationFacility->fill($input)->save();

        $request->session()->flash('flash_message', 'Destination Facility successfully updated!');
        
        return redirect()->route('destinationFacilities.index')
                        ->with('success','Destination Facility updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destinationsFacility = DestinationFacility::find($id);
        $destinationsFacility->delete();

        // redirect
        return redirect()->route('destinationFacilities.index')
                        ->with('success','Destination Facility deleted successfully');
    }
}
