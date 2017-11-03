<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\LodgingRoomType;

class LodgingRoomTypeController extends Controller
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
        $lodgingRoomTypes = DB::table('lodging_room_types')->get();
        $title = 'Room Type';

        return view('admin.lodgingRoomTypes.index', compact('lodgingRoomTypes', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Room Type';
        return view('admin.lodgingRoomTypes.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LodgingRoomType::create($request->all());

        $request->session()->flash('flash_message', 'Lodging Room Type successfully added!');

        return redirect()->route('lodgingRoomType.index')
                        ->with('success','Lodging Room created successfully');
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
        $title = 'Lodging Room Type';
        $lodgingRoomType = RestoCategory::findOrFail($id);
        return view('admin.lodgingRoomTypes.update', compact('lodgingRoomType', 'title'));
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
        $lodgingRoomType = LodgingRoomType::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $lodgingRoomType->fill($input)->save();

        $request->session()->flash('flash_message', 'Lodging Room Type successfully updated!');

        return redirect()->route('lodgingRoomType.index')
                        ->with('success','Lodging Room created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lodgingRoomTypes = LodgingRoomType::find($id);
        $lodgingRoomTypes->delete();

        // redirect
        return redirect()->route('lodgingRoomTypes.index')
                        ->with('success','Lodging Room deleted successfully');
    }
}
