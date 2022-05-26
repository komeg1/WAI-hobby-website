
$(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,  
      resizable: false,
      autoOpen: false,
      height: 150,
      width: 375,
      modal: true,
      
});
$( ".button" ).click(function() {
   $( "#dialog" ).dialog( "open" );
});
});



$(document).ready(function(){
   $(".starship1").zoom({url: '/static/grafika/48954138902_e9ae0d1a65_o.jpg'});
   $(".starship2").zoom({url: '/static/grafika/starship-bfg.jpg'});
       });