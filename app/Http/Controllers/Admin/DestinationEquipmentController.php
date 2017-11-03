<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DestinationEquipment;

class DestinationEquipmentController extends Controller
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
        $destinationEquipments = DB::table('destination_equipments')->get();
        $title = 'Destination Equipment';

        return view('admin.destinationEquipments.index', compact('destinationEquipments', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Destination Equipment';
        return view('admin.destinationEquipments.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DestinationEquipment::create($request->all());

        $request->session()->flash('flash_message', 'Destination Equipment successfully added!');
        
        return redirect()->route('destinationEquipment.index')
                        ->with('success','Destination Equipment Type created successfully');
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
        $title = 'Destination Equipment';
        $destinationEquipment = DestinationEquipment::findOrFail($id);
        return view('admin.destinationEquipments.update', compact('destinationEquipment', 'title'));
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
        $destinationEquipment = DestinationEquipment::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $destinationEquipment->fill($input)->save();

        $request->session()->flash('flash_message', 'Destination Equipment successfully updated!');
        
        return redirect()->route('destinationEquipment.index')
                        ->with('success','Destination Equipment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destinationsEquipments = DestinationEquipment::find($id);
        $destinationsEquipments->delete();

        // redirect
        return redirect()->route('destinationEquipment.index')
                        ->with('success','Destination Equipment deleted successfully');
    }
}
