@extends('layouts.app')

@section('title', 'Drivers')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All Drivers</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                List of drivers
                <?php if(Auth::user()->can('create_driver')){?>
                <a href="{{ url('/view-drivers/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Driver</a>
                <?php }?>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				@if(!empty($driverDatas))

                <div class="box-body">
                <table id="example1" width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <?php if(Auth::user()->can('show_driver')){?>
                        <th>Show</th>
                        <?php }?>

                        <?php if(Auth::user()->can('edit_driver')){?>
                        <th>Edit</th>
                        <?php }?>

                        <?php if(Auth::user()->can('delete_driver')){?>
                        <th>Delete</th>
                        <?php }?>

                        <?php if(Auth::user()->can('download_driver')){?>
                      <th>Licence</th>
                      <?php }?>
                      <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($driverDatas as $key=>$driverData)
                            <tr class="odd gradeX">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $driverData->first_name }}</td>
                                <td>{{ $driverData->middle_name }}</td>
                                <td class="center">{{ $driverData->last_name }}</td>
                                <td class="center">{{ $driverData->email }}</td>
                                <td class="center">{{ $driverData->phone_number }}</td>
                                <td class="center">{{ $driverData->gender_name  }}</td>
                                <td class="center">{{ $driverData->address  }}</td>
                                <?php if(Auth::user()->can('show_driver')){?>
                                <td>
                                    <a class="btn btn-info" data-toggle="modal" href='#{{ $driverData->id."show" }}'><i class="fa fa-bullseye" arial-hidden="true"></i></a>
                                    <div class="modal fade" id="{{ $driverData->id."show" }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Driver Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>First Name: </label>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $driverData->first_name }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr/>

                                                  <div class="row">
                                                        <div class="col-sm-3">
                                                         <div class="center-block">
                                                            <div class="form-group">
                                                                <label>Middle Name: </label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                           <div class="center-block">
                                                            <div class="form-group">
                                                                {{ $driverData->middle_name }}
                                                            </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Last Name: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $driverData->last_name }}
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
                                                            {{ $driverData->email }}
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
                                                                {{ $driverData->phone_number }}
                                                            </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Gender: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $driverData->gender_name }}
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
                                                            {{ $driverData->address }}
                                                        </div>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <hr>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Date of birth: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $driverData->date_of_birth }}
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
                                <?php }?>

                        <?php if(Auth::user()->can('edit_driver')){?>
                                <td>
                                        <a href="{{ url('/view-drivers/'.$driverData->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                                </td>
                                <?php }?>

                                <?php if(Auth::user()->can('delete_driver')){?>
                                <td>
                                        <a href='#{{ $driverData->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                        <div class="modal fade" id="{{ $driverData->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete Driver?<h9 style="color: blue;">{{ $driverData->first_name." ".$driverData->last_name }}</h9>
                                                    </div>
                                                    <form action="/view-drivers/{{ $driverData->id  }}" method="POST" role="form">

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
                                <?php }?>
                                <td>
                                   {{-- <a href="{{ Storage::url($driverData->attachments_path) }}">View pdf</a> --}}
                                <?php if(Auth::user()->can('download_driver')){?>
                                   <a href="{{ Storage::url($driverData->attachments_path) }}" target="_blank" type="button" class="btn btn-danger"><i class="fa fa-download" arial-hidden="true"></i></a>
                                </td>
                                <?php }?>
                                <td>{{date("F jS, Y", strtotime($driverData->created_at))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No New Driver found</strong>
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
