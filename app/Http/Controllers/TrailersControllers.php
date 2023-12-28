<?php

namespace App\Http\Controllers;

use App\Bodytype;
use Illuminate\Http\Request;
use DB;
use App\Trailer;

class TrailersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('view_trailer')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $trailerData = DB::table('trailers')
        ->join('bodytypes', 'trailers.bodytype_id', '=', 'bodytypes.id')
        ->select(
        'trailers.id',
        'trailers.trailer_number',
        'bodytypes.id as bodytype_id',
        'bodytypes.body_type_name',
        'trailers.created_at')
        ->get();

        //return $trailerData;

        return view('trailer.viewtrailer')->with('trailers', $trailerData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_trailer')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $bodytype = DB::table('bodytypes')
            ->select('id', 'body_type_name')
            ->get();

        //return $bodytype;
        return view('trailer.addTrailer')->with('bodytypes', $bodytype);
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
            if (\Auth::user()->can('create_trailer')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->validate(request(), [
            'trailer_number' => 'required',
            'bodytype_id' => 'required',
        ]);

        $bodytype = Bodytype::where('id', $request->bodytype_id)->first();

        $trailer = new Trailer();
        $trailer->trailer_number = $request->trailer_number;
        $trailer->bodytype_id = $bodytype->id;

        //return $trailer;
        //dd($trailer);
        //return json_encode($trailer);
        $st = $trailer->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Trailer data');
        } else {
            return redirect()->back()->with('message', 'Trailer is successfully added');
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
            if (\Auth::user()->can('edit_trailer')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('edit_trailer')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $trailer = Trailer::findOrFail($id);

        return view('trailer.edittrailer')->with('trailers', $trailer);
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
            if (\Auth::user()->can('edit_trailer')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), []);


        $trailer = Trailer::findOrFail($id);
        $trailer->trailer_number = $request->trailer_number;;

        //return $trailer;
        $st = $trailer->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update Trailer data');
        } else {
            return redirect()->back()->with('message', 'Trailer  is updated successfully added');
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
            if (\Auth::user()->can('delete_trailer')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        $trailer = Trailer::findOrFail($id);
        $trailer->delete();
        ActivityLog::where('changetype', 'Delete Trailer')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'Trailer is successfully deleted');
        return back();
    }
}
