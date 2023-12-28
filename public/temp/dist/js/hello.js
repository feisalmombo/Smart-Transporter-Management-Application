$( document ).ready(function() {
    $("#addMoreFields").click(function(event) {
        event.preventDefault();

        $("#inputHolder").append('<input name="goods_description" type="text" placeholder="Goods description"><br>');
        $("#inputHolder").append('<input name="weight" type="text" placeholder="Weight"><br>');
        $("#inputHolder").append('<input name="number_packages" type="number" placeholder="Number of package"><br>');
        $("#inputHolder").append('<input name="origin_point" type="text" placeholder="Origin Point"><br>');
        $("#inputHolder").append('<input name="destination_point" type="text" placeholder="Destination Point"><br>');
        $("#inputHolder").append('<input name="trip_duration" type="text" placeholder="Trip duration"><br>');
        $("#inputHolder").append('<input name="timeAllocated" type="date" placeholder="Time Allocated"><br><br>');
    });
});
