$(document).ready(function() {


    $('body').on('change', 'select[id^=\'vehicles_\']', function() {
        var id = this.id.slice(9,10);
            var option_data = $("#vehicles_"+id+"_vehicleid option:selected").val();


            // var data_array = option_data.split("|");

          var data_json = JSON.parse(option_data);
        //   console.log(data_json);
          var driverOpts =    '<option value="'+data_json.driver_id+'">'+data_json.first_name+' '+data_json.last_name+'</option>';

          var selectdId = data_json.id;
          var allVehicles = $("#allVehiclesId").val();
          //console.log(allVehicles);

          var allvehiclesJson = JSON.parse(allVehicles)

          //console.log(allvehiclesJson);

          $.each(allvehiclesJson,function(key,value){
            $("#vehicles_"+id+"_driver_div").empty();
            $("#vehicles_"+id+"_trailer_div").empty();
            //console.log(selectdId+' , '+value.id);
            if(parseFloat(selectdId) != parseFloat(value.id) ){
                //console.log('different');
                driverOpts = driverOpts + '<option value="'+value.driver_id+'">'+value.first_name+' '+value.last_name+'</option>';
                }else{
                }

          });

        //   SET DRIVER
        $("#vehicles_"+id+"_driver_div").html(
            '<label>Choose another driver: </label>'+
            '<select class = "form-control" name="vehicles['+id+'][driver_name]">'+
            driverOpts+
        '</select>');

       // Trailer
        if(data_json.trailer_number != null){
            var trailerOpts = trailerOpts + '<option value="'+data_json.trailer_id+'">'+data_json.trailer_number+'</option>';

          $.each(allvehiclesJson,function(key,value){
            //console.log(selectdId+' , '+value.id);
            if(parseFloat(selectdId) != parseFloat(value.id) ){
                    if(value.trailer_number != null){
                        trailerOpts = trailerOpts + '<option value="'+value.trailer_id+'">'+value.trailer_number+'</option>';
                   }
            }

          });

        //   $("#TrailerSelectId").html(
        //     '<select name="trailerNumber_id">'+
        //       trailerOpts+
        //     '</select>');
                 //   SET Trailer
        $("#vehicles_"+id+"_trailer_div").html(
            '<label>Choose another Trailer: </label>'+
            '<select class = "form-control" name="vehicles['+id+'][trailer_number]">'+
                trailerOpts+
        '</select>');
        }



    });


});







