<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\TransportationType;

class TransportationTypeController extends Controller
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
        $transportationTypes = DB::table('transportation_types')->get();
        $title = 'Transportation Type';

        return view('admin.transportationTypes.index', compact('transportationTypes', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Transportation Type';
        return view('admin.transportationTypes.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TransportationType::create($request->all());

        $request->session()->flash('flash_message', 'Transportation Type successfully added!');
        
        return redirect()->route('transportationTypes.index')
                        ->with('success','Transportation types created successfully');
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
        $title = 'Transportation Type';
        $transportationType = TransportationType::findOrFail($id);
        return view('admin.transportationTypes.update', compact('transportationType', 'title'));
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
        $transportationType = TransportationType::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $transportationType->fill($input)->save();

        $request->session()->flash('flash_message', 'Transportation Type successfully updated!');
        
        return redirect()->route('transportationTypes.index')
                        ->with('success','Transportation types updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transportationTypes = TransportationType::find($id);
        $transportationTypes->delete();

        // redirect
        return redirect()->route('transportationTypes.index')
                        ->with('success','Transportation Type deleted successfully');
    }
}
