@extends('layouts.app')

@section('title', 'Users')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All Users</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                List of system users
                <a href="{{ url('/view-users/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add User</a>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				@if(!empty($userData))

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Privilege</th>
                      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                      <th>Show</th>
                      @endif
                      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                      <th>Edit</th>
                      @endif
                      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                      <th>Delete</th>
                      @endif

                      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                      <th>Reset Password</th>
                      @endif
                      <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($userData as $key=>$userDatas)
                            <tr class="odd gradeX">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $userDatas->first_name }}</td>
                                <td class="center">{{ $userDatas->last_name }}</td>
                                <td class="center">{{ $userDatas->email }}</td>
                                <td class="center">{{ $userDatas->phone_number }}</td>
                                <td class="center">{{ $userDatas->slug  }}</td>
                                @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                                <td>
                                    <a class="btn btn-info" data-toggle="modal" href='#{{ $userDatas->id."show" }}'><i class="fa fa-bullseye" arial-hidden="true"></i></a>
                                    <div class="modal fade" id="{{ $userDatas->id."show" }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">User Details</h4>
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
                                                            {{ $userDatas->first_name }}
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
                                                                {{ $userDatas->middle_name }}
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
                                                            {{ $userDatas->last_name }}
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
                                                            {{ $userDatas->email }}
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
                                                                {{ $userDatas->phone_number }}
                                                            </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <hr/>

                                                  <div class="row">
                                                    <div class="col-sm-3">
                                                     <div class="center-block">
                                                        <div class="form-group">
                                                            <label>Privilege: </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                       <div class="center-block">
                                                        <div class="form-group">
                                                            {{ $userDatas->slug }}
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
                                @endif
                                @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                                <td>
                                    <a href="{{ url('/view-users/'.$userDatas->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                                </td>
                                @endif

                                @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                                <td>
                                    <a href='#{{ $userDatas->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                    <div class="modal fade" id="{{ $userDatas->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title"><strong>Delete</strong></h4>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete User? <h9 style="color: blue;">{{ $userDatas->first_name." ".$userDatas->last_name}}</h9>
                                                </div>
                                                <form action="/view-users/{{ $userDatas->id  }}" method="POST" role="form">

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

                                @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('director') || Auth::user()->hasRole('superadmin'))
                                <td><a href="/reset/{{$userDatas->id}}" >
                                    <span class="fa-passwd-reset fa-stack">
                                      <i class="fa fa-undo fa-stack-2x"></i>
                                      <i class="fa fa-lock fa-stack-1x"></i>
                                    </span></a>
                                </td>
                                @endif
                                <td>{{date("F jS, Y", strtotime($userDatas->created_at))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>

                  <div class="row">
                        <div class="pull-left col-lg-8">
                        <div class="col-lg-2">
                            <form action="{{url('/view-users/report/pdf/downloadPdf')}}" method="POST">
                                        {{ csrf_field() }}
                            <input type="text" hidden="hidden" value="<?php print base64_encode(serialize($userData)); ?>" name="tad">
                            <div class="col-lg-9">
                                <button class="btn btn-info" type="submit" name="submit">
                                    <span class="fa fa-file-pdf-o" aria-hidden="true"> Download PDF</span>
                                </button>
                            </div>
                            </form>
                        </div>
                        {{-- <div class="col-lg-1"></div>
                        <div class="col-lg-2">

                            <form action="{{url('/view-users/report/excel/downloadExcel')}}" method="POST">
                                        {{ csrf_field() }}
                            <input type="text" hidden="hidden" value="" name="tadas">
                            <div class="col-lg-9">
                                <button class="btn btn-success" type="submit" name="submit">
                                    <span class="fa fa-file-excel-o" aria-hidden="true"> Download Excel</span>
                                </button>
                            </div>
                            </form>
                        </div> --}}

                        {{-- <a href="{{ url('view-users/report/downloadData/xlsx') }}"><button class="btn btn-dark">Download Excel xlsx</button></a>
                        <a href="{{ url('downloadData/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                        <a href="{{ url('downloadData/csv') }}"><button class="btn btn-info">Download CSV</button></a> --}}
                        </div>
                    </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No user found</strong>
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
