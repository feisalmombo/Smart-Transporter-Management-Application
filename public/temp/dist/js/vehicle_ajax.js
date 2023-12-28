$(document).ready(function(){

    $('#other').click(function() {
        if ($(this).prop("checked") == true) {
            hide_other()

         }
         else if($(this).prop("checked") == false){
            show_other()


         }
    });

});
function hide_other() {

    $("#trailernumberdiv").show();
    $("#horsenumberdiv").show();
    // $("#platenumberdiv").hide();



}
function show_other() {
    $("#otherdiv").show();
    $("#othersdiv").hide();
    $("#trailernumberdiv").hide();
}
