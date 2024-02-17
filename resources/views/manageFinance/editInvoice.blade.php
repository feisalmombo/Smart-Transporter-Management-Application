@extends('layouts.app')

@section('title', 'Edit Invoice')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Edit Invoice</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit Invoice<a href="{{ url('/view/invoices') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid pull-left">
					<section class="container center-block">
						<div class="container-page">
							<div class="col-md-12">

								<form role="form"  action="{{ url('/view/invoices/'.$invoices->id) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

                                    <h2 style="text-align: center;">Invoice Details:</h2>
									<div class="col-md-4">

                                        <div class="form-group">
											<label>Truck Number: </label>
                                            <select class="form-control"  required="required" name="truck_id" id="truck_id">
                                                <option value="">-- Select Truck --</option>
                                                    @foreach($alltrucks as $alltruck)
                                                    <option value="{{ $alltruck->truck_number }}">{{ $alltruck->truck_number }}/{{ $alltruck->trailer_number }} with Tonnage {{ $alltruck->tonnage }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

										<div class="form-group">
											<label>Invoice number: </label>
											<input class="form-control" name="invoice_number" value="{{ isset($invoices->invoice_number) ? $invoices->invoice_number : old('invoice_number') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Advance Payment (USD): </label>
                                            <input class="form-control" name="advance_payment" value="{{ isset($invoices->advance_payment) ? $invoices->advance_payment : old('advance_payment') }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Loaded Date: </label>
                                                <input name="loaded_date" id="loaded_date" class="form-control" value="{{ isset($invoices->loaded_date) ? $invoices->loaded_date : old('loaded_date') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Customer: </label>
                                            <select class="form-control" name="user_id" id="user_id" required="required">
                                                <option value="">-- Select Customer --</option>
                                                    @foreach($customers as $customer)
                                                    <option value="{{ $customer->first_name }}">{{ $customer->first_name }} with Role name {{ $customer->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                                <div class="form-group">
                                                    <label>Price Per Tonnage (USD): </label>
                                                    <input type="number" class="form-control" name="price_per_tonnage" value="{{ isset($invoices->price_per_tonnage) ? $invoices->price_per_tonnage : old('price_per_tonnage') }}">
                                                </div>

                                                <div class="form-group">
                                                        <label>Status: </label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="">-- Select Status --</option>
                                                            <option value="loaded">Loaded</option>
                                                            <option value="not_loaded">Not Loaded</option>
                                                        </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Waiting Charges (Number of days): </label>
                                                    <input type="number" class="form-control" name="waiting_charges" value="{{ isset($invoices->waiting_charges) ? $invoices->waiting_charges : old('waiting_charges') }}">
                                                </div>

                                                <div class="form-group">
                                                    <label>Dispatch Date: </label>
                                                    <input name="dispatch_date" id="dispatch_date" class="form-control" value="{{ isset($invoices->dispatch_date) ? $invoices->dispatch_date : old('dispatch_date') }}">
                                                </div>

                                                <div class="form-group">
                                                    <label>Current Position: </label>
                                                    <input class="form-control" name="current_position" value="{{ isset($invoices->current_position) ? $invoices->current_position : old('current_position') }}">
                                                </div>

										<div class="form-group" style="padding-top:25px">
                                                <button type="submit" class="btn btn-primary center-block">
                                                    Update
                                                </button>
                                            </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
											<label>Tonnage</label>
											<input type="number" class="form-control" name="tonnage" value="{{ isset($invoices->tonnage) ? $invoices->tonnage : old('tonnage') }}">
                                        </div>

										<div class="form-group">
											<label>Commodity</label>
											<input class="form-control" name="commodity_description" value="{{ isset($invoices->commodity_description) ? $invoices->commodity_description : old('commodity_description') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Arrived Date: </label>
                                            <input class="form-control" name="arrived_date" value="{{ isset($invoices->arrived_date) ? $invoices->arrived_date : old('arrived_date') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Remarks: </label>
                                            <select class="form-control" name="remarks" id="remarks">
                                                <option value="">-- Select Remarks --</option>
                                                <option value="Waiting for docs at border">Waiting for docs at border</option>
                                                <option value="Loaded waiting for docs">Loaded waiting for docs</option>
                                                <option value="Not Loaded, waiting to load">Not Loaded, waiting to load</option>
                                                <option value="Going">Going</option>
                                                <option value="Breakdown">Breakdown</option>
                                                <option value="Accident">Accident</option>
                                                <option value="Waiting to load">Waiting to load</option>
                                                <option value="Offloaded">Offloaded</option>
                                                <option value="Delayed">Delayed</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Destination: </label>
                                            <input name="destination" id="destination" class="form-control" value="{{ isset($invoices->destination) ? $invoices->destination : old('destination') }}">
                                        </div>

                                    </div>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@endsection
