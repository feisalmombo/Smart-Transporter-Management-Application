<?php

namespace App\Http\Controllers;

use App\AddsNewDrivers;
use App\Gender;
use App\Status;
use DB;
use Illuminate\Http\Request;
use App\ActivityLog;

class NewdriversController extends Controller
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
            if (\Auth::user()->can('view_driver')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $driverData = DB::table('adds_new_drivers')
            ->join('genders', 'adds_new_drivers.gender_id', '=', 'genders.id')

            ->select('adds_new_drivers.id', 'adds_new_drivers.first_name', 'adds_new_drivers.middle_name', 'adds_new_drivers.last_name', 'adds_new_drivers.email', 'adds_new_drivers.phone_number', 'genders.gender_name', 'adds_new_drivers.address', 'adds_new_drivers.date_of_birth', 'adds_new_drivers.attachments_path', 'adds_new_drivers.created_at')
            ->get();

        //return $driverData;
        return view('manageTransporter.viewdriver')->with('driverDatas', $driverData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_driver')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $gender = DB::table('genders')
            ->select('id', 'gender_name')
            ->get();

        return view('manageTransporter.createdriver')->with('genders', $gender);
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
            if (\Auth::user()->can('create_driver')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'driveremail' => 'required',
            'pnumber' => 'required',
            'attachment_path' => 'required|mimes:doc,docx,pdf,txt|max:2048',
            'driveraddress' => 'required',
            'dob' => 'required',
            'gender' => 'required',
        ]);

        $gender =  Gender::where('gender_name', $request->gender)->first();



        $driver = new AddsNewDrivers();
        $driver->first_name = $request->fname;
        $driver->middle_name = $request->mname;
        $driver->last_name = $request->lname;
        $driver->email = $request->driveremail;
        $driver->phone_number = $request->pnumber;
        $driver->gender_id = $gender->id;
        $driver->attachments_path = $request->attachment_path->store('attachment', 'public');
        $driver->address = $request->driveraddress;
        $driver->date_of_birth = $request->dob;
        $st = $driver->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Driver data');
        } else {
            return redirect()->back()->with('message', 'Driver is successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newdriver  $newdriver
     * @return \Illuminate\Http\Response
     */
    public function show(Newdriver $newdriver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newdriver  $newdriver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('edit_driver')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $driver = AddsNewDrivers::findOrFail($id);

        //return $driver;

        return view('manageTransporter.editdriver')->with('drivers', $driver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newdriver  $newdriver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('update_driver')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'driveremail' => 'required',
            'pnumber' => 'required',
            'driveraddress' => 'required',
            'dob' => 'required',
        ]);

        $driver = AddsNewDrivers::findOrFail($id);

        //return $driver;
        $driver->first_name = $request->fname;
        $driver->middle_name = $request->mname;
        $driver->last_name = $request->lname;
        $driver->email = $request->driveremail;
        $driver->phone_number = $request->pnumber;
        $driver->address = $request->driveraddress;
        $driver->date_of_birth = $request->dob;

        //return $driver;
        $st = $driver->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update Driver data');
        } else {
            return redirect()->back()->with('message', 'Driver is updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newdriver  $newdriver
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
        $driver = AddsNewDrivers::findOrFail($id);
        $driver->delete();
        ActivityLog::where('changetype', 'Delete Driver')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'Driver is successfully deleted');
        return back();
    }
}
