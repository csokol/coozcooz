$(document).ready(function() {
    $("#results").hide();
    $("#ingredients").hide();
    $("#search-bar").hide();
    
    $("input.shouldCleanOnFocus").focus(function() {
        $(this).val("");
    });
    
    $("#home-search").submit(function() {
        $(this).fadeOut(500);
        setTimeout(function() {showResults()}, 500);
    });
    
});

function showResults() {
    $("#results").fadeIn();
    $("#ingredients").fadeIn();
    $("#search-bar").fadeIn();
}