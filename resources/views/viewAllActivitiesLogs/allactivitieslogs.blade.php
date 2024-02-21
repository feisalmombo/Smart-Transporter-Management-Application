@extends('layouts.app')

@section('title', 'All Activity Logs')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All Activity Logs</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                All Activity Logs
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">


				@if(!empty($allactivitiesLogsDatas))

                <div class="box-body">
                <table id="example1" width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>USER ID</th>
                      <th>DESCRIPTION</th>
                      <th>ID ISSUED</th>
                      <th>CHANGED DATE</th>
                      <th>DATE UPDATED AT</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($allactivitiesLogsDatas as $key=>$allactivitiesLogsData)
                            <tr class="odd gradeX">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $allactivitiesLogsData->user_id }}</td>
                                <td>{{ $allactivitiesLogsData->changetype }}</td>
                                <td class="center">{{ $allactivitiesLogsData->task_id }}</td>
                                <td class="center">{{ $allactivitiesLogsData->changeDate }}</td>
                                <td>{{date("F jS, Y", strtotime($allactivitiesLogsData->updated_at))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No Activities Logs found</strong>
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
