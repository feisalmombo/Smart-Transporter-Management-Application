<?php

namespace App\Http\Controllers;

use App\AddsNewVehicles;
use Illuminate\Http\Request;
use DB;
use App\Status;
use App\Bodytype;
use App\AddsNewDrivers;
use App\ActivityLog;
use App\Trailer;
use Auth;

class NewvehiclesController extends Controller
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
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('view_vehicle')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $vehicleData = DB::select(
            "SELECT
            adds_new_vehicles.id,
            adds_new_drivers.first_name,
            adds_new_drivers.middle_name,
            adds_new_drivers.last_name,
            adds_new_vehicles.plate_horse_number,
            adds_new_vehicles.semi_trailer,
            adds_new_vehicles.attachments_path,
            adds_new_vehicles.created_at
        FROM
            adds_new_drivers,
            adds_new_vehicles,
            driver_vehicles
        WHERE
        adds_new_drivers.id = driver_vehicles.adds_new_drivers_id AND adds_new_vehicles.id = driver_vehicles.adds_new_vehicles_id"
        );

        //return $vehicleData;

        return view('manageVehicle.viewvehicle')->with('vehicleDatas', $vehicleData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_vehicle')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $bodytype = DB::table('bodytypes')
            ->select('id', 'body_type_name')
            ->get();

        $driverInfo = DB::table('adds_new_drivers')
            ->select('id', 'first_name', 'last_name')
            ->get();

        $trailer = DB::table('trailers')
            ->select('id', 'trailer_number', 'bodytype_id')
            ->get();

        //return $trailer;

        //return $bodytype;
        //return $driverInfo;
        //return $status;
        return view('manageVehicle.createvehicle')
        ->with('bodytypes', $bodytype)
        ->with('drivers', $driverInfo)
        ->with('trailers', $trailer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_vehicle')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'plate_horse_number' => 'required',
            'driver' => 'required',
            'vehicle_attachment_path' => 'required|mimes:doc,docx,pdf,txt|max:2048',
            // 'trailer_number' => 'required',
            //'trailer_number' => 'required',
        ]);

        //$body =  Bodytype::where('body_type_name', $request->body)->first();
        //return $body;

        $driver =  AddsNewDrivers::where('id', $request->driver)->first();
        //return $driver;

        $trailer =  Trailer::where('id',$request->trailer_number)->first();
        //return $trailer;


        $vehicle = new AddsNewVehicles();
        $vehicle->plate_horse_number = $request->plate_horse_number;
        // $vehicle->whorse_number = $request->other_horsenumber;
        //$vehicle->driver_id = $driver->id;

        $vehicle->attachments_path = $request->vehicle_attachment_path->store('Vehicleattachments', 'public');
        $vehicle->semi_trailer = $request->other;

        //return $vehicle;
        //return json_encode($vehicle);
        $st = $vehicle->save();
        $vehicle->drivers()->attach($driver);
        if(isset($_POST['other'])) {
            $vehicle->trailers()->attach($trailer);
        }

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Vehicle data');
        } else {
            return redirect()->back()->with('message', 'Vehicle is successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AddsNewVehicles  $addsNewVehicles
     * @return \Illuminate\Http\Response
     */
    public function show(AddsNewVehicles $addsNewVehicles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AddsNewVehicles  $addsNewVehicles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('edit_vehicle')) {
                return $next($request);
            }
            return redirect()->back();
        });
        //$user = User::findOrFail($id);
        //$leve = Role::all();

        $vehicle = AddsNewVehicles::findOrFail($id);
        //$body = Bodytype::all();
        //$driver = AddsNewDrivers::all();
        //$status = Status::all();

        //return $vehicle;
        //return $body;
        //return $driver;
        //return $status;

        return view('manageVehicle.editvehicle')->with('vehicles', $vehicle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AddsNewVehicles  $addsNewVehicles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_vehicle')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), []);


        $vehicle = AddsNewVehicles::findOrFail($id);
        //return $vehicle;
        $vehicle->plate_horse_number = $request->plate_horse_number;

        
        $st = $vehicle->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update Vehicle data');
        } else {
            return redirect()->back()->with('message', 'Vehicle  is updated successfully added');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AddsNewVehicles  $addsNewVehicles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('delete_driver')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        $vehicle = AddsNewVehicles::findOrFail($id);
        $vehicle->delete();
        ActivityLog::where('changetype', 'Delete Vehicle')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'Vehicle is successfully deleted');
        return back();
    }
}
