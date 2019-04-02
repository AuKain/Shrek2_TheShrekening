$(function() {
    
    //autocomplete
    $("#auto").autocomplete({
        source: "index.php?action=quelsPersos",
        minLength: 1
    });                

});