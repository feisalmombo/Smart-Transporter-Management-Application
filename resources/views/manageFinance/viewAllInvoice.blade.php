@extends('layouts.app')

@section('title', 'All Invoices')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All Invoices</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
                <div class="panel-heading">
                        List of invoices
                    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('administrator'))
                        <a href="{{ url('/view/invoices/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Invoice</a>
                    @endif
                </div>
			<!-- /.panel-heading -->
			<div class="panel-body">


				@if(!empty($financeDatas))

                <div class="box-body">
                <table id="example1" width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Invoice Number</th>
                      <th>Truck Number</th>
                      <th>Trailer Number</th>
                      <th>Tonnage</th>
                      <th>Price per Tonnage</th>
                      <th>Commodity</th>
                      <th>Advance Payment</th>
                      <th>Balance Payment</th>
                      <th>Waiting Charges</th>
                      {{-- <th>Loading Place</th> --}}
                      <th>Current Location</th>
                      <th>Destination</th>
                      <th>Remarks</th>
                      <th>Show</th>
                      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                      <th>Edit</th>
                      @endif

                      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                      <th>Delete</th>
                      @endif
                      <th>Created At</th>
                      <th>Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($financeDatas as $key=>$financeData)
                            <tr class="odd gradeX">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $financeData->invoice_number }}</td>
                                <td>{{ $financeData->truck_number }}</td>
                                <td class="center">{{ $financeData->trailer_number }}</td>
                                <td class="center">{{ $financeData->tonnage }}</td>
                                <td class="center">{{ $financeData->price_per_tonnage }}</td>
                                <td class="center">{{ $financeData->commodity_description }}</td>
                                <td class="center">{{ $financeData->advance_payment }}</td>
                                <td class="center">{{ $financeData->balance_payment }}</td>
                                <td class="center">{{ $financeData->waiting_charges }}</td>
                                {{-- <td class="center">{{ $financeData->loading_place }}</td> --}}
                                <td class="center">{{ $financeData->current_position }}</td>
                                <td class="center">{{ $financeData->destination }}</td>
                                <td class="center">{{ $financeData->remarks }}</td>

                                <td>
                                    <a class="btn btn-info" data-toggle="modal" href='#{{ $financeData->id."show" }}'><i class="fa fa-bullseye" arial-hidden="true"></i></a>
                                    <div class="modal fade" id="{{ $financeData->id."show" }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Invoice Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Invoice Number: </label>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->invoice_number }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Customer Name: </label>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->first_name ." ". $financeData->last_name}}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr>

                                                  <div class="row">
                                                        <div class="col-sm-3">
                                                         <div class="center-block">
                                                            <div class="form-group">
                                                                <label>Truck Number: </label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                           <div class="center-block">
                                                            <div class="form-group">
                                                                {{ $financeData->truck_number }}
                                                            </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Trailer Number: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->trailer_number }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Tonnage: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->tonnage }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr/>

                                                  <div class="row">
                                                        <div class="col-sm-3">
                                                         <div class="center-block">
                                                            <div class="form-group">
                                                                <label>Commodity Description: </label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                           <div class="center-block">
                                                            <div class="form-group">
                                                                {{ $financeData->commodity_description }}
                                                            </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Price Per Tonnage: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->price_per_tonnage }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Balance Payment: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->balance_payment }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Current Position: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->current_position }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Destination: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->destination }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>

                                                  </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                                <td>
                                    <a href="{{ url('/view/invoices/'.$financeData->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                                </td>
                                @endif

                                @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                                <td>
                                        <a href='#{{ $financeData->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                        <div class="modal fade" id="{{ $financeData->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete Invoice Number?<h9 style="color: blue;"> {{ $financeData->invoice_number." with Truck Number: ".$financeData->truck_number }}</h9>
                                                    </div>
                                                    <form action="/view/companies/{{ $financeData->id  }}" method="POST" role="form">

                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>

                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                @endif

                                <td>{{date("F jS, Y", strtotime($financeData->created_at))}}</td>
                                <td>{{date("F jS, Y", strtotime($financeData->updated_at))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No All Invoice found</strong>
				</div>
				@endif
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>

</section>
<!-- /.row -->

@endsection
