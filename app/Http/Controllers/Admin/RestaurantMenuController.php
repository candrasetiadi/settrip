<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\RestoMenu;

class RestaurantMenuController extends Controller
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
        $restaurantMenus = DB::table('resto_menus')
            ->leftJoin('restos', 'resto_menus.id_resto', '=', 'restos.id')
            ->leftJoin('provinces', 'restos.id_province', '=', 'provinces.id')
            ->leftJoin('regencies', 'restos.id_regencies', '=', 'regencies.id')
            ->select('resto_menus.*', 'restos.name as resto_name', 'provinces.name as province_name', 'regencies.name as regency_name')
            ->get();

        $title = 'Restaurant Menu';

        return view('admin.restaurantMenus.index', compact('restaurantMenus', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = [
                'food' => 'Food',
                'beverages' => 'Beverages',
                'packages' => 'Packages'
            ];

        $restaurants = DB::table('restos')->get();
        $title = 'Restaurant Menu';

        return view('admin.restaurantMenus.create', compact('restaurants', 'types', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $is_recommended = 1;
        $request->merge(['is_recommended' => $is_recommended]);
        RestoMenu::create($request->all());
        $request->session()->flash('flash_message', 'Restaurant Menu successfully added!');
        return redirect()->route('restaurantMenu.index')
                        ->with('success','Restaurant Menu created successfully');
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
        $title = 'Restaurant Menu';
        $restaurantMenu = RestoMenu::findOrFail($id);
        $restaurants = DB::table('restos')->get();
        $types = [
                'food' => 'Food',
                'beverages' => 'Beverages',
                'packages' => 'Packages'
            ];

        return view('admin.restaurantMenus.update', compact('restaurantMenu', 'restaurants', 'types', 'title'));
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
        $restaurantMenu = RestoMenu::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $input = $request->all();

        $restaurantMenu->fill($input)->save();

        $request->session()->flash('flash_message', 'Restaurant Menu successfully updated!');

        return redirect()->route('restaurantMenu.index')
                        ->with('success','Restaurant Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurantMenu = RestoCategory::find($id);
        $restaurantMenu->delete();

        // redirect
        return redirect()->route('restaurantMenu.index')
                        ->with('success','Restaurant Menu deleted successfully');
    }
}
