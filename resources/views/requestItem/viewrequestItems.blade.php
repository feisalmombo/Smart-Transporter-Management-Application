@extends('layouts.app')

@section('title', 'Request Item')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All request items</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                List all request item
                <?php if(Auth::user()->can('create_request')){?>
                    <a href="{{ url('/request-customer/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Request</a>
                <?php }?>

			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				@if(!empty($requestitems))

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Goods description</th>
                      <th>Weight</th>
                      <th>Packages</th>
                      <th>Truck Type</th>
                      <th>Origin</th>
                      <th>Destination</th>
                      <th>Container Name</th>
                      <th>Trip Duration</th>
                      <?php if(Auth::user()->can('download_requestItem')){?>
                      <th>Bill leading</th>
                      <?php }?>

                      <?php if(Auth::user()->can('show_requestItem')){?>
                      <th>Show</th>
                      <?php }?>


                    </tr>
                    </thead>
                    <tbody>
                            @foreach($requestitems as $key=>$requestitem)
                            <tr class="odd gradeX">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $requestitem->goods_description }}</td>
                                <td>{{ $requestitem->weight }}</td>
                                <td class="center">{{ $requestitem->number_of_packages }}</td>
                                <td class="center">{{ $requestitem->truck_name }}</td>
                                <td class="center">{{ $requestitem->origin_point }}</td>
                                <td class="center">{{ $requestitem->destination_point }}</td>
                                <td class="center">{{ $requestitem->container_name }}</td>
                                <td class="center">{{ $requestitem->trip_duration }}</td>
                                <?php if(Auth::user()->can('download_requestItem')){?>
                                <td class="center"> <a href="{{ Storage::url($requestitem->attachments_path) }}" target="_blank" type="button" class="btn btn-danger"><i class="fa fa-download" arial-hidden="true"></i></a></td>
                                <?php }?>
                                <?php if(Auth::user()->can('show_requestItem')){?>
                                <td>
                                        <a class="btn btn-info" data-toggle="modal" href='#{{ $requestitem->id."show" }}'><i class="fa fa-search-plus" arial-hidden="true"></i></a>
                                        <div class="modal fade" id="{{ $requestitem->id."show" }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h3 class="modal-title">Request Customer Details</h3>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="center-block">
                                                                    <div class="form-group">
                                                                        <label>Goods Description: </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="center-block">
                                                                    <div class="form-group">
                                                                        {{ $requestitem->goods_description }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>

                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="center-block">
                                                                    <div class="form-group">
                                                                        <label>Weight: </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="center-block">
                                                                    <div class="form-group">
                                                                        {{ $requestitem->weight }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>

                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="center-block">
                                                                    <div class="form-group">
                                                                        <label>Number of Package: </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="center-block">
                                                                    <div class="form-group">
                                                                        {{ $requestitem->number_of_packages }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>

                                                        <div class="row">
                                                                <div class="col-sm-3">
                                                                    <div class="center-block">
                                                                        <div class="form-group">
                                                                            <label>Truck Type: </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="center-block">
                                                                        <div class="form-group">
                                                                            {{ $requestitem->truck_name }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <hr/>

                                                        <div class="row">
                                                                <div class="col-sm-3">
                                                                    <div class="center-block">
                                                                        <div class="form-group">
                                                                            <label>Origin Point: </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="center-block">
                                                                        <div class="form-group">
                                                                            {{ $requestitem->origin_point }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <hr/>

                                                        <div class="row">
                                                                <div class="col-sm-3">
                                                                    <div class="center-block">
                                                                        <div class="form-group">
                                                                            <label>Destination Point: </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="center-block">
                                                                        <div class="form-group">
                                                                            {{ $requestitem->destination_point }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <hr/>



                                                        <div class="row">
                                                                <div class="col-sm-3">
                                                                    <div class="center-block">
                                                                        <div class="form-group">
                                                                            <label>Trip Duration: </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="center-block">
                                                                        <div class="form-group">
                                                                            {{ $requestitem->trip_duration }}
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

                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No New Request Customer found</strong>
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
