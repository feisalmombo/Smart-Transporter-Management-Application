function submitAndsaveData(frmQC) {

    if(Form_Validator(frmQC)) {

	$.ajax({
	    url: '/savedata.php',
	    async: true,
	    cache: false,
	    data: $('#frmRegister').serialize(),
	    type: 'post',
	    success: function (data) {
		    data=data.replace(/\\s+/g,"");
		    if(data == "true"){
		    //alert("success");
			    $('.qc-errmsg').empty();
			    $('#formregister').hide();
			    $('#frmRegister').hide();
			    $('div#successfulpost').fadeIn();
		    }
		    else {
		         //alert(data+" failed");
			    $('#frmRegister').show(function(){
			    $('.qc-errmsg').html(data);
			    $('.qc-errmsg').fadeIn(500);
			    });
		    }
	    },
	    error : function(XMLHttpRequest, textStatus, errorThrown) {
		    alert(textStatus);
	    }
	});

    return false;
    }
    return false;
}
