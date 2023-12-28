<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use Auth;
use App\Detail;
use App\Solution;
use DB;
use App\AddsNewVehicles;
use App\AddsNewDrivers;

class FeedbackAttendRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->middleware(function($request,$next){
        //     if(\Auth::user()->can('view_feedback')){
        //         return $next($request);
        //     }
        //     return redirect()->back();
        // });
        $attendedfeedbacks = DB::table('tasks')
            ->join('details', 'tasks.detail_id', '=', 'details.id')
            ->select('tasks.id', 'details.goods_description', 'details.ticket_number', 'tasks.status', 'tasks.time_allocated')
            ->paginate(1);


        //dd($attendedfeedbacks);

        //return $attendedfeedbacks;
        return view('attendedfeedback.viewattendedfeedback')->with('attendedfeedbacks', $attendedfeedbacks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->middleware(function($request,$next){
        //     if(\Auth::user()->can('create_notification')){
        //         return $next($request);
        //     }
        //     return redirect()->back();
        // });

        $this->validate(request(), [
            'solntaskId' => 'required',
            'soln' => 'required',
            //'status' => 'required',
            'vehicleId' => 'required',
            'driverId' => 'required',
        ]);



        $st1 = Task::where('id', $request->solntaskId);
        //->update(['status' =>  $request->status]);
        //dd($st1);
        //return $st1;


        $solution = Solution::where('task_id', $request->solntaskId)->first();

        $addnewvehicle = AddsNewVehicles::where('id', $request->vehicleId)->first();

        $newdrivers = AddsNewDrivers::where('id', $request->driverId)->first();



        $soln = new Solution();
        $soln->task_id = $request->solntaskId;
        $soln->vehicle_id = $addnewvehicle->id;
        $soln->solutions = $request->soln;
        $soln->user_id = \Auth::user()->id;
        $soln->driver_id = $newdrivers->id;


        //return $soln;
        $st = $soln->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert data');
        } else {
            return redirect()->back()->with('message', 'Data is successfully added');
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
        // $this->middleware(function($request,$next){
        //     if(\Auth::user()->can('show_notification')){
        //         return $next($request);
        //     }
        //     return redirect()->back();
        // });
        $task = Task::where('detail_id', $id)->first();

        //return $task;
        if ($task) {
            if ($task->status = "Booked") {
                $task->status = "Pending";
                $task->status = "Attended";
                $task->save();
            }
        }
        //dd($task);
        //return $task;
        $feedbacks = Detail::where('details.id', '=', $id)
            ->join('tasks', 'tasks.detail_id', '=', 'details.id')
            ->select('details.id', 'tasks.status', 'details.goods_description', 'details.ticket_number')->get();
        //return $feedbacks;

        //$vehicles = AddsNewVehicles::all();
        //$vehicles = DB::table('adds_new_vehicles')->get();

        // $vehicles = DB::table('adds_new_vehicles')
        // ->join('bodytypes','adds_new_vehicles.bodytype_id','=','bodytypes.id')
        // ->join('adds_new_drivers','adds_new_vehicles.driver_id','=','adds_new_drivers.id')

        // ->select('adds_new_vehicles.id','adds_new_vehicles.plate_number','adds_new_vehicles.trailer_number','adds_new_vehicles.whorse_number','bodytypes.body_type_name','adds_new_drivers.first_name','adds_new_drivers.last_name','adds_new_vehicles.attachments_path','adds_new_vehicles.created_at')
        // ->get();


        //return $vehicles;

        $vehicles = DB::select(
            "SELECT
            adds_new_vehicles.id,
            adds_new_drivers.first_name,
            adds_new_drivers.middle_name,
            adds_new_drivers.last_name,
            adds_new_vehicles.plate_number,
            adds_new_vehicles.trailer_number,
            adds_new_vehicles.whorse_number,
            bodytypes.body_type_name,
            adds_new_vehicles.attachments_path,
            adds_new_vehicles.created_at
        FROM
            adds_new_drivers,
            adds_new_vehicles,
            driver_vehicles,
            bodytypes
        WHERE
        adds_new_drivers.id = driver_vehicles.adds_new_drivers_id AND adds_new_vehicles.id = driver_vehicles.adds_new_vehicles_id AND adds_new_vehicles.bodytype_id = bodytypes.id"
        );

        //return $feedbacks;
        //return $vehicles;

        $newdrivers = AddsNewDrivers::all();
        $vehicleSingle = AddsNewVehicles::all();
        //return $newdrivers;
        //return $vehicleSingle;




        return view('manageCustomerRequests.show_request')->with('feedbacks', $feedbacks)->with('vehicles', $vehicles)->with('newdrivers', $newdrivers)->with('vehicleSingle', $vehicleSingle);
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
