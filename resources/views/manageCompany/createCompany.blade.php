@extends('layouts.app')

@section('title', 'Add Company')

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
				Create Company<a href="{{ url('/view/companies') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid pull-left">
					<section class="container center-block">
						<div class="container-page">
							<div class="col-md-12">

								<form role="form"  action="{{ url('/view/companies') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h2 style="text-align: center;">Company Details:</h2>
									<div class="col-md-4">

										<div class="form-group">
											<label>Company Name: </label>
											<input class="form-control" name="company_name" required="required"  placeholder="eg: Motionstarlight Logistics Co.Ltd">
                                        </div>

                                        <div class="form-group">
                                                <label>Phone Number: </label>
                                                <input type="tel" class="form-control" required="required"  name="phone_number" placeholder="eg: 0654197534">
                                            </div>

                                            <div class="form-group">
                                                    <label>Company logo: </label>
                                                    <input type="file" name="company_logo" id="company_logo" class="form-control">
                                            </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>TIN: </label>
                                                <input class="form-control" name="tin" placeholder="eg: 138-123-890" required="required">
                                            </div>

                                            <div class="form-group">
                                                    <label>Email: </label>
                                                    <input type="email" class="form-control" required="required"  name="email" placeholder="eg: info@motionstarlight.com">
                                                </div>

                                                <div class="form-group">
                                                        <label>Address: </label>
                                                        <input class="form-control" required="required"  name="address" placeholder="eg: 456 Tabata Kisukuru, Dar es Salaam">
                                                </div>

										<div class="form-group" style="padding-top:25px">
                                                <button type="submit" class="btn btn-primary center-block">
                                                    Save
                                                </button>
                                            </div>
                                    </div>


                                    <div class="col-md-4">

										<div class="form-group">
											<label>VRN (Optional): </label>
											<input class="form-control" name="vrn" placeholder="eg: 8900-0978-0068">
                                        </div>

                                        <div class="form-group">
                                            <label>Website link (Optional): </label>
                                            <input class="form-control" name="website_link" placeholder="eg: www.motionstarlight.com">
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
