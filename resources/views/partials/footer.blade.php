<footer class="main-footer">
	<div class="pull-right hidden-xs" style="font-family:Titillium Web, sans-serif">
		<b>Version</b> 1.0.0 Developed by <a href="#"  target="_blank" style="text-decoration: none; font-family:Titillium Web, sans-serif">Feisal Suleiman Mombo</a>
	</div>
	<strong style="text-align: center;font-family:Titillium Web, sans-serif">Copyright &copy; {{ date('Y') }} Smart Transporter Management Application<a href="#"  target="_blank" style="text-decoration: none; font-family:Titillium Web, sans-serif">(STMA)</a>.</strong> All Rights Reserved.
</footer>


<!-- jQuery 3 -->
<script src="{{asset('temp/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('temp/dist/js/permission_ajax.js')}}"></script>
<script src="{{asset('temp/dist/js/vehicle_ajax.js')}}"></script>
<script src="{{asset('temp/dist/js/hello.js')}}"></script>
{{--  <script src="{{asset('js/jquery-1.11.3.min"></script>  --}}
<script src="{{asset('js/assignedDriverToVehicle.js')}}"></script>
<script src="{{asset('js/repeater.js')}}"></script>

<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('js/jquery.easy-autocomplete.js')}}"></script>
<script src="{{asset('js/jquery.easy-autocomplete.min.js')}}"></script>
{{-- <script src="{{asset('js/submit.js')}}"></script> --}}
<script src="{{asset('js/attendRequest.js')}}"></script>
<!--JQueryFile -->
{{--  <script src="{{asset('js/jQueryFile.js" type="text/javascript"></script>  --}}
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('temp/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('temp/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('temp/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('temp/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('temp/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('temp/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('temp/dist/js/demo.js')}}"></script>

<!-- AdminLTE for requests funs -->
<script src="{{asset('temp/dist/js/attachments_processings.js')}}"></script>
<!-- page script -->
<script>


  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
        function hid() {
            var soln = document.getElementById("sol");
             var savebt = document.getElementById("savebtn");
            if (soln.style.display === "none") {
                soln.style.display = "block";
                savebt.style.display ="none";
            } else {
                soln.style.display = "none";
            }
        }
</script>



<script type="text/javascript">
 $(document).ready(function(){
      $("#repeater_vehicle").createRepeater();
      $( "#vehicle_add_btn" ).trigger( "click" );
    });
  </script>


<script type="text/javascript">
    $(function(){
      $("#repeater_requestcustomer").createRepeater();
      $( "#requestcustomer_add_btn" ).trigger( "click" );
    });
  </script>





<script type="text/javascript">
    $(document).ready(function(){
      var i=1;


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){

        function validate_add(){
          $("#add_name").validate({
            //   errorPlacement: function(error, element) {
            //       $( element )
            //         .closest( "form" )
            //           .find( "label[for='" + element.attr( "id" ) + "']" )
            //             .append( error );
            //     },
                //errorElement: "label",
                rules: {
                    goods_description: {
                        required: true,
                      },
                      weight: {
                        required: true
                      },
                      number_of_packages: "required",
                      truck_id: "required",
                      origin_point: "required",
                      destination_point: "required",
                      container_id: "required",
                      trip_duration: "required",
                      ticket_number: "required",
                      attachments_path: "required|mimes:doc,docx,pdf,txt|max:2048",
                      time_allocated: "required",
                      description_request: "required",
                      status: "required"

                },
                messages: {
                    goods_description: {
                        required: "Please fill goods description"
                      },
                      weight: {
                        required: "Please fill weight"
                      },
                      number_packages: {
                        required: "Please fill number of packages"
                      },
                      truck_id: {
                        required: "Please fill truck type"
                      },
                      origin_point: {
                        required: "Please fill origin point"
                      },
                      destination_point: {
                        required: "Please fill destination point"
                      },
                      container_id: {
                        required: "Please fill container type"
                      },
                      trip_duration: {
                        required: "Please fill trip duration"
                      },
                      attachments_path: {
                        required: "Please fill attachments path"
                      },
                      time_allocated: {
                        required: "Please fill time allocated"
                      },
                      description_request: {
                        required: "Please fill description request"
                      },
                      status: {
                        required: "Please fill status"
                      }
                }
          });
      }

      $('button[id^=\'submit\']') .click(function (){
    validate_add();
   var $validator = $("#add_name").valid();
   if(!$validator) {
     // $validator.focusInvalid();
   }else{
            var errormsg = '';
            var formData = new FormData($('form#add_name')[0]);
            // console.log(formData);

            $.ajax({
                        type        : 'POST',
                        url         : '{{ url('/request-customer') }}',
                        mimeType    : 'multipart/form-data',
                        data        : formData,
                        contentType : false,
                        processData : false,
                        success: function(data) {
                    $('#alert-info').html('<div class="alert alert-success">'+
                        'You successfully added Customer Request'+
                            '</div>');
                    $('#add_name').trigger("reset");
                }
                    })
    }
      });

    });
    });
</script>

{{-- <script type="text/javascript" language="javascript">
  $(document).ready(function () {
    //alert("Hello world");
    var i = 1;


  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  $('#submitvehicle').click(function () {

    function validate_add() {
    $("#add_vehicle").validate({
      rules: {
      vehicleId: {
        required: true,
        },
        driverId: {
          required: true
          },
        attend_description: "required"

        },
        messages: {
          vehicleId: {
          required: "Please fill vehicle"
          },
          driverId: {
            required: "Please fill driver"
            },
            attend_description: {
              required: "Please fill vehicle"
              }
          }
     });
  }

    $('button[id^=\'submitvehicle\']').click(function () {
      validate_add();
     var $validator = $("#add_vehicle").valid();
    if (!$validator) {
    // $validator.focusInvalid();
      } else {
      var errormsg = '';
      var formData = new FormData($('form#add_vehicle')[0]);
      console.log(formData);

  $.ajax({
    type: 'POST',
    url: '{{ url('/notifications') }}',
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $('#alert-info').html('<div class="alert alert-success">' +
        'You successfully added Customer Request' +
        '</div>');
  $('#add_vehicle').trigger("reset");
      }
    });
    }
    });
   });
  });
</script> --}}




</body>
</html>



