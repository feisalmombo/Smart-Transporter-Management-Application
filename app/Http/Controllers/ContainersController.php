<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;
use DB;
use App\ActivityLog;

class ContainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('view_containertype')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $containertypes = DB::table('containers')
            ->select('id', 'container_name', 'created_at')
            ->get();
        //return $containertypes;
        return view('containerTypes.viewcontainertypes')->with('containertypes', $containertypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('containerTypes.addContainerTypes');
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
            if (\Auth::user()->can('create_containertype')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'containertype_name' => 'required',
        ]);

        $containertypes = new Container();
        $containertypes->container_name = $request->containertype_name;
        //return $containertypes;
        $st = $containertypes->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert ContainerType data');
        } else {
            return redirect()->back()->with('message', 'ContainerType is successfully added');
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
            if (\Auth::user()->can('edit_containertype')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $containertype = Container::findOrFail($id);
        return view('containerTypes.editcontainertypes')->with('containertypes', $containertype);
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
            if (\Auth::user()->can('update_containertype')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'containertype_name' => 'required',
        ]);

        $containertype = Container::findOrFail($id);
        $containertype->container_name = $request->containertype_name;
        //return $containertype;
        $st = $containertype->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update ContainerType data');
        } else {
            return redirect()->back()->with('message', 'ContainerType  is updated successfully added');
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
            if (\Auth::user()->can('delete_containertype')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        $containertype = Container::findOrFail($id);
        $containertype->delete();
        ActivityLog::where('changetype', 'Delete Container')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'ContainerType is successfully deleted');
        return back();
    }
}
