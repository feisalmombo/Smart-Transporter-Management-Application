@extends('layouts.app')

@section('title', 'Update ContainerType')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Update ContainerType</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Update ContainerType<a href="{{ url('/view-containertypes') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/view-containertypes/'.$containertypes->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Update containerType Information</h2>
										<div class="form-group">
											<label>Container Type Name: </label>
                                            <input class="form-control" name="containertype_name" value="{{ isset($containertypes->container_name) ? $containertypes->container_name : old('containertype_name') }}">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Update ContainerType
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
