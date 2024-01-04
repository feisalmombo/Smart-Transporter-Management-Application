@extends('layouts.app')

@section('title', 'Home')

@section('content')

@if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('administrator') || Auth::user()->hasRole('transporter'))
<section class="content-header">
        <h1 style="font-family:Titillium Web, sans-serif">
          Dashboard
      </h1>
</section>
@endif

{{-- @if(Auth::user()->hasRole('customer'))
<section class="content-header">
        <h1 style="font-family:Titillium Web, sans-serif">
          Welcome To Smart Transporter Management Application(STMA)
      </h1>
      <br>
      <div class="row">
      <div class="col-lg-4">
        <a href="{{ url('/attend-requests') }}">
        <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-light-blue"><i class="fa fa-sun-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Attended Request</span>
          <span class="info-box-number">{{ $attendedRequestCount[0]->attendedRequestCount }}</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
     </a>
    </div>
    </div>
</section>
@endif --}}




@if(Auth::user()->hasRole('transporter'))
<section class="content-header">
        <h1 style="font-family:Titillium Web, sans-serif">
          Welcome To Smart Transporter Management Application(STMA)
      </h1>
      <br>
      <div class="row">
      <div class="col-lg-4">
        <a href="#">
        <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-light-blue"><i class="fa fa-sun-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Truck Details</span>
          <span class="info-box-number">10</span>
          {{-- <span class="info-box-number">{{ $attendedRequestCount[0]->attendedRequestCount }}</span> --}}
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
     </a>
    </div>


    <div class="col-lg-4">
      <a href="#">
      <div class="info-box">
      <!-- Apply any bg-* class to to the icon to color it -->
      <span class="info-box-icon bg-light-blue"><i class="fa fa-sun-o"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Company Details</span>
        <span class="info-box-number">1</span>
        {{-- <span class="info-box-number">{{ $attendedRequestCount[0]->attendedRequestCount }}</span> --}}
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
   </a>
  </div>


    </div>
    
</section>
@endif

