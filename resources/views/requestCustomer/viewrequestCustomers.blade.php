@extends('layouts.app')

@section('title', 'Request Customer')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All Request Customers</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                List all request customers
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				@if(!empty($requestcustomers))

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Customer Name</th>
                      <th>Status</th>
                      <th>Time allocated</th>
                      <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($requestcustomers as $key=>$requestcustomer)
                            <tr class="odd gradeX">
                                <td>{{ $key + 1 }}</td>
                            <td>{{ $requestcustomer->first_name  }} {{$requestcustomer->last_name}}</td>
                                <td>{{ $requestcustomer->status }}</td>
                                <td class="center">{{ $requestcustomer->time_allocated }}</td>
                                <td class="center">{{ \Carbon\Carbon::parse($requestcustomer->created_at)->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No New Request Customer Found</strong>
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
