
$(document).ready(function(){

    //Party leaders credentials
$('#leaderform').on('submit', function(e){
    var form = $(this);
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }

    var formAction = form.attr('action');
    $.ajax({
        url         : 'partyleadreghandle',
        data        : formdata ? formdata : form.serialize(),
        cache       : false,
        contentType : false,
        processData : false,
        // dataType: "json",
        type        : 'POST',
        success     : function(data, textStatus, jqXHR){
            if(!isJson(data)){
                $(".party_leader_error").html(data);
            }else{
                $.each(JSON.parse(data), function( index, value ) {

                    if(index == "empty_email"){
    
                        $(".empty_emailp").html(value);
                    }
                    if(index == "empty_password"){
    
                        $(".empty_passwordp").html(value);
                    }
                    if(index == "empty_party"){
    
                        $(".empty_party").html(value);
                    }
                    if(index == "empty_passport"){
    
                        $(".empty_passport").html(value);
                    }
                    if(index == "empty_cred"){
    
                        $(".empty_cred").html(value);
                    }
                    if(index == "success"){
                        $(".empty_emailp").html("");

                        $(".empty_passwordp").html("");

                        $(".empty_party").html("");

                        $(".empty_passport").html("");

                        $(".empty_cred").html("");

                        $(".party_leader_error").html("");
    
                        $("#party_leader_success").html(value);

                        $("#party_leader_success").addClass('party_leader_success');

                        var myTimeout = setTimeout(function(){

                        $("#party_leader_success").removeClass('party_leader_success');

                        $("#party_leader_success").html("");

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