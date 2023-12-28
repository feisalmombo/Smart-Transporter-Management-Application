@extends('layouts.app')

@section('title', 'Add Vehicle')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add vehicle</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create vehicle<a href="{{ url('/view-vehicles') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid pull-left">
					<section class="container center-block">
						<div class="container-page">
							<div class="col-md-10">
								<form role="form"  action="{{ url('/view-vehicles') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h2 style="text-align: center;">Vehicle Information:</h2>
									<div class="col-md-4">
										<div class="form-group" id="platenumberdiv">
											<label>Plate/Horse Number: </label>
											<input class="form-control" name="plate_horse_number" id="plate_horse_number" required="required" placeholder="eg: T 345 BSD/ HRSN 298">
                                        </div>


                                        <div class="form-group" id="otherdiv" style="display:block;">
                                            <input type="checkbox" name="other" id="other" value="1" {{ old('other') ? 'checked="checked"' : '' }}><label> Semi-trailer</label>

                                            <div class="form-group" style="display:none;" id="trailernumberdiv">
                                                <label>Trailer Number: </label>
                                                <select class="form-control" data-name="trailer_number" name="trailer_number" id="trailer_number">
                                                    <option value="">-- Select trailer number --</option>
                                                    @foreach($trailers as $trailer)
                                                    <option value="{{ $trailer->id }}">{{ $trailer->trailer_number }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
									</div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Driver Name: </label>
                                            <select class="form-control"  required="required" name="driver" id="driver">
                                                <option value="">-- Select driver name --</option>
                                                @foreach($drivers as $driver)
                                                <option value="{{ $driver->id }}">{{ $driver->first_name }} {{ $driver->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group center">
                                            <button type="submit" class="btn btn-primary center-block">
                                                Register vehicle
                                            </button>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Attachment Vehicle regn cards: </label>
                                            <input type="file" name="vehicle_attachment_path" id="vehicle_attachment_path" class="form-control" required="required">
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
