function StorageCreate(){
var name = document.getElementById("fname").value;
var surname = document.getElementById("lname").value;
var topic = document.getElementById("topic").value;
var question=document.getElementById("subject").value;


localStorage.setItem("fname",name);
localStorage.setItem("lname",surname);
sessionStorage.setItem("topic",topic);
sessionStorage.setItem("subject",question);



}

function StorageRemove(){
    localStorage.removeItem("fname");
    localStorage.removeItem("lname");
    sessionStorage.removeItem("topic");
    sessionStorage.removeItem("subject");

}

function LoadForm(){
    var name=localStorage.getItem("fname");
    var surname=localStorage.getItem("lname");
    var topic=sessionStorage.getItem("topic");
    var question=sessionStorage.getItem("subject");

    if(name)
    {
        document.getElementById("fname").value=name;
        document.getElementById("localstoragehello").innerHTML=("<h1>Witaj, " + name +"!</h1>");
    }
    if(surname)
    document.getElementById("lname").value=surname;

    if(topic)
    document.getElementById("topic").value=topic;
    if(question)
    document.getElementById("subject").value=question;

}
