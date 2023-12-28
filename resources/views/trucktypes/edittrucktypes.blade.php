@extends('layouts.app')

@section('title', 'Update TruckType')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Update TruckType</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Update TruckType<a href="{{ url('/view-trucktypes') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/view-trucktypes/'.$trucktypes->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Update TruckType Information</h2>
										<div class="form-group">
											<label>Truck Type Name: </label>
                                            <input class="form-control" name="trucktype_name" value="{{ isset($trucktypes->truck_name) ? $trucktypes->truck_name : old('trucktype_name') }}">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Update TruckType
											</button>
                                        </div>

									</div>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@endsection
