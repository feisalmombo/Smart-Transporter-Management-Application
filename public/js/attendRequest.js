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
                //console.log(formData);

                $.ajax({
                    type: 'POST',
                    url: '/notifications',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                        $('#alert-info').html('<div class="alert alert-success">' +
                            'You successfully attend the customer request' +
                            '</div>');
                        $('#add_vehicle').trigger("reset");
                    },  error: function (data) {
                        console.log(data);
                    }
                });
            }
        });
    });

});

