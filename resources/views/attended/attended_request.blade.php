@extends('layouts.app')

@section('title', 'Attended Request')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All Attended Request</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                List of Attended request
                <a href="{{ url('/home') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>

			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				@if(!empty($attends))

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Good Description</th>
                      <th>Weight</th>
                      <th>Number of Package</th>
                      <th>Truck Types</th>
                      <th>Origin Point</th>
                      <th>Destination Point</th>
                      <th>Container Type</th>
                      <th>Attend Description</th>
                      <th>Driver Names</th>
                      <th>Plate/Horse Number</th>
                      <th>Status</th>

                      {{-- can('download_attendedRequests') --}}
                      <th>Download</th>

                      {{-- <th>Duration</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($attends as $key=>$attend)
                            <tr class="odd gradeX">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $attend->goods_description }}</td>
                                <td>{{ $attend->weight }}</td>
                                <td>{{ $attend->number_of_packages }}</td>
                                <td>{{ $attend->truck_name }}</td>
                                <td>{{ $attend->origin_point }}</td>
                                <td>{{ $attend->destination_point }}</td>
                                <td>{{ $attend->container_name }}</td>
                                <td class="center">{{ $attend->attend_description }}</td>
                                <td class="center">{{ $attend->first_name." ". $attend->last_name }}</td>
                                <td class="center">{{ $attend->plate_horse_number }}</td>
                                {{-- <td class="center">{{ $attend->semi_trailer }}</td> --}}
                                <td class="center">{{ $attend->status }}</td>

                                {{-- can('download_attendedRequests') --}}
                                <td><a href="{{ Storage::url($attend->attachments_path) }}" target="_blank" type="button" class="btn btn-danger"><i class="fa fa-download" arial-hidden="true"></i></a>
                                </td>


                                {{--  <td>{{ \Carbon\Carbon::parse($attend->created_at)->diffForHumans() }}</td>  --}}
                                {{-- <td>{{date("F jS, Y", strtotime($attend->created_at))}}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No New Attended Request found</strong>
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
