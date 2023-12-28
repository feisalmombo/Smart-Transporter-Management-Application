@extends('layouts.app')

@section('title', 'Edit Trailer')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Edit Trailer</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				View Trailer<a href="{{ url('/view-trailers') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/view-trailers/'.$trailers->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Trailer Information</h2>
										<div class="form-group">
											<label>Trailer Number: </label>
											<input class="form-control" name="trailer_number" value="{{ isset($trailers->trailer_number) ? $trailers->trailer_number : old('trailers') }}">
                                        </div>


										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Update Trailer
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
