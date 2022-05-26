function sendQuery(str) {
    if (str.length == 0) {
      document.getElementById("result").innerHTML = "";
      return;
    } 
    else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("result").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "browserBusiness?q="+str, true);
      xmlhttp.send();
    }
  }