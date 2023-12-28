@extends('layouts.app')

@section('title', 'Add ContainerTypes')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add ContainerTypes</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create ContainerTypes<a href="{{ url('/view-containertypes') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid pull-left">
					<section class="container center-block">
						<div class="container-page">
							<div class="col-md-10">
								<form role="form"  action="{{ url('/view-containertypes') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="col-lg-12 center-block">
										<h2 style="text-align: center;">ContainerTypes Information</h2>
										<div class="form-group">
											<label>Container Name: </label>
											<input class="form-control" name="containertype_name" id="containertype_name" required="required"  placeholder="eg: 20 Fit Container">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Add
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
