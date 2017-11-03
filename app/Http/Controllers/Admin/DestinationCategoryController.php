<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DestinationCategory;

class DestinationCategoryController extends Controller
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
        $destinationCategories = DB::table('destination_categories')->get();
        $title = 'Destination Category';

        return view('admin.destinationCategories.index', compact('destinationCategories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Destination Category';
        return view('admin.destinationCategories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DestinationCategory::create($request->all());

        $request->session()->flash('flash_message', 'Destination Category successfully added!');
        
        return redirect()->route('destinationCategory.index')
                        ->with('success','Destination Category Type created successfully');
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
        $title = 'Destination Category';
        $destinationCategory = DestinationCategory::findOrFail($id);
        return view('admin.destinationCategories.update', compact('destinationCategory', 'title'));
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
        $destinationCategory = DestinationCategory::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $destinationCategory->fill($input)->save();

        $request->session()->flash('flash_message', 'Destination Category successfully updated!');
        
        return redirect()->route('destinationCategory.index')
                        ->with('success','Destination Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destinationsCategory = DestinationCategory::find($id);
        $destinationsCategory->delete();

        // redirect
        return redirect()->route('destinationCategory.index')
                        ->with('success','Destination Category deleted successfully');
    }
}
