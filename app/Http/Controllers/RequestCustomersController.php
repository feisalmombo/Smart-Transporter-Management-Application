<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Trucktype;
use App\Container;
use App\RequestCustomer;
use App\RequestItem;
use Auth;
use Validator;

class RequestCustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $requestcustomers = DB::table('request_customers')
        ->join('request_items', 'request_items.requestcustomer_id', '=', 'request_customers.id')
        ->join('users', 'request_customers.customer_id', '=', 'users.id')
        ->select(
            'request_customers.status',
            'users.first_name',
            'users.last_name',
            'request_customers.time_allocated',
            'request_customers.created_at',
            'request_items.goods_description'
        )->get();

        //return json_encode($requestcustomers);

        return view('requestCustomer.viewrequestCustomers')->with('requestcustomers', $requestcustomers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_request')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $userData  = DB::table('users')
            ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
            ->join('roles', 'users_roles.role_id', '=', 'roles.id')
            ->join('roles_permissions', 'roles.id', '=', 'roles_permissions.role_id')
            ->join('permissions', 'roles_permissions.permission_id', '=', 'permissions.id')
            ->where('permissions.slug', '=', 'create_feedback')
            ->select('users.id', 'users.first_name', 'users.last_name', 'users_roles.role_id')->get();
        //return $userData;

        $truckData  = Trucktype::all();
        //return $truckData;

        $containerData = Container::all();
        //return $containerData;


        return view('manageCustomerRequests.addcustomerrequest')->with('userDatas', $userData)->with('truckDatas', $truckData)->with('containerDatas', $containerData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return var_dump($request->all());
        //return json_encode($request->all());
        //echo $request['attachments_path'] . "<br>";

        // return var_dump($request->all());
        //foreach($_POST['requests'] as $key => $data){
        $data =  $request->all();
        //return $data;
        $key0 = -1;
        $i = 0;

        $requestcustomer = new RequestCustomer();
        $requestcustomer->customer_id = \Auth::user()->id;
        $requestcustomer->status = "Booked";
        //return $requestcustomer;
        $requestcustomer->save();

        //return $data['requests'][0];
        $i = 0;
        foreach ($data['requests'] as $key  => $data_once) {
            $requestitem = new RequestItem();
            $requestitem->goods_description = $data_once['goods_description'];
            $requestitem->weight = $data_once['weight'];
            $requestitem->number_of_packages = $data_once['number_of_packages'];
            $requestitem->truck_id = $data_once['truck_id'];
            $requestitem->origin_point = $data_once['origin_point'];
            $requestitem->destination_point = $data_once['destination_point'];
            $requestitem->container_id = $data_once['container_id'];
            $requestitem->trip_duration = $data_once['trip_duration'];
            $requestitem->attachments_path = $data_once['attachments_path']->store('Requestattachment', 'public');
            $requestitem->details_requests = $data_once['details_requests'];
            $requestitem->requestcustomer()->associate($requestcustomer);

            if ($requestitem->save()) {
                $i++;
            }
        }
        if ($i > 0) {
            return 'success';
        } else {
            return 'failed';
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
