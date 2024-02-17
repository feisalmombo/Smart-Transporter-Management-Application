@extends('layouts.app')

@section('title', 'Edit Truck')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Edit Company</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit Truck<a href="{{ url('/view/trucks') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid pull-left">
					<section class="container center-block">
						<div class="container-page">
							<div class="col-md-12">

								<form role="form"  action="{{ url('/view/trucks/'.$trucks->id) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

                                    <h2 style="text-align: center;">Truck Details:</h2>
									<div class="col-md-4">

										<div class="form-group">
											<label>Truck number: </label>
											<input class="form-control" name="truck_number" value="{{ isset($trucks->truck_number) ? $trucks->truck_number : old('truck_number') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Tonnage: </label>
                                            <input type="number" class="form-control" name="tonnage" value="{{ isset($trucks->tonnage) ? $trucks->tonnage : old('tonnage') }}">
                                        </div>


                                        <div class="form-group">
                                            <label>Driver Phone Number: </label>
                                            <input type="tel" name="driver_phone_number" class="form-control" value="{{ isset($trucks->driver_phone_number) ? $trucks->driver_phone_number : old('driver_phone_number') }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Passport Attachment: </label>
                                                <input type="file" name="passport_attachment" id="passport_attachment" class="form-control" value="{{ isset($trucks->passport_attachment) ? $trucks->passport_attachment : old('passport_attachment') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Trailer Number: </label>
                                                <input class="form-control" name="trailer_number" value="{{ isset($trucks->trailer_number) ? $trucks->trailer_number : old('trailer_number') }}">
                                            </div>

                                            <div class="form-group">
                                                    <label>Container Number (Optional): </label>
                                                    <input class="form-control" name="container_number" value="{{ isset($trucks->container_number) ? $trucks->container_number : old('container_number') }}">
                                                </div>

                                                <div class="form-group">
                                                        <label>Driver Licence Number: </label>
                                                        <input class="form-control" name="driver_licence_number" value="{{ isset($trucks->driver_licence_number) ? $trucks->driver_licence_number : old('driver_licence_number') }}">
                                                </div>

                                                <div class="form-group">
                                                    <label>Licence Attachment: </label>
                                                    <input type="file" name="licence_attachment" id="licence_attachment" class="form-control" value="{{ isset($trucks->licence_attachment) ? $trucks->licence_attachment : old('licence_attachment') }}">
                                                </div>

										<div class="form-group" style="padding-top:25px">
                                                <button type="submit" class="btn btn-primary center-block">
                                                    Update
                                                </button>
                                            </div>
                                    </div>


                                    <div class="col-md-4">

										<div class="form-group">
											<label>Dengla/Truck Number 2 (Optional): </label>
											<input class="form-control" name="dengla_number" value="{{ isset($trucks->dengla_number) ? $trucks->dengla_number : old('dengla_number') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Driver Full Name: </label>
                                            <input class="form-control" name="driver_full_name" value="{{ isset($trucks->driver_full_name) ? $trucks->driver_full_name : old('driver_full_name') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Driver Passport Number: </label>
                                            <input class="form-control" name="driver_passport_number" value="{{ isset($trucks->driver_passport_number) ? $trucks->driver_passport_number : old('driver_passport_number') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Company: </label>
                                            <select class="form-control"  required="required" name="company_id" id="company_id">
                                                <option value="">-- Select Company --</option>
                                                    @foreach($companies as $company)
                                                    <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                                                    @endforeach
                                            </select>
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
