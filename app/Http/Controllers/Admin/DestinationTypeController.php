<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DestinationType;

class DestinationTypeController extends Controller
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
        $destinationTypes = DB::table('destination_types')->get();
        $title = 'Destination Type';

        return view('admin.destinationTypes.index', compact('destinationTypes', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Destination Type';
        return view('admin.destinationTypes.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DestinationType::create($request->all());

        $request->session()->flash('flash_message', 'Destination Type successfully added!');
        
        return redirect()->route('destinationType.index')
                        ->with('success','Destination Type created successfully');
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
        $title = 'Destination Type';
        $destinationType = DestinationType::findOrFail($id);
        return view('admin.destinationTypes.update', compact('destinationType', 'title'));
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
        $destinationType = DestinationType::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $destinationType->fill($input)->save();

        $request->session()->flash('flash_message', 'Destination Type successfully updated!');
        
        return redirect()->route('destinationType.index')
                        ->with('success','Destination Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destinationsType = DestinationType::find($id);
        $destinationsType->delete();

        // redirect
        return redirect()->route('destinationType.index')
                        ->with('success','Destination Type deleted successfully');
    }
}
