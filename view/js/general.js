    
    //ajax loader
     $(document).ajaxStart(function(){
        $(".loading").css("display", "block");
    });
    $(document).ajaxSuccess(function(){
        $(".loading").css("display", "none");
    });

    $(document).ajaxError(function(){
        $(".loading").css("display", "none");
        alert("Sorry, An error occurred!");
    });

//Json test function
function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
