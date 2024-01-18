@extends('layouts.app')

@section('title', 'Add Invoice')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add Invoice</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create Invoice<a href="{{ url('/view/invoices') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid pull-left">
					<section class="container center-block">
						<div class="container-page">
							<div class="col-md-12">

								<form role="form"  action="{{ url('/view/invoices') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h2 style="text-align: center;">Invoice Details:</h2>
									<div class="col-md-4">

                                        <div class="form-group">
											<label>Truck Number: </label>
                                            <select class="form-control"  required="required" name="truck_id" id="truck_id">
                                                <option value="">-- Select Truck --</option>
                                                    @foreach($trucks as $truck)
                                                    <option value="{{ $truck->truck_number }}">{{ $truck->truck_number }}/{{ $truck->trailer_number }} with Tonnage {{ $truck->tonnage }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

										<div class="form-group">
											<label>Invoice number: </label>
											<input class="form-control" name="invoice_number" required="required"  placeholder="eg: MS/209EX">
                                        </div>

                                        <div class="form-group">
                                            <label>Advance Payment (USD): </label>
                                            <input class="form-control" name="advance_payment" type="number" placeholder="eg: 8000">
                                        </div>


                                        <div class="form-group">
                                            <label>Loading Place: </label>
                                            <input name="loading_place" class="form-control" placeholder="eg: ETC Mbagala">
                                        </div>

                                        <div class="form-group">
                                                <label>Loaded Date: </label>
                                                <input type="date" name="loaded_date" id="loaded_date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                            <div class="form-group">
                                                <label>Price Per Tonnage (USD): </label>
                                                <input type="number" class="form-control" name="price_per_tonnage" placeholder="eg: 250">
                                            </div>

                                                {{-- <div class="form-group">
                                                    <label>Balance Payment (USD): </label>
                                                    <input type="number" class="form-control" name="balance_payment" placeholder="eg: 7890">
                                                </div> --}}

                                                <div class="form-group">
                                                        <label>Status: </label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="">-- Select Status --</option>
                                                            <option value="loaded">Loaded</option>
                                                            <option value="not_loaded">Not Loaded</option>
                                                        </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Dispatch Date: </label>
                                                    <input type="date" name="dispatch_date" id="dispatch_date" class="form-control">
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
                                                    <label>Current Position: </label>
                                                    <input class="form-control" name="current_position" placeholder="eg: Serenje">
                                                </div>

										<div class="form-group" style="padding-top:25px">
                                                <button type="submit" class="btn btn-primary center-block">
                                                    Save
                                                </button>
                                            </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
											<label>Tonnage</label>
											<input type="number" class="form-control" name="tonnage" placeholder="eg: 27" required="required">
                                        </div>

										<div class="form-group">
											<label>Commodity</label>
											<input class="form-control" name="commodity_description" placeholder="eg: Copper Cathodes">
                                        </div>

                                        <div class="form-group">
                                            <label>Waiting Charges (Number of days): </label>
                                            <input type="number" class="form-control" name="waiting_charges" placeholder="eg: 5">
                                        </div>

                                        <div class="form-group">
                                            <label>Arrived Date: </label>
                                            <input type="date" class="form-control" name="arrived_date">
                                        </div>

                                        <div class="form-group">
                                            <label>Destination: </label>
                                            <input name="destination" id="destination" class="form-control" placeholder="eg: DRC">
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
