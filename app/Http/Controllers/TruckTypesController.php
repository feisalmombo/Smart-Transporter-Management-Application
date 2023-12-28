<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trucktype;
use DB;
use Auth;
use App\ActivityLog;

class TruckTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('view_trucktype')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $trucktypes = DB::table('trucktypes')
            ->select('id', 'truck_name', 'created_at')
            ->get();
        //return $trucktypes;
        return view('trucktypes.viewtrucktypes')->with('trucktypes', $trucktypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('trucktypes.addtrucktypes');
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
            if (\Auth::user()->can('create_trucktype')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'trucktype_name' => 'required',
        ]);

        $trucktypes = new Trucktype();
        $trucktypes->truck_name = $request->trucktype_name;
        //return $trucktypes;
        $st = $trucktypes->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert TruckType data');
        } else {
            return redirect()->back()->with('message', 'TruckType is successfully added');
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
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('edit_trucktype')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $trucktype = Trucktype::findOrFail($id);
        return view('trucktypes.edittrucktypes')->with('trucktypes', $trucktype);
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
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('update_trucktype')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'trucktype_name' => 'required',
        ]);

        $trucktype = Trucktype::findOrFail($id);
        $trucktype->truck_name = $request->trucktype_name;
        //return $trucktype;
        $st = $trucktype->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update TruckType data');
        } else {
            return redirect()->back()->with('message', 'TruckType  is updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('delete_trucktype')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        //return $uid;
        $trucktype = Trucktype::findOrFail($id);
        //return $trucktype;
        $trucktype->delete();
        ActivityLog::where('changetype', 'Delete TruckType')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'TruckType is successfully deleted');
        return back();
    }
}
