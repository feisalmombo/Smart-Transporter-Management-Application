@extends('layouts.app')

@section('title', 'Update Driver')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Update driver</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Update driver<a href="{{ url('/view-drivers') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/view-drivers/'.$drivers->id) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Update Driver Information</h2>
										<div class="form-group">
											<label>First Name: </label>
											<input class="form-control" name="fname" value="{{ isset($drivers->first_name) ? $drivers->first_name : old('fname') }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Middle Name: </label>
                                                <input class="form-control" name="mname" value="{{ isset($drivers->middle_name) ? $drivers->middle_name : old('mname') }}">
                                            </div>

										<div class="form-group">
											<label>Last Name: </label>
											<input class="form-control" name="lname" value="{{ isset($drivers->last_name) ? $drivers->last_name : old('lname') }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Email: </label>
                                                <input type="email" class="form-control" name="driveremail" value="{{ isset($drivers->email) ? $drivers->email : old('driveremail') }}">
                                            </div>

                                        <div class="form-group">
                                                <label>Phone Number: </label>
                                                <input type="tel" class="form-control" name="pnumber" value="{{ isset($drivers->phone_number) ? $drivers->phone_number : old('pnumber') }}">
                                            </div>

                                            {{-- <div class="form-group">
                                                    <label>Gender: </label>
                                                    <select class="form-control"  required="required" name="gender" id="gender">
                                                    <option value="">-- Select gender --</option>
                                                        @foreach($genders as $gender)
                                                        <option value="{{ $gender->gender_name }}">{{ $gender->gender_name }}</option>
                                                        @endforeach
                                                    </select>
                                        </div> --}}

                                        {{-- <div class="form-group">
                                                <label>Attachment Licence: </label>
                                                <input type="file" name="attachment_path" id="attachment_path" class="form-control" required="required">
                                            </div> --}}
                                        {{--
                                        <img src="" class="img img-responsive" id="profile-img-tag" width="70%"  />
                                        <br> --}}

                                        <div class="form-group">
                                                <label>Address: </label>
                                                <input class="form-control" name="driveraddress" value="{{ isset($drivers->address) ? $drivers->address : old('driveraddress') }}">
                                        </div>



                                        <div class="form-group">
                                                <label>DOB: </label>
                                                <input type="date" class="form-control" name="dob" value="{{ isset($drivers->date_of_birth) ? $drivers->date_of_birth : old('dob') }}">
                                            </div>

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
												Update Driver
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
