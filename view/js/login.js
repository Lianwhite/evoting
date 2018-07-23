
$(document).ready(function(){

    //Party leaders credentials
$('#loginform').on('submit', function(e){
    var form = $(this);
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }

    var formAction = form.attr('action');
    $.ajax({
        url         : 'formhandle',
        data        : formdata ? formdata : form.serialize(),
        cache       : false,
        contentType : false,
        processData : false,
        // dataType: "json",
        type        : 'POST',
        success     : function(data, textStatus, jqXHR){
            if(!isJson(data)){
                $(".loginError").html(data);
            }else{
                $.each(JSON.parse(data), function( index, value ) {

                    if(index == "empty_email"){
    
                        $(".empty_email").html(value);
                    }
                    if(index == "empty_password"){
    
                        $(".empty_password").html(value);
                    }
                    if(index == "success"){

                        window.location = "./";
    
                    }
                  });
            }

            // alert(data);
            // window.location.href = "login.php";
        }
    });
    // console.log(formdata);
    e.preventDefault();
});

});