<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DestinationAttraction;

class DestinationAttractionController extends Controller
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
        $destinationAttractions = DB::table('destination_attractions')->get();
        $title = 'Destination Attraction';

        return view('admin.destinationAttractions.index', compact('destinationAttractions', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Destination Attraction';

        $destinations = DB::table('destinations')->get();

        return view('admin.destinationAttractions.create', compact('title', 'destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DestinationAttraction::create($request->all());

        $request->session()->flash('flash_message', 'Destination Attraction successfully added!');
        
        return redirect()->route('destinationAttraction.index')
                        ->with('success','Destination Attraction created successfully');
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
        $title = 'Destination Attraction';

        $destinationAttraction = DestinationAttraction::findOrFail($id);
        $destinations = DB::table('destinations')->get();

        return view('admin.destinationAttractions.update', compact('destinationAttraction', 'destinations', 'title'));
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
        $destinationAttraction = DestinationAttraction::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $destinationAttraction->fill($input)->save();

        $request->session()->flash('flash_message', 'Destination Attraction successfully updated!');
        
        return redirect()->route('destinationAttraction.index')
                        ->with('success','Destination Attraction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destinationsAttraction = DestinationAttraction::find($id);
        $destinationsAttraction->delete();

        // redirect
        return redirect()->route('destinationAttraction.index')
                        ->with('success','Destination Attraction deleted successfully');
    }
}
