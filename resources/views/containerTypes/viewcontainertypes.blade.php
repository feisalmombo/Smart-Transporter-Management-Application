@extends('layouts.app')

@section('title', 'Containertypes')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All Containertypes</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                List of Containertypes
                <?php if(Auth::user()->can('create_containertype')){?>
                <a href="{{ url('/view-containertypes/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Containertypes</a>
                <?php }?>

			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				@if(!empty($containertypes))

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Container Name</th>
                      <?php if(Auth::user()->can('edit_containertype')){?>
                      <th>Edit</th>
                      <?php }?>


                      <?php if(Auth::user()->can('delete_containertype')){?>
                      <th>Delete</th>
                      <?php }?>

                      <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($containertypes as $key=>$containertype)
                            <tr class="odd gradeX">
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $containertype->container_name}}</td>

                                    <?php if(Auth::user()->can('edit_containertype')){?>
                                    <td>  <a href="{{ url('/view-containertypes/'.$containertype->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a></td>
                                    <?php }?>

                                    <?php if(Auth::user()->can('delete_containertype')){?>
                                    <td>
                                        <a href='#{{ $containertype->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                        <div class="modal fade" id="{{ $containertype->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete ContainerType? <h9 style="color: blue;">{{ $containertype->container_name }}</h9>
                                                    </div>
                                                    <form action="/view-containertypes/{{ $containertype->id  }}" method="POST" role="form">

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

                                    {{--  <td>{{ \Carbon\Carbon::parse($containertype->created_at)->diffForHumans() }}</td>  --}}
                                    <td>{{date("F jS, Y", strtotime($containertype->created_at))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No New ContainerTypes found</strong>
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
