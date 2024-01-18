@extends('layouts.app')

@section('title', 'Add Truck')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add Company</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create Truck<a href="{{ url('/view/trucks') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid pull-left">
					<section class="container center-block">
						<div class="container-page">
							<div class="col-md-12">

								<form role="form"  action="{{ url('/view/trucks') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h2 style="text-align: center;">Truck Details:</h2>
									<div class="col-md-4">

										<div class="form-group">
											<label>Truck number: </label>
											<input class="form-control" name="truck_number" required="required"  placeholder="eg: T306DUB">
                                        </div>

                                        <div class="form-group">
                                            <label>Tonnage: </label>
                                            <input type="number" class="form-control" required="required"  name="tonnage" placeholder="eg: 32">
                                        </div>


                                        <div class="form-group">
                                            <label>Driver Phone Number: </label>
                                            <input type="tel" name="driver_phone_number" class="form-control" required="required" placeholder="eg: 0654125609">
                                        </div>

                                        <div class="form-group">
                                                <label>Passport Attachment: </label>
                                                <input type="file" name="passport_attachment" id="passport_attachment" class="form-control" required="required">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Trailer Number: </label>
                                                <input class="form-control" name="trailer_number" placeholder="eg: T345EBP" required="required">
                                            </div>

                                            <div class="form-group">
                                                    <label>Container Number (Optional): </label>
                                                    <input class="form-control" name="container_number" placeholder="eg: CSLU6155071">
                                                </div>

                                                <div class="form-group">
                                                        <label>Driver Licence Number: </label>
                                                        <input class="form-control" required="required"  name="driver_licence_number" placeholder="eg: 4000686327">
                                                </div>

                                                <div class="form-group">
                                                    <label>Licence Attachment: </label>
                                                    <input type="file" name="licence_attachment" id="licence_attachment" class="form-control" required="required">
                                                </div>

										<div class="form-group" style="padding-top:25px">
                                                <button type="submit" class="btn btn-primary center-block">
                                                    Save
                                                </button>
                                            </div>
                                    </div>


                                    <div class="col-md-4">

										<div class="form-group">
											<label>Dengla/Truck Number 2 (Optional): </label>
											<input class="form-control" name="dengla_number" placeholder="eg: T456EBG">
                                        </div>

                                        <div class="form-group">
                                            <label>Driver Full Name: </label>
                                            <input class="form-control" name="driver_full_name" placeholder="eg: Juma Ramadhani Muna" required="required">
                                        </div>

                                        <div class="form-group">
                                            <label>Driver Passport Number: </label>
                                            <input class="form-control" name="driver_passport_number" placeholder="eg: AB1113345" required="required">
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
