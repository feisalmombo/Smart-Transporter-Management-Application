<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bodytype;
use DB;
use App\ActivityLog;

class BodytypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('view_bodytype')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $bodytypes = DB::table('bodytypes')
            ->select('id', 'body_type_name', 'created_at')
            ->get();
        //return $bodytypes;
        return view('bodytypes.viewbodytypes')->with('bodytypes', $bodytypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bodytypes.addBodytypes');
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
            if (\Auth::user()->can('create_bodytype')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'bodytype_name' => 'required',
        ]);

        $bodytypes = new Bodytype();
        $bodytypes->body_type_name = $request->bodytype_name;
        //return $bodytypes;
        $st = $bodytypes->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert BodyType data');
        } else {
            return redirect()->back()->with('message', 'BodyType is successfully added');
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
            if (\Auth::user()->can('edit_bodytype')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $bodytype = Bodytype::findOrFail($id);
        return view('bodytypes.editbodytypes')->with('bodytypes', $bodytype);
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
            if (\Auth::user()->can('update_bodytype')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'bodytype_name' => 'required',
        ]);

        $bodytype = Bodytype::findOrFail($id);
        $bodytype->body_type_name = $request->bodytype_name;
        //return $bodytype;
        $st = $bodytype->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update BodyType data');
        } else {
            return redirect()->back()->with('message', 'BodyType  is updated successfully added');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('delete_bodytype')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        $bodytype = Bodytype::findOrFail($id);
        //return $bodytype;
        $bodytype->delete();
        ActivityLog::where('changetype', 'Delete BodyType')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'BodyType is successfully deleted');
        return back();
    }
}
