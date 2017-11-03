<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Gallery;

// use \Input as Input;

class DestinationController extends Controller
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
        $destinations = DB::table('destinations')->get();
        $title = 'Destination';

        return view('admin.destinations.index', compact('destinations', 'title'));
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
        $destinationFacilities = DB::table('destination_facilities')->get();
        $destinationEquipments = DB::table('destination_equipments')->get();
        $destinationCategories = DB::table('destination_categories')->get();
        $destinationTypes = DB::table('destination_types')->get();
        $title = 'Destination';

        return view('admin.destinations.create', compact('provinces', 'regencies', 'destinationFacilities', 'destinationEquipments', 'destinationCategories', 'destinationTypes', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);
        // if(Input::hasFile('file')){

        //     echo 'Uploaded';
        //     $file = Input::file('file');
        //     $file->move('uploads', $file->getClientOriginalName());
        //     echo '';
        // }

        $category = ($request->category != null) ? implode(',', $request->category) : null;
        $type = ($request->type) ? implode(',', $request->type) :null;
        $activity = ($request->activity != null) ? implode(',', $request->activity) : null;
        $public_facility = ($request->public_facility != null) ? implode(',', $request->public_facility) : null;
        $facility = ($request->facility != null) ? implode(',', $request->facility) : null;
        $equipment = ($request->equipment != null) ? implode(',', $request->equipment) : null;

        $request->merge([
            'category' => $category,
            'type' => $type,
            'activity' => $activity,
            'public_facility' => $public_facility,
            'facility' => $facility,
            'equipment' => $equipment,
        ]);

        Destination::create($request->all());

        // $user = User::create([
        //     'first_name' => $data['first_name'],
        //     'last_name' => $data['last_name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);

        $request->session()->flash('flash_message', 'Destination successfully added!');
        
        return redirect()->route('destination.index')
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
        $title = 'Destination';
        $provinces = DB::table('provinces')->get();
        $regencies = DB::table('regencies')->get();
        $destinationFacilities = DB::table('destination_facilities')->get();
        $destinationEquipments = DB::table('destination_equipments')->get();
        $destinationCategories = DB::table('destination_categories')->get();
        $destinationTypes = DB::table('destination_types')->get();

        $destination = Destination::findOrFail($id);
        return view('admin.destinations.update', compact('provinces', 'regencies', 'destinationFacilities', 'destinationEquipments','destination', 'destinationCategories', 'destinationTypes', 'title'));
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
        $destination = Destination::findOrFail($id);

        $this->validate($request, [
            // 'title' => 'required',
            // 'description' => 'required'
        ]);

        $category = ($request->category != null) ? implode(',', $request->category) : null;
        $type = ($request->type) ? implode(',', $request->type) :null;
        $activity = ($request->activity != null) ? implode(',', $request->activity) : null;
        $public_facility = ($request->public_facility != null) ? implode(',', $request->public_facility) : null;
        $facility = ($request->facility != null) ? implode(',', $request->facility) : null;
        $equipment = ($request->equipment != null) ? implode(',', $request->equipment) : null;

        $request->merge([
            'category' => $category,
            'type' => $type,
            'activity' => $activity,
            'public_facility' => $public_facility,
            'facility' => $facility,
            'equipment' => $equipment,
        ]);

        $input = $request->all();

        $destination->fill($input)->save();

        $request->session()->flash('flash_message', 'Destination successfully added!');
        
        return redirect()->route('destination.index')
                        ->with('success','Destination created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destinations = Destination::find($id);
        $destinations->delete();

        // redirect
        return redirect()->route('destination.index')
                        ->with('success','Destination deleted successfully');
    }

    public function getRegencies(Request $request, $id_province)
    {
        $data = DB::table('regencies')
                        ->select('id', 'name')
                        ->where('province_id', $id_province)
                        ->get();
        return $data;
    }
}
