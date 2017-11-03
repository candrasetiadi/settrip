<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DestinationActivity;

class DestinationActivityController extends Controller
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
        $destinationActivities = DB::table('destination_activities')->get();
        $title = 'Destination Activity';

        return view('admin.destinationActivities.index', compact('destinationActivities', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Destination Activity';
        return view('admin.destinationActivities.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DestinationActivity::create($request->all());

        $request->session()->flash('flash_message', 'Destination Activity successfully added!');
        
        return redirect()->route('destinationActivity.index')
                        ->with('success','Destination Activity Type created successfully');
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
        $title = 'Destination Activity';
        $destinationActivity = DestinationActivity::findOrFail($id);
        return view('admin.destinationActivities.update', compact('destinationActivity', 'title'));
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
        $destinationActivity = DestinationActivity::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $destinationActivity->fill($input)->save();

        $request->session()->flash('flash_message', 'Destination Activity successfully updated!');
        
        return redirect()->route('destinationActivity.index')
                        ->with('success','Destination Activity updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destinationsActivity = DestinationActivity::find($id);
        $destinationsActivity->delete();

        // redirect
        return redirect()->route('destinationActivity.index')
                        ->with('success','Destination Activity deleted successfully');
    }
}
