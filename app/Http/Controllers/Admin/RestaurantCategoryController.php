<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\RestoCategory;

class RestaurantCategoryController extends Controller
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
        $categories = DB::table('resto_categories')->get();
        $title = 'Restaurant Category';

        return view('admin.restaurantCategories.index', compact('categories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Restaurant Category';
        return view('admin.restaurantCategories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RestoCategory::create($request->all());

        $request->session()->flash('flash_message', 'Restaurant Category successfully added!');
        
        return redirect()->route('restaurantCategory.index')
                        ->with('success','Restaurant Category created successfully');
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
        $title = 'Restaurant Category';
        $restaurantCategories = RestoCategory::findOrFail($id);
        return view('admin.restaurantCategories.update', compact('restaurantCategories', 'title'));
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
        $restaurantCategories = RestoCategory::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $restaurantCategories->fill($input)->save();

        $request->session()->flash('flash_message', 'Restaurant Categories successfully updated!');

        return redirect()->route('restaurantCategory.index')
                        ->with('success','Restaurant Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurantCategories = RestoCategory::find($id);
        $restaurantCategories->delete();

        // redirect
        return redirect()->route('restaurantCategory.index')
                        ->with('success','Restaurant Category deleted successfully');
    }
}
