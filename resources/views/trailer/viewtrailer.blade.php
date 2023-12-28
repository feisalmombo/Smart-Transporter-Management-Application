@extends('layouts.app')

@section('title', 'Trailers')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All Trailers</h1>
</div>
<section class="content">
<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
                List of Trailers
                <?php if(Auth::user()->can('create_trailer')){?>
                <a href="{{ url('/view-trailers/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Trailer</a>
                <?php }?>


			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				@if(!empty($trailers))

                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Trailer Number</th>
                      <th>Bodytype Name</th>

                      <?php if(Auth::user()->can('edit_trailer')){?>
                      <th>Edit</th>
                      <?php }?>

                      <?php if(Auth::user()->can('delete_trailer')){?>
                      <th>Delete</th>
                      <?php }?>

                      <?php if(Auth::user()->can('show_trailer')){?>
                      <th>Show</th>
                      <?php }?>

                      <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($trailers as $key=>$trailer)
                            <tr class="odd gradeX">
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $trailer->trailer_number}}</td>
                                    <td>{{ $trailer->body_type_name}}</td>

                                    <?php if(Auth::user()->can('edit_trailer')){?>
                                    <td>
                                        <a href="{{ url('/view-trailers/'.$trailer->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                                    </td>
                                    <?php }?>

                                    <?php if(Auth::user()->can('delete_trailer')){?>
                                    <td>
                                        <a href='#{{ $trailer->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                                        <div class="modal fade" id="{{ $trailer->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to Trailer Number? <h9 style="color: blue;">{{ $trailer->trailer_number }}</h9>
                                                    </div>
                                                    <form action="/view-vehicles/{{ $trailer->id  }}" method="POST" role="form">

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

                                    <?php if(Auth::user()->can('edit_trailer')){?>
                                    <td>
                                        <a class="btn btn-info" data-toggle="modal" href='#{{ $trailer->id."show" }}'><i class="fa fa-bullseye" arial-hidden="true"></i></a>
                                        <div class="modal fade" id="{{ $trailer->id."show" }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Trailer Details</h4>
                                                    </div>
                                                    <div class="modal-body">
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
                                                                {{ $trailer->trailer_number }}
                                                            </div>
                                                        </div>
                                                        </div>
                                                      </div>
                                                      <hr/>

                                                      <div class="row">
                                                        <div class="col-sm-3">
                                                         <div class="center-block">
                                                            <div class="form-group">
                                                                <label>Body Types: </label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                           <div class="center-block">
                                                            <div class="form-group">
                                                                {{ $trailer->body_type_name }}
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

                                    {{--  <td class="center">{{ \Carbon\Carbon::parse($trailer->created_at)->diffForHumans() }}</td>  --}}
                                    <td class="center">{{date("F jS, Y", strtotime($trailer->created_at))}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No New Trailer found</strong>
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
