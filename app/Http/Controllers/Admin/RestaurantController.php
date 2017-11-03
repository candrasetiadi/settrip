<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Resto;

class RestaurantController extends Controller
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
        $restaurants = DB::table('restos')
            ->leftJoin('resto_categories', 'restos.id_resto_category', '=', 'resto_categories.id')
            ->select('restos.*', 'resto_categories.name as category_name')
            ->get();

        $title = 'Restaurant';

        return view('admin.restaurants.index', compact('restaurants', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = DB::table('provinces')->get();
        $regencies = DB::table('regencies')->get();
        $categories = DB::table('resto_categories')->get();
        $title = 'Restaurant';

        return view('admin.restaurants.create', compact('provinces', 'regencies', 'categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = ($request->tags != null) ? implode(',', $request->tags) : null;
        $request->merge([
            'tags' => $tags
        ]);

        Resto::create($request->all());

        $request->session()->flash('flash_message', 'Restaurant successfully added!');

        return redirect()->route('restaurant.index')
                        ->with('success','Destination created successfully');
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
        $title = 'Restaurant';
        $restaurant = Resto::findOrFail($id);
        $provinces = DB::table('provinces')->get();
        $regencies = DB::table('regencies')->get();
        $categories = DB::table('resto_categories')->get();

        return view('admin.restaurants.update', compact('restaurant', 'provinces', 'regencies', 'categories', 'title'));
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
        $restaurant = Resto::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $restaurant->fill($input)->save();

        $request->session()->flash('flash_message', 'Restaurant successfully updated!');

        return redirect()->route('restaurant.index')
                        ->with('success','Restaurant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurants = Restaurant::find($id);
        $restaurants->delete();

        // redirect
        return redirect()->route('restaurant.index')
                        ->with('success','Restaurant deleted successfully');
    }
}
