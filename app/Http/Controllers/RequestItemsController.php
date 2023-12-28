<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RequestItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestitems = DB::table('request_items')
            ->join('request_customers', 'request_items.requestcustomer_id', '=', 'request_customers.id')
            ->join('trucktypes', 'request_items.truck_id', '=', 'trucktypes.id')
            ->join('containers', 'request_items.container_id', '=', 'containers.id')
            ->join('users', 'request_customers.customer_id', '=', 'users.id')
            ->select(
            'request_customers.id as requestcustomer_id',
            'request_customers.status',
            'request_customers.time_allocated',
            'users.first_name',
            'users.middle_name',
            'users.last_name',
            'request_items.id',
            'request_items.goods_description',
            'request_items.weight',
            'request_items.number_of_packages',
            'trucktypes.truck_name',
            'containers.container_name',
            'request_items.origin_point',
            'request_items.destination_point',
            'request_items.trip_duration',
            'request_items.attachments_path',
            'request_items.details_requests',
            'request_customers.customer_id',
            'request_items.created_at')
            ->get();
            //return $requestitems;
        return view('requestItem.viewrequestItems')->with('requestitems', $requestitems);
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
}
