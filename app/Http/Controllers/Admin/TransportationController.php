<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Transportation;

class TransportationController extends Controller
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
        $transportations = DB::table('transportations')->get();
        $title = 'Transportation';

        return view('admin.transportations.index', compact('transportations', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = DB::table('transportation_types')->get();
        $facilities = DB::table('transportation_facilities')->get();
        $title = 'Transportation';

        return view('admin.transportations.create', compact('types', 'facilities', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transportation::create($request->all());

        $request->session()->flash('flash_message', 'Transportation successfully added!');
        
        return redirect()->route('transportation.index')
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
        $title = 'Transportation';
        $transportation = Transportation::findOrFail($id);
        return view('admin.transportations.update', compact('transportation', 'title'));
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
        $transportation = Transportation::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $transportation->fill($input)->save();

        $request->session()->flash('flash_message', 'Transportation successfully updated!');
        
        return redirect()->route('transportation.index')
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
        $transportations = Transportation::find($id);
        $transportations->delete();

        // redirect
        return redirect()->route('transportations.index')
                        ->with('success','Transportation deleted successfully');
    }
}
