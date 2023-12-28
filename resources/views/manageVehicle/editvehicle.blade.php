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
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/view-vehicles/'.$vehicles->id) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Vehicle Information</h2>
										<div class="form-group">
											<label>Plate/Horse Number: </label>
											<input class="form-control" name="plate_horse_number" value="{{ isset($vehicles->plate_horse_number) ? $vehicles->plate_horse_number : old('plate_horse_number') }}">
                                        </div>

                                        {{-- <div class="form-group">
                                                <label>Semi Trailer: </label>
                                                <input class="form-control" name="semi_trailer" value="{{ isset($vehicles->semi_trailer) ? $vehicles->semi_trailer : old('semi_trailer') }}">
                                        </div> --}}



                                        {{-- <div class="form-group">
                                                    <label>Body Type: </label>
                                                    <select class="form-control"  required="required" name="body" id="body">
                                                    <option value="">-- Select body types --</option>
                                                        @foreach($bodytypes as $bodytype)
                                                        <option value="{{ $bodytype->body_type_name }}">{{ $bodytype->body_type_name }}</option>
                                                        @endforeach
                                                    </select>
                                        </div> --}}



                                        {{-- <div class="form-group">
                                                <label>Driver Name: </label>
                                                <select class="form-control"  required="required" name="driver" id="driver">
                                                    <option value="">-- Select driver name --</option>
                                                    @foreach($drivers as $driver)
                                                    <option value="{{ $driver->id }}">{{ $driver->first_name }}</option>
                                                    @endforeach
                                                </select>
                                        </div> --}}

                                        {{-- <div class="form-group">
                                                <label>Attachment Vehicle regn cards: </label>
                                                <input type="file" name="vehicle_attachment_path" id="vehicle_attachment_path" class="form-control" value="{{ isset($vehicles->attachements_path) ? $vehicles->attachements_path : old('vehicle_attachment_path') }}">
                                            </div> --}}

                                        {{-- <div class="form-group">
                                                <label>Status: </label>
                                                <select class="form-control"  required="required" name="statusId" id="statusId">
                                                        <option value="">-- Select status --</option>
                                                    @foreach($statuses as $status)
                                                    <option value="{{ $status->status_name }}">{{ $status->status_name }}</option>
                                                    @endforeach
                                                </select>
                                        </div> --}}


										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Update vehicle
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
