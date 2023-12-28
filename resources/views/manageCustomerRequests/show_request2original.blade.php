
@extends('layouts.app')

@section('title', 'Attended Request')

@section('content')

<div class="col-lg-12">
	<h1 class="page-header">Attended Platform</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Attended in Detail
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="">
					<div class="">
                        <h4>Request Items</h4>

                        <div class="panel-body">
                            <div id="cive">
                                @if(count($feedbacks) > 0)

                                <table name="locationsTable"  class="table-responsive table-condensed table-striped " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Goods Description</th>
                                            <th>Weight</th>
                                            <th>Number of Packages</th>
                                            <th>Truck Type</th>
                                            <th>Origin Point</th>
                                            <th>Destination Point</th>
                                            <th>Container Type</th>
                                            <th>Trip duration</th>
                                            <th>Duration</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($feedbacks as $key=>$feedback)

                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $feedback->goods_description }}</td>
                                            <td>{{ $feedback->weight }}</td>
                                            <td>{{ $feedback->number_of_packages }}</td>
                                            <td>{{ $feedback->truck_name }}</td>
                                            <td>{{ $feedback->origin_point }}</td>
                                            <td>{{ $feedback->destination_point }}</td>
                                            <td>{{ $feedback->container_name }}</td>
                                            <td>{{ $feedback->trip_duration }}</td>
                                            {{-- <td>{{ $feedback->created_at }}</td> --}}
                                            <td>{{ \Carbon\Carbon::parse($feedback->created_at)->diffForHumans() }}</td>
                                            <td><a href="{{ Storage::url($feedback->attachments_path) }}" target="_blank" type="button" class="btn btn-danger"><i class="fa fa-download" arial-hidden="true"></i></a>
                                            </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                        @else
                        <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>No New Request Item Found</strong>
                        </div>
                        @endif
                 </div>
             </div>

        <!-- Attend Requests-->
 <div class="container-page" id="sol"  style="display:none;">
        <div class="col-sm-12">

            <form role="form"  action="{{ url('/notifications') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-lg-12 center-block">
                    <h4>Attend Request To a vehicle</h4>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h3 class="panel-title"><strong>Total = </strong> {{ count($vehicles) }}</h3>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-body">
                                    <div id="cive">
                                        @if(count($vehicles) > 0)

                                        <table name="locationsTable"  class="table-responsive table-condensed table-striped " cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th>Plate Number</th>
                                                    <th>Trail Number</th>
                                                    <th>Horse Number</th>
                                                    <th>Body Type</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach($vehicles as $key=>$vehicle)

                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $vehicle->first_name }}</td>
                                                    <td>{{ $vehicle->middle_name }}</td>
                                                    <td>{{ $vehicle->last_name }}</td>
                                                    <td>{{ $vehicle->plate_number }}</td>
                                                    <td>{{ $vehicle->trailer_number }}</td>
                                                    <td>{{ $vehicle->whorse_number }}</td>
                                                    <td>{{ $vehicle->body_type_name }}</td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>

                                @else
                                {{-- <h3 class="text-center">No New Information</h3> --}}
                                <div class="alert alert-info">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>No New Information found</strong>
                                </div>
                                @endif
                         </div>
                     </div>
                     <div class="panel-footer">
                        <strong>Total = </strong> {{ count($vehicles) }}
                    </div>
                    </div>
                    </div>
                    </div>



                    <!-- 1 -->
                    <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-9">
                            <input type="hidden" value="{{json_encode($vehicles)}}" id="allVehiclesId">
                            <select required="required" name="vehicleId" id="vehicleId">
                                <option value="">--Choose--</option>
                                @foreach($vehicles as $key=>$vehicle)
                                <option value="{{json_encode($vehicles[$key])}}">{{ $vehicle->plate_number }} {{ $vehicle->trailer_number }}</option>

                                @endforeach
                            </select>


                            <div class="col-md-3">
                            <div class="form-group" id="driverSelectId">
                            </div>
                            </div>

                            <div class="col-md-3">
                            <div class="form-group" id="TrailerSelectId">
                            </div>
                            </div>

                        </div>
                    </div>
                    </div>


                    <!-- This part used to choose another driver details for make attended -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" name="driverId" id="driverId">
                            <option value="">-- Choose Another Driver details if possible--</option>
                                @foreach($newdrivers as $newdriver)
                            <option value="{{ $newdriver->id }}">{{$newdriver->first_name." ".$newdriver->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- This part used to choose another driver details for make attended -->

                    <div class="form-group">
                        <textarea required="required" required="required" placeholder="eg: This request must be attended soon" class="form-control" rows="10" name="soln" id="article-ckeditor"></textarea>
                    </div>

                    <input type="hidden" required="required" name="solntaskId" value="{{ $feedback->id}}">
                    <div class="">
                            <div class=" col-lg-1">
                                <button type="submit" class="btn btn-primary center-block">
                                    Save
                                </button>
                            </div>
                    </div>

                </div>
            </form>
        </div>
</div>
    <!-- Attend Requests-->


    <div class="row text-center">
        <button type="button"id = "savebtn" onclick="hid()" class="btn btn-primary">Attend Request</button>
    </div>


					</div>
					{{-- @endforeach --}}

				</div>

				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-6 -->
	</div>
	<!-- /.col-lg-6 -->
</div>
</section>
@endsection
