<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\TransportationFacility;

class TransportationFacilityController extends Controller
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
        $transportationFacilities = DB::table('transportation_facilities')->get();
        $title = 'Transportation Facility';

        return view('admin.transportationFacilities.index', compact('transportationFacilities', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Transportation Facility';

        return view('admin.transportationFacilities.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TransportationFacility::create($request->all());

        $request->session()->flash('flash_message', 'Transportation Facility successfully added!');
        
        return redirect()->route('transportationFacility.index')
                        ->with('success','Transportation created successfully');
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
        $title = 'Transportation Facility';
        $transportationFacility = TransportationFacility::findOrFail($id);
        return view('admin.transportationFacilities.update', compact('transportationFacility', 'title'));
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
        $transportationFacility = TransportationFacility::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $transportationFacility->fill($input)->save();

        $request->session()->flash('flash_message', 'Transportation Facility successfully updated!');
        
        return redirect()->route('transportationFacility.index')
                        ->with('success','Transportation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transportations = TransportationFacility::find($id);
        $transportations->delete();

        // redirect
        return redirect()->route('transportation.index')
                        ->with('success','Transportation deleted successfully');
    }
}
