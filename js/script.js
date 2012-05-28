$(document).ready(function() {
    $("#results").hide();
    $("#ingredients").hide();
    $("#search-bar").hide();
    
    $("input.shouldCleanOnFocus").focus(function() {
        if (!$(this).attr("defaultValue"))
            $(this).attr("defaultValue", $(this).val());
        $(this).val("");
    });
    
    $("input.shouldCleanOnFocus").blur(function() {
        if ($(this).val().length == 0)
            $(this).val($(this).attr("defaultValue"));
    });
    
    $("#home-search").submit(function() {
        $(this).fadeOut(500);
        setTimeout(function() {showResults()}, 500);
        return false;
    });
    
});

function showResults() {
    $("#results").fadeIn();
    $("#ingredients").fadeIn();
    $("#search-bar").fadeIn();
}