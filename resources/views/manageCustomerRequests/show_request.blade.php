
@extends('layouts.app')

@section('title', 'Attended Request')

@section('content')

<div class="col-lg-12">
	<h1 class="page-header">Attended Platform</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
        {{-- @include('msgs.success') --}}

        <div id="alert-info"></div>

		<div class="panel panel-default">
			<div class="panel-heading">
				Attended in Detail
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="">
					<div class="">

                        <div class="panel-body">
                                    @if(count($feedbacks)>0)
                                    @foreach($feedbacks as $feedback)
                                    <!-- Tab panes -->
                                    <div class="">
                                        <div class="" id="incident">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h4>Customer Information:</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    {{-- <div class="row">
                                                                <span class="col-lg-2">Request : </span>
                                                                <span class="col-lg-10">{{ $feedback->first_name }}</span>
                                                    </div> --}}
                                                    <div class="row">
                                                        <span class="col-lg-2">First Name : </span>
                                                        <span class="col-lg-10">{{ $feedback->first_name }}</span>
                                                    </div>
                                                    <div class="row">
                                                        <span class="col-lg-2">Middle Name : </span>
                                                        <span class="col-lg-10">{{ $feedback->middle_name }}</span>
                                                    </div>
                                                    <div class="row">
                                                        <span class="col-lg-2">Last Name : </span>
                                                        <span class="col-lg-10">{{ $feedback->last_name}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="alert alert-info">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>No Customer found</strong>
                                    </div>
                                    @endif
                                    <!-- /.panel-body -->
                        </div>
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
<div class="container-page">
        <div class="col-sm-12">

       <!-- This is the part of form  -->
       <!-- This is the part of form  -->

    <input type="hidden" value="{{json_encode($vehicles)}}" id="allVehiclesId">
    <form role="form" id="add_vehicle" action=""  method="POST">
    <input type="hidden" value="{{$requestId}}" name="requestId">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <div id="repeater_vehicle">
                    <!-- Repeater Heading -->
                    <div class="repeater-heading">
                        {{-- <h5 class="pull-left">Repeater</h5> --}}
                        <button id = "vehicle_add_btn" class="btn btn-primary pt-5 pull-right repeater-add-btn">
                            Add
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <br>

                    <!-- Repeater Items -->
                    <div class="items" data-group="vehicles">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    <label data-name="repItemlabel"></label>
                                </div>
                                <div class="panel-body">
                                    <div class="container-fluid pull-left">
                                        <section class="container center-block">
                                            <div class="container-page">
                                                    <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <label>Choose Plate/Whose No: </label>
                                                                            <select class="form-control" required="required" name="vId" data-name="vehicleId" id="vehicleId">
                                                                                <option value="">--Choose--</option>
                                                                                @foreach($vehicles as $key=>$vehicle)
                                                                                    <option value="{{json_encode($vehicles[$key])}}">{{ $vehicle['plate_horse_number'] }}</option>
                                                                                @endforeach
                                                                            </select>

                                                                    </div>
                                                                    <div data-name = "driver_div" class="form-group selDiv" id  = "driverSelectId">
                                                                    </div>
                                                                    <div data-name = "trailer_div" class="form-group selDiv" id  = "TrailerSelectId">
                                                                        </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <div class="form-group">
                                                                            <label>Description: </label><br>
                                                                            <textarea class="form-control" required="required" name="attend_description" data-name="attend_description" id="attend_description"  rows="5" placeholder="Please Enter your attended description"></textarea>

                                                                    </div>
                                                            </div>


                                                    </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                        </div>

                        <!-- Repeater Remove Btn -->
                        <div class="pull-right repeater-remove-btn">
                            <button class="btn btn-danger remove-btn">
                                Remove
                            </button>
                        </div>
                        <!-- Repeater Remove Btn -->

                        <div class="clearfix"></div>
                        <br>
                     </div>

        </div>
    </form>

    <div class="form-group" style="padding-top:25px">
            <button type="submit" name="submitvehicle" id="submitvehicle" class="btn btn-primary center-block">
               Send
            </button>
    </div>

        </div>
</div>
<!-- Attend Requests-->


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
