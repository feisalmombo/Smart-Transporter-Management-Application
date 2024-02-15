<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Truck;
use App\Company;
use DB;
use Auth;

class TrucksController extends Controller
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
            if (\Auth::user()->can('view_truck')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $users = Auth::user()->id;

        $truckData = DB::table('trucks')
            ->join('companies', 'trucks.company_id', '=', 'companies.id')
            ->join('users', 'trucks.user_id', '=', 'users.id')

            ->select('trucks.id', 'trucks.truck_number', 'trucks.trailer_number', 'trucks.dengla_number', 'trucks.tonnage', 'trucks.container_number', 'trucks.driver_full_name', 'trucks.driver_phone_number', 'trucks.driver_licence_number', 'trucks.driver_passport_number', 'trucks.passport_attachment', 'trucks.licence_attachment',
            'users.first_name', 'users.middle_name', 'users.last_name', 'users.email', 'companies.company_name', 'trucks.created_at')
            ->where('companies.user_id', '=', $users)->get();

        // return json_encode($truckData);

        return view('manageTruck.viewTruck')->with('truckDatas', $truckData);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_truck')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $singleTransporter = Auth::user()->id;

        $company = DB::table('companies')
            ->select('id', 'company_name')
            ->where('companies.user_id', '=', $singleTransporter)
            ->get();

        // return json_encode($company);

        return view('manageTruck.createTruck')->with('companies', $company);
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
            'truck_number' => 'required|string|max:255',
            'trailer_number' => 'required|string|max:255',
            'tonnage' => 'required',
            'driver_full_name' => 'required|string|max:255',
            'driver_phone_number' => 'required|numeric|digits:10',
            'driver_licence_number' => 'required|numeric|digits:10',
            'driver_passport_number' => 'required|string|digits:9',
            'passport_attachment' => 'required|mimes:jpeg,png,jpg,gif,svg,doc,docx,pdf,txt|max:2048',
            'licence_attachment' => 'required|mimes:jpeg,png,jpg,gif,svg,doc,docx,pdf,txt|max:2048',
        ]);

        $company =  Company::where('company_name', $request->company_id)->first();

        // return json_encode($company);


        $truck = new Truck();
        $truck->truck_number = $request->truck_number;
        $truck->trailer_number = $request->trailer_number;
        $truck->dengla_number = $request->dengla_number;
        $truck->tonnage = $request->tonnage;
        $truck->container_number = $request->container_number;
        $truck->driver_full_name = $request->driver_full_name;
        $truck->driver_phone_number = $request->driver_phone_number;
        $truck->driver_licence_number = $request->driver_licence_number;
        $truck->driver_passport_number = $request->driver_passport_number;
        $truck->passport_attachment = $request->passport_attachment->store('Passportattachments', 'public');
        $truck->licence_attachment = $request->licence_attachment->store('Licenseattachments', 'public');
        $truck->user_id = Auth::user()->id;
        $truck->company_id = $company->id;
        $st = $truck->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Truck data');
        } else {
            return redirect()->back()->with('message', 'Truck is successfully added');
        }
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
        //
    }
}
