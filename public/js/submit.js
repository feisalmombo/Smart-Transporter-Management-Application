$(document).ready(function(){
      var postURL = "{{ url('/customer-requests') }}";
      var i=1;


    //   $('#add').click(function(){
    //        i++;
    //        $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    //   });


    //   $(document).on('click', '.btn_remove', function(){
    //        var button_id = $(this).attr("id");
    //        $('#row'+button_id+'').remove();
    //   });


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){

        function validate_add(){
          $("#add_name").validate({
              errorPlacement: function(error, element) {
                  $( element )
                    .closest( "form" )
                      .find( "label[for='" + element.attr( "id" ) + "']" )
                        .append( error );
                },
                errorElement: "label",
                rules: {
                    goods_description: {
                        required: true,
                      },
                      weight: {
                        required: true
                      },
                      number_packages: "required",
                      truckId: "required",
                      origin_point: "required",
                      destination_point: "required",
                      containerId: "required",
                      trip_duration: "required",
                      request_attachment_path: "required|mimes:doc,docx,pdf,txt|max:2048",
                      timeAllocated: "required",
                      status: "required"

                },
                messages: {
                    goods_description: {
                        required: "Please fill project title"
                      },
                      weight: {
                        required: "Please select project category"
                      },
                      number_packages: {
                        required: "Please fill project owner"
                      },
                      truckId: {
                        required: "Please fill project price"
                      },
                      origin_point: {
                        required: "Please fill project unit"
                      },
                      destination_point: {
                        required: "Please fill project description"
                      },
                      containerId: {
                        required: "Please fill project starting date"
                      },
                      trip_duration: {
                        required: "Please fill project duration"
                      },
                      request_attachment_path: {
                        required: "Please fill project duration"
                      },
                      timeAllocated: {
                        required: "Please fill project duration"
                      },
                      status: {
                        required: "Please fill project duration"
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

           $.ajax({
                url:postURL,
                method:"POST",
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)
                {
                    console.log(data);
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                },

                error:function(data)
                {
                    console.log(data);
                }


           });
   }
      });

    });

    //   function printErrorMsg (msg) {
    //      $(".print-error-msg").find("ul").html('');
    //      $(".print-error-msg").css('display','block');
    //      $(".print-success-msg").css('display','none');
    //      $.each( msg, function( key, value ) {
    //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    //      });
    //   }
    });
