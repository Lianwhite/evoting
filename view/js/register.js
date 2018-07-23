
$(document).ready(function(){

    //Party leaders credentials
$('#registerform').on('submit', function(e){
    var form = $(this);
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }

    var formAction = form.attr('action');
    $.ajax({
        url         : 'registerhandle',
        data        : formdata ? formdata : form.serialize(),
        cache       : false,
        contentType : false,
        processData : false,
        // dataType: "json",
        type        : 'POST',
        success     : function(data, textStatus, jqXHR){
            if(!isJson(data)){
                $(".register_error").html(data);
            }else{
                $.each(JSON.parse(data), function( index, value ) {
                    if(index == "register_error"){
    
                        $(".register_error").html(value);
                    }

                    if(index == "empty_first_name"){
    
                        $(".empty_first_name").html(value);
                    }
                    if(index == "empty_last_name"){
    
                        $(".empty_last_name").html(value);
                    }
                    if(index == "empty_email"){
    
                        $(".empty_email").html(value);
                    }
                    if(index == "empty_password"){
    
                        $(".empty_password").html(value);
                    }
                    if(index == "passwordmismatch"){
    
                        $(".passwordmismatch").html(value);
                    }
                    if(index == "empty_state"){
    
                        $(".empty_state").html(value);
                    }
                    if(index == "empty_LGA"){
    
                        $(".empty_LGA").html(value);
                    }
                    if(index == "empty_DOB"){
    
                        $(".empty_DOB").html(value);
                    }
                    if(index == "empty_phone"){
    
                        $(".empty_phone").html(value);
                    }
                    if(index == "empty_voters_id"){
    
                        $(".empty_voters_id").html(value);
                    }
                    if(index == "empty_address"){
    
                        $(".empty_address").html(value);
                    }
                    if(index == "empty_gender"){
    
                        $(".empty_gender").html(value);
                    }
                    if(index == "success"){
                        $(".empty_first_name").html("");
                    
                        $(".empty_last_name").html("");
                    
                        $(".empty_email").html("");
                    
                        $(".empty_password").html("");
                    
                        $(".passwordmismatch").html("");
                    
                        $(".empty_state").html("");
                    
                        $(".empty_LGA").html("");
                    
                        $(".empty_DOB").html("");
                    
                        $(".empty_phone").html("");
                    
                        $(".empty_voters_id").html("");
                    
                        $(".empty_address").html("");
                    
                        $(".empty_gender").html("");
                        

                        $(".register_error").html("");
    
                        $("#register_success").html(value);

                        $("#register_success").addClass('register_success');

                        var myTimeout = setTimeout(function(){

                        $("#register_success").removeClass('register_success');

                        $("#register_success").html("");

                        }, 10000);
    
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