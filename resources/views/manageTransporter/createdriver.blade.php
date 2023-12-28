@extends('layouts.app')

@section('title', 'Add Driver')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add driver</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create driver<a href="{{ url('/view-drivers') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid pull-left">
					<section class="container center-block">
						<div class="container-page">
							<div class="col-md-10">

								<form role="form"  action="{{ url('/view-drivers') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h2 style="text-align: center;">Driver Information:</h2>
									<div class="col-md-4">

										<div class="form-group">
											<label>First Name: </label>
											<input class="form-control" name="fname" required="required"  placeholder="eg: Angel">
                                        </div>

                                        <div class="form-group">
                                                <label>Email: </label>
                                                <input type="email" class="form-control" required="required"  name="driveremail" placeholder="eg: kibona@tls.co.tz">
                                            </div>

                                            <div class="form-group">
                                                    <label>Attachment Licence: </label>
                                                    <input type="file" name="attachment_path" id="attachment_path" class="form-control" required="required">
                                                </div>
                                            {{--
                                            <img src="" class="img img-responsive" id="profile-img-tag" width="70%"  />
                                            <br> --}}



                                        {{--  <div class="form-group">
                                                <label>Status: </label>
                                                <select class="form-control"  required="required" name="statusId" id="statusId">
                                                        <option value="">-- Select status --</option>
                                                    @foreach($statuses as $status)
                                                    <option value="{{ $status->status_name }}">{{ $status->status_name }}</option>
                                                    @endforeach
                                                </select>
                                        </div>  --}}
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Middle Name: </label>
                                                <input class="form-control" name="mname" placeholder="eg: Option">
                                            </div>

                                            <div class="form-group">
                                                    <label>Phone Number: </label>
                                                    <input type="tel" class="form-control" required="required"  name="pnumber" placeholder="eg: +255654197534">
                                                </div>

                                                <div class="form-group">
                                                        <label>Address: </label>
                                                        <input class="form-control" required="required"  name="driveraddress" placeholder="eg: Tabata Kisukuru">
                                                </div>

										<div class="form-group" style="padding-top:25px">
                                                <button type="submit" class="btn btn-primary center-block">
                                                    Register
                                                </button>
                                            </div>
                                    </div>


                                    <div class="col-md-4">

										<div class="form-group">
											<label>Last Name: </label>
											<input class="form-control" required="required"  name="lname" placeholder="eg: Julius">
                                        </div>

                                        <div class="form-group">
                                                <label>Gender: </label>
                                                <select class="form-control"  required="required" name="gender" id="gender">
                                                <option value="">-- Select gender --</option>
                                                    @foreach($genders as $gender)
                                                    <option value="{{ $gender->gender_name }}">{{ $gender->gender_name }}</option>
                                                    @endforeach
                                                </select>
                                        </div>

                                        <div class="form-group">
                                            <label>DOB: </label>
                                            <input type="date" class="form-control" required="required"  name="dob" placeholder="eg: 12/09/1987">
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
