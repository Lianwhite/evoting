$(document).ready(function(){
    //Party leaders credentials
$('#startForm').on('submit', function(e){
    var form = $(this);
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }

    var formAction = form.attr('action');
    $.ajax({
        url         : 'adminformhandle.php',
        data        : formdata ? formdata : form.serialize(),
        cache       : false,
        contentType : false,
        processData : false,
        // dataType: "json",
        type        : 'POST',
        success     : function(data, textStatus, jqXHR){
            alert(data);
            // window.location.href = "login.php";
        }
    });
    // console.log(formdata);
    e.preventDefault();
});

//
$('.approvalform')[1].on('click', function(e){
    alert("Ok");
    e.preventDefault();
});


//notification modal
});