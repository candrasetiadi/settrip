<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\LodgingDetail;

class LodgingDetailRoomController extends Controller
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
        $lodgingDetailRooms = DB::table('lodging_details')->get();
        $title = 'Lodging Detail Room';

        return view('admin.lodgingDetailRooms.index', compact('lodgingDetailRooms', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lodgings = DB::table('lodgings')->get();
        $lodgingRoomTypes = DB::table('lodging_room_types')->get();
        $title = 'Lodging';

        return view('admin.lodgingDetailRooms.create', compact('lodgings', 'lodgingRoomTypes', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LodgingDetail::create($request->all());
        return redirect()->route('lodgingDetailRoom.index')
                        ->with('success','Lodging Detail successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lodgings = LodgingDetail::find($id);
        $lodgings->delete();

        // redirect
        return redirect()->route('lodgingDetailRoom.index')
                        ->with('success','Lodging Detail successfully');
    }
}
