@extends('layouts.app')

@section('title', 'Trucks')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All Trucks</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                List of trucks

                <a href="{{ url('/view/trucks/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Truck</a>

			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">


				@if(!empty($truckDatas))

                <div class="box-body">
                <table id="example1" width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Truck Number</th>
                      <th>Trailer Number</th>
                      <th>Tonnage</th>
                      <th>Company Name</th>
                      <th>Driver Name</th>
                      <th>Driver Phone Number</th>
                      <th>Driver Licence Number</th>
                      <th>Driver Passport Number</th>
                      <th>Passport Attachment</th>
                      <th>Licence Attachment</th>
                      <th>Show</th>
                      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                      <th>Edit</th>
                      @endif

                      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                      <th>Delete</th>
                      @endif
                      <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($truckDatas as $key=>$truckData)
                            <tr class="odd gradeX">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $truckData->truck_number }}</td>
                                <td>{{ $truckData->trailer_number }}</td>
                                <td class="center">{{ $truckData->tonnage }}</td>
                                <td class="center">{{ $truckData->company_name }}</td>
                                <td class="center">{{ $truckData->driver_full_name }}</td>
                                <td class="center">{{ $truckData->driver_phone_number }}</td>
                                <td class="center">{{ $truckData->driver_licence_number }}</td>
                                <td class="center">{{ $truckData->driver_passport_number }}</td>
                                <td class="center">
                                    <a href="{{ Storage::url($truckData->passport_attachment) }}" target="_blank" type="button" class="btn btn-danger"><i class="fa fa-download" arial-hidden="true"></i></a>
                                </td>
                                <td class="center">
                                    <a href="{{ Storage::url($truckData->licence_attachment) }}" target="_blank" type="button" class="btn btn-danger"><i class="fa fa-download" arial-hidden="true"></i></a>
                                </td>

                                <td>
                                    <a class="btn btn-info" data-toggle="modal" href='#{{ $truckData->id."show" }}'><i class="fa fa-bullseye" arial-hidden="true"></i></a>
                                    <div class="modal fade" id="{{ $truckData->id."show" }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Truck Details</h4>
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
                                                            {{ $truckData->company_name }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr/>

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
                                                                {{ $truckData->truck_number }}
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
                                                            {{ $truckData->trailer_number }}
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
                                                            {{ $truckData->tonnage }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr/>

                                                  <div class="row">
                                                        <div class="col-sm-3">
                                                         <div class="center-block">
                                                            <div class="form-group">
                                                                <label>Driver Name: </label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                           <div class="center-block">
                                                            <div class="form-group">
                                                                {{ $truckData->driver_full_name }}
                                                            </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Password Attachment: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            <a href="{{ Storage::url($truckData->passport_attachment) }}" target="_blank" type="button" class="btn btn-danger"><i class="fa fa-download" arial-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr>


                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Licence Attachment: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            <a href="{{ Storage::url($truckData->licence_attachment) }}" target="_blank" type="button" class="btn btn-danger"><i class="fa fa-download" arial-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr>

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
                                    <a href="{{ url('/view/trucks/'.$truckData->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                                </td>
                                @endif

                                @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                                <td>
                                        <a href='#{{ $truckData->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                        <div class="modal fade" id="{{ $truckData->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete Company?<h9 style="color: blue;">{{ $truckData->company_name }}</h9>
                                                    </div>
                                                    <form action="/view/trucks/{{ $truckData->id  }}" method="POST" role="form">

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

                                <td>{{date("F jS, Y", strtotime($truckData->created_at))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No New Truck found</strong>
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
