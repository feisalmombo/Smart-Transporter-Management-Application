@extends('layouts.app')

@section('title', 'Invoices')

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
                      <th>Loading Place</th>
                      <th>Current Location</th>
                      <th>Destination</th>
                      <th>Remarks</th>
                      {{-- <th>Show</th>
                      <th>Edit</th>
                      <th>Delete</th> --}}
                      <th>Duration</th>
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
                                <td class="center">{{ $financeData->loading_place }}</td>
                                <td class="center">{{ $financeData->current_position }}</td>
                                <td class="center">{{ $financeData->destination }}</td>
                                <td class="center">{{ $financeData->remarks }}</td>
                                
                                {{-- <td>
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
                                                            <label>Company Name: </label>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->company_name }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr/>

                                                  <div class="row">
                                                        <div class="col-sm-3">
                                                         <div class="center-block">
                                                            <div class="form-group">
                                                                <label>TIN: </label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                           <div class="center-block">
                                                            <div class="form-group">
                                                                {{ $financeData->tin }}
                                                            </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>VRN: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->vrn }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Phone Number: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->phone_number }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr/>

                                                  <div class="row">
                                                        <div class="col-sm-3">
                                                         <div class="center-block">
                                                            <div class="form-group">
                                                                <label>Email: </label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                           <div class="center-block">
                                                            <div class="form-group">
                                                                {{ $financeData->email }}
                                                            </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Website Link: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->website_link }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr>


                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Company logo: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            <a href="{{ Storage::url($financeData->company_logo) }}" target="_blank" type="button" class="btn btn-danger"><i class="fa fa-download" arial-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Address: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $financeData->address }}
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
                                </td> --}}

                                {{-- <td>
                                        <a href="{{ url('/view/invoice/'.$financeData->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                                </td> --}}

                                {{-- <td>
                                        <a href='#{{ $financeData->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                        <div class="modal fade" id="{{ $financeData->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete Invoice?<h9 style="color: blue;">{{ $financeData->company_name." ".$financeData->tin }}</h9>
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
                                </td> --}}

                                <td>{{date("F jS, Y", strtotime($financeData->created_at))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No New Invoice found</strong>
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
