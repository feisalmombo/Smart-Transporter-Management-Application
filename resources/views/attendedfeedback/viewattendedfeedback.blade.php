@extends('layouts.app')

@section('title', 'All Attended Request')

@section('content')


<div class="col-lg-12">
	<h3>All Attended Request</h3>
	<hr/>
</div>

<div class="row">

    <section class="content">
	<div class="col-lg-12">

		@include('msgs.success')
		<div class="panel panel-default">
			<!-- /.panel-heading -->
			<div class="panel-body">

				{{ $attendedfeedbacks }}
				@if(count($attendedfeedbacks)>0)
				@foreach($attendedfeedbacks as $attendedfeedback)
				<!-- Tab panes -->
				<div class="">
					<div class="" id="incident">
						<div class="row">
							<div class="col-lg-12">
								<h4>Goods Description</h4>
								<p>{{ $attendedfeedback->goods_description }}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<span class="col-lg-2">Ticket Number : </span>
									<span class="col-lg-10">{{ $attendedfeedback->ticket_number }}</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class=" pull-right col-lg-4">
								<h2 class="col-lg-4">Status: </h2>
								<h2 class="col-lg-8"><i><strong>{{ $attendedfeedback->status }}</strong></i></h2>
							</div>
                        </div>

                        <!-- Start This is the part to make the Assignment of driver to vehicle -->

                        <!-- Start This is the part to make the Assignment of driver to vehicle -->

					</div>
					@endforeach
					<div class="pull-right col-lg-4">
						{{ $attendedfeedbacks}}
					</div>
				</div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No Assigned Attended found </strong>
				</div>
				@endif
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-6 -->
    </div>
    </section>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->

<!-- /.row -->
@endsection
