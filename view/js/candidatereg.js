
$(document).ready(function(){
     
    //Candidates reg ajax request

$('#positionform').on('submit', function(e){
    var form = $(this);
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }

    var formAction = form.attr('action');
    $.ajax({
        url         : 'candidatereg',
        data        : formdata ? formdata : form.serialize(),
        cache       : false,
        contentType : false,
        processData : false,
        type        : 'POST',
        success     : function(data, textStatus, jqXHR){

            if(!isJson(data)){
                if(data == "Not Logged in"){

                    var value = "You are not logged in. <a href='login'>Login</a>";

                    $(".candidate_reg_error").html(value);

                }else{

                $(".candidate_reg_error").html(data);
            }
            }else{
                $.each(JSON.parse(data), function( index, value ) {

                    if(index == "empty_email"){
    
                        $(".empty_email").html(value);
                    }
                    if(index == "empty_position"){
    
                        $(".empty_position").html(value);
                    }
                    if(index == "empty_passport"){
    
                        $(".empty_passport").html(value);
                    }
                    if(index == "empty_cred"){
    
                        $(".empty_cred").html(value);
                    }
                    if(index == "success"){
                        $(".empty_email").html("");

                        $(".empty_password").html("");

                        $(".empty_party").html("");

                        $(".empty_passport").html("");

                        $(".empty_cred").html("");

                        $(".party_leader_error").html("");
    
                        $("#candidate_success").html(value);

                        $("#candidate_success").addClass('candidate_success');

                        var myTimeout = setTimeout(function(){

                        $("#candidate_success").removeClass('candidate_success');

                        $("#candidate_success").html("");

                        }, 10000);
    
                    }
                  });
            }
            
        }
    });
    
    e.preventDefault();
});

});