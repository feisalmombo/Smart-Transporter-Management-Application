@extends('layouts.app')

@section('title', 'Add Trailer')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add Trailer</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Add Trailer<a href="{{ url('/view-trailers') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid pull-left">
					<section class="container center-block">
						<div class="container-page">
							<div class="col-md-10">
								<form role="form"  action="{{ url('/view-trailers') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Trailer Information</h2>
										<div class="form-group">
											<label>Trailer Number: </label>
											<input class="form-control" name="trailer_number" id="trailer_number" required="required"  placeholder="eg: TRN 390">
                                        </div>


                                        <div class="form-group">
											<label>Body type: </label>
											<select class="form-control"  required="required" name="bodytype_id" id="bodytype_id">
                                                <option value="">-- Select body type --</option>
                                                @foreach($bodytypes as $bodytype)
                                                <option value="{{ $bodytype->id }}">{{ $bodytype->body_type_name }}</option>
                                                @endforeach
                                            </select>
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
