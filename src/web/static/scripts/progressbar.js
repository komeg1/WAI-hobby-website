function addDays() {


var target = new Date('12/09/2021');
var today = new Date();
var time=target.getTime()-today.getTime();
var daysToGo=Math.floor( time/(1000*3600*24));

    percent = 100 - daysToGo;
    $(function(){

        $('#progressBar').progressbar({
            value:percent});
    });
    var counter =document.getElementById('falcon9counter');
counter.innerText=("Kolejny start rakiety Falcon 9 za: "+daysToGo + " dni");
}