<!-- Main content -->
<section class="content">
        <div class="row">

            @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('administrator') || Auth::user()->hasRole('superadmin'))
            <div class="col-lg-4">
                <a href="{{ url('/settings/manage_users/roles') }}">
                <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-light-blue"><i class="fa fa-check"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">System Roles</span>
                  <span class="info-box-number">{{ $roleCount[0]->roleCount }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </a>
            </div>
         @endif

            @if(Auth::user()->hasRole('developer')|| Auth::user()->hasRole('manager') || Auth::user()->hasRole('administrator') || Auth::user()->hasRole('superadmin'))
            <div class="col-lg-4">
                <a href="{{ url('/settings/manage_users/permissions') }}">
                <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-light-blue"><i class="fa fa-universal-access"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">System Permission</span>
                  <span class="info-box-number">{{ $permissionCount[0]->permissionCount }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
             </a>
            </div>

            <div class="col-lg-4">
                <a href="{{ url('/view-users') }}">
                <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-blue"><i class="fa fa-user-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">System users</span>
                  <span class="info-box-number">{{ $userCount[0]->userCount }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
               </a>
            </div>
         @endif


         {{-- @if(Auth::user()->hasRole('developer')|| Auth::user()->hasRole('manager') || Auth::user()->hasRole('administrator') || Auth::user()->hasRole('transporter')) --}}
         {{-- <div class="col-lg-4">
             <a href="{{ url('/view-drivers') }}">
             <div class="info-box">
             <!-- Apply any bg-* class to to the icon to color it -->
             <span class="info-box-icon bg-light-blue"><i class="fa fa-id-card"></i></span>
             <div class="info-box-content">
               <span class="info-box-text">Driver</span>
               <span class="info-box-number">{{ $transporterCount[0]->transporterCount }}</span>
             </div><!-- /.info-box-content -->
           </div><!-- /.info-box -->
          </a>
         </div> --}}

         {{-- <div class="col-lg-4">
             <a href="{{ url('/view-vehicles') }}">
             <div class="info-box">
             <!-- Apply any bg-* class to to the icon to color it -->
             <span class="info-box-icon bg-blue"><i class="fa fa-car"></i></span>
             <div class="info-box-content">
               <span class="info-box-text">Vehicles</span>
               <span class="info-box-number">{{ $vehicleCount[0]->vehicleCount }}</span>
             </div><!-- /.info-box-content -->
           </div><!-- /.info-box -->
            </a>
         </div> --}}


        {{-- <div class="col-lg-4">
        <a href="{{ url('/request-customer') }}">
                <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-blue"><i class="fa fa-registered"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Request</span>
                  <span class="info-box-number">{{ $RequestcustomersCount[0]->requestcustomersCount }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
               </a>
        </div> --}}
      {{-- @endif --}}

      @if(Auth::user()->hasRole('developer')|| Auth::user()->hasRole('administrator') || Auth::user()->hasRole('administrator') || Auth::user()->hasRole('transporter'))
      {{-- <div class="col-lg-4">
          <a href="{{ url('/attend-requests') }}">
          <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-light-blue"><i class="fa fa-sun-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Attended Request</span>
            <span class="info-box-number">{{ $attendedRequestCount[0]->attendedRequestCount }}</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
       </a>
      </div> --}}

      {{-- <div class="col-lg-4">
          <a href="{{ url('/view-bodytypes') }}">
          <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-blue"><i class="fa fa-shield"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">BodyType</span>
            <span class="info-box-number">{{ $bodyTypeCount[0]->bodyTypeCount }}</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
         </a>
      </div> --}}


     {{-- <div class="col-lg-4">
             <a href="{{ url('/view-containertypes') }}">
             <div class="info-box">
             <!-- Apply any bg-* class to to the icon to color it -->
             <span class="info-box-icon bg-blue"><i class="fa fa-connectdevelop"></i></span>
             <div class="info-box-content">
               <span class="info-box-text">ContainerTypes</span>
               <span class="info-box-number">{{ $containerTypeCount[0]->containerTypeCount }}</span>
             </div><!-- /.info-box-content -->
           </div><!-- /.info-box -->
            </a>
     </div> --}}
   @endif


   @if(Auth::user()->hasRole('developer')|| Auth::user()->hasRole('manager') || Auth::user()->hasRole('administrator') || Auth::user()->hasRole('transporter'))
   {{-- <div class="col-lg-4">
       <a href="{{ url('/view-trucktypes') }}">
       <div class="info-box">
       <!-- Apply any bg-* class to to the icon to color it -->
       <span class="info-box-icon bg-light-blue"><i class="fa fa-truck"></i></span>
       <div class="info-box-content">
         <span class="info-box-text">TruckTypes</span>
         <span class="info-box-number">{{ $truckTypeCount[0]->truckTypeCount }}</span>
       </div><!-- /.info-box-content -->
     </div><!-- /.info-box -->
    </a>
   </div> --}}

    {{-- <div class="col-lg-4">
       <a href="{{ url('/request-item') }}">
       <div class="info-box">
       <!-- Apply any bg-* class to to the icon to color it -->
       <span class="info-box-icon bg-blue"><i class="fa fa-sitemap"></i></span>
       <div class="info-box-content">
         <span class="info-box-text">Request items</span>
         <span class="info-box-number">{{ $RequestitemsCount[0]->requestitemsCount }}</span>
       </div><!-- /.info-box-content -->
     </div><!-- /.info-box -->
      </a>
   </div> --}}


   {{-- <div class="col-lg-4">
          <a href="{{ url('/view-trailers') }}">
          <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-blue"><i class="fa fa-train"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Trailer Number</span>
            <span class="info-box-number">{{ $trailerNumberCount[0]->trailerNumberCount }}</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
         </a>
  </div> --}}
@endif
        </div>
        <br>
        <br>
        <br>

    </section>

@endsection
