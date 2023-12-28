@extends('layouts.app')

@section('title', 'Customer Request Form')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Customer Request Forms</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">

        <div id="alert-info"></div>

    <form role="form" id="add_name" action=""  method="POST">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        <div id="repeater_requestcustomer">
                <!-- Repeater Heading -->
                <div class="repeater-heading">
                    {{-- <h5 class="pull-left">Repeater</h5> --}}
                    <button id = "requestcustomer_add_btn" class="btn btn-primary pt-5 pull-right repeater-add-btn">
                        Add
                    </button>
                </div>
                <div class="clearfix"></div>
                <br>

                <!-- Repeater Items -->
                <div class="items" data-group="requests">

                    <div class="panel panel-default">
                            <div class="panel-heading">
                                Request <a href="{{ url('/request-item') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
                            </div>
                            <div class="panel-body">
                                <div class="container-fluid pull-left">
                                    <section class="container center-block">
                                        <div class="container-page">
                                            <div class="col-sm-10">
                                                        <div class="col-md-3">

                                                            <div class="form-group">
                                                                <label for="goods_description">Goods description: </label>
                                                                <input class="form-control" name="goods_description"  data-name="goods_description" required="required"  placeholder="eg: Building Materials">

                                                            </div>

                                                            <div class="form-group">
                                                                <label>Origin Point: </label>
                                                                <input class="form-control" required="required" name="origin_point"  data-name="origin_point" placeholder="eg: Kurasini Bandari">

                                                            </div>

                                                            <div class="form-group">
                                                                <label>Attachment bill of leading: </label>
                                                                <input type="file" name="attachments_path" data-name="attachments_path"  id="attachments_path" class="form-control" required="required" placeholder="bill of leading">

                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">

                                                            <div class="form-group">
                                                                    <label>Weight:(Tones) </label>
                                                                    <input class="form-control" required="required" name="weight" data-name="weight" placeholder="eg: 78 Tones">

                                                            </div>

                                                            <div class="form-group">
                                                                <label>Destination Point: </label>
                                                                <input class="form-control" required="required" data-name="destination_point"  name="destination_point" placeholder="eg: Zambia">
                                                            </div>

                                                            <div class="form-group">
                                                            <label>Request Details</label>
                                                            <textarea class="form-control" type="text" required="required"  rows="4" name="details_requests" id="details_requests" data-name="details_requests" placeholder="eg: This is my request please inform if there any changes.">
                                                            </textarea>
                                                            </div>


                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Number of Packages: </label>
                                                                <input type="number" class="form-control" required="required"  name="number_of_packages" data-name="number_of_packages" id="number_of_packages" placeholder="eg: 120">


                                                            </div>

                                                        <div class="form-group">
                                                            <label>Container Type: </label>
                                                            <select class="form-control"  required="required" name="container_id" id="container_id" data-name="container_id">
                                                            <option value="">-- Select container type --</option>
                                                                @foreach($containerDatas as $containerData)
                                                                <option value="{{ $containerData->id }}">{{ $containerData->container_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                        <label>Truck Type: </label>
                                                                        <select class="form-control"  required="required" name="truck_id" id="truck_id" data-name="truck_id">
                                                                        <option value="">-- Select truck type --</option>
                                                                            @foreach($truckDatas as $truckData)
                                                                            <option value="{{ $truckData->id }}">{{ $truckData->truck_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                            </div>


                                                            <div class="form-group">
                                                            <label>Trip Duration:(in months) </label>
                                                            <input class="form-control" required="required"  name="trip_duration" id="trip_duration" placeholder="eg: 8 Months" data-name="trip_duration">
                                                            </div>

                                                        </div>

                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                </div>


                    <!-- Repeater Remove Btn -->
                    <div class="pull-right repeater-remove-btn">
                        <button class="btn btn-danger remove-btn">
                            Remove
                        </button>
                    </div>

                    <div class="clearfix"></div>
                    <br>
                </div>

        </div>
    </form>

        <div class="form-group" style="padding-top:25px">
                <button type="submit" name="submit" id="submit" class="btn btn-primary center-block">
                    Submit
                </button>
        </div>



	</div>
</div>

</section>
@endsection


