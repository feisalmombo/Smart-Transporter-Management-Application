@extends('layouts.app')

@section('title', 'Edit Company')

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
				Create Company<a href="{{ url('/view/companies') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid pull-left">
					<section class="container center-block">
						<div class="container-page">
							<div class="col-md-12">

								<form role="form"  action="{{ url('/view/companies/'.$companies->id) }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

                                    <h2 style="text-align: center;">Company Details:</h2>
									<div class="col-md-4">

										<div class="form-group">
											<label>Company Name: </label>
											<input class="form-control" name="company_name" value="{{ isset($companies->company_name) ? $companies->company_name : old('company_name') }}">
                                        </div>

                                        <div class="form-group">
                                                <label>Phone Number: </label>
                                                <input type="tel" class="form-control" name="phone_number" value="{{ isset($companies->phone_number) ? $companies->phone_number : old('phone_number') }}">
                                            </div>

                                            <div class="form-group">
                                                    <label>Company logo (Optional): </label>
                                                    <input type="file" name="company_logo" id="company_logo" class="form-control" value="{{ isset($companies->company_logo) ? $companies->company_logo : old('company_logo') }}">
                                            </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>TIN: </label>
                                                <input class="form-control" name="tin" value="{{ isset($companies->tin) ? $companies->tin : old('tin') }}">
                                            </div>

                                            <div class="form-group">
                                                    <label>Email: </label>
                                                    <input class="form-control" name="email" value="{{ isset($companies->email) ? $companies->email : old('email') }}">
                                                </div>

                                                <div class="form-group">
                                                        <label>Address: </label>
                                                        <input class="form-control" name="address" value="{{ isset($companies->address) ? $companies->address : old('address') }}">
                                                </div>

										<div class="form-group" style="padding-top:25px">
                                                <button type="submit" class="btn btn-primary center-block">
                                                    Update
                                                </button>
                                            </div>
                                    </div>


                                    <div class="col-md-4">

										<div class="form-group">
											<label>VRN (Optional): </label>
											<input class="form-control" name="vrn" value="{{ isset($companies->vrn) ? $companies->vrn : old('vrn') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Website link (Optional): </label>
                                            <input class="form-control" name="website_link" value="{{ isset($companies->website_link) ? $companies->website_link : old('website_link') }}">
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
