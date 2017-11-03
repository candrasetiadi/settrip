<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\LodgingType;

class LodgingTypeController extends Controller
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
        $lodgings = DB::table('lodging_types')->get();
        $title = 'Lodging Type';

        return view('admin.lodgingTypes.index', compact('lodgings', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Lodging Type';
        return view('admin.lodgingTypes.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LodgingType::create($request->all());

        $request->session()->flash('flash_message', 'Lodging Type successfully added!');

        return redirect()->route('lodgingType.index')
                        ->with('success','Lodging Type created successfully');
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
        $title = 'Lodging Type';
        $lodgingType = LodgingType::findOrFail($id);
        return view('admin.lodgingTypes.update', compact('lodgingType', 'title'));
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
        $lodgingType = LodgingType::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $lodgingType->fill($input)->save();

        $request->session()->flash('flash_message', 'Lodging Type successfully updated!');

        return redirect()->route('lodgingType.index')
                        ->with('success','Lodging Type created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lodgingTypes = LodgingType::find($id);
        $lodgingTypes->delete();

        // redirect
        return redirect()->route('lodgingType.index')
                        ->with('success','Lodging Type deleted successfully');
    }
}
