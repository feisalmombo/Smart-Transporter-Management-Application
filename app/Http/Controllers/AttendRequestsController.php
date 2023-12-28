<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AttendRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function attendedRequest()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('view_attendedRequest')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $attends = DB::SELECT("SELECT
            after_attends.id as afterattends_id,
            request_customers.status,
            request_customers.time_allocated,

            request_items.id as requestitems_id,
            request_items.goods_description,
            request_items.weight,
            request_items.number_of_packages,
            trucktypes.truck_name,
            request_customers.id as requestcustomers_id,
            request_items.origin_point,
            request_items.destination_point,
            containers.container_name,
            request_items.trip_duration,
            request_items.attachments_path,
            request_items.details_requests,


            after_attends.requestcustomer_id,
            after_attends.attend_description,

            adds_new_drivers.id as drivers_id,
            adds_new_drivers.first_name,
            adds_new_drivers.middle_name,
            adds_new_drivers.last_name,


            adds_new_vehicles.plate_horse_number,
            adds_new_vehicles.semi_trailer,
            after_attends.created_at
            FROM
            request_customers,
            request_items,
            users,
            after_attends,
            adds_new_drivers,
            adds_new_vehicles,
            trucktypes,
            containers
            WHERE
            request_items.requestcustomer_id = request_customers.id
            AND request_customers.customer_id = users.id
            AND after_attends.requestcustomer_id = request_items.id
            AND after_attends.driver_id = adds_new_drivers.id
            AND after_attends.vehicle_id = adds_new_vehicles.id
            AND  request_items.truck_id = trucktypes.id
            AND  request_items.container_id = containers.id
            AND after_attends.requestcustomer_id = request_customers.id
            AND NOT after_attends.attend_description <=> NULL
            AND request_customers.status = 'Attended'");

            //return $attends;

        return view('attended.attended_request')->with('attends', $attends);
    }
}
