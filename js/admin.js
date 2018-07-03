$(document).ready(function(){
    //Start election
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

//Approval Ajax
$('.approvalform').on('submit', function(e){
    var form = $(this);
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }

    var formAction = form.attr('action');
    $.ajax({
        url         : 'approvalhandle.php',
        data        : formdata ? formdata : form.serialize(),
        cache       : false,
        contentType : false,
        processData : false,
        // dataType: "json",
        type        : 'POST',
        success     : function(data, textStatus, jqXHR){
            alert(data);
            $("#notifications").html($("#notifications").html()-1);
            $(e.target).parent().closest(".current").css("display", "none");
        }
    });
    e.preventDefault();
    
});

//Decline Ajax
$('.declineform').on('click', function(e){
    var form = $(this);
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }

    var formAction = form.attr('action');
    $.ajax({
        url         : 'approvalhandle.php',
        data        : formdata ? formdata : form.serialize(),
        cache       : false,
        contentType : false,
        processData : false,
        // dataType: "json",
        type        : 'POST',
        success     : function(data, textStatus, jqXHR){
            alert(data);
            $("#notifications").html($("#notifications").html()-1);
            $(e.target).parent().closest(".current").css("display", "none");
        }
    });
    e.preventDefault();
});


//delete modal
$(".delete").on('click', function(e){
    console.log($(e.target).val());
    e.preventDefault;
});
});