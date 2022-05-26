<?php require 'includes/general_head.inc.php'?>
<link rel="stylesheet" href="/static/style/contactstyle.css">
<script src="/static/scripts/form.js"></script>
    </head>
   <body onload="LoadForm();">
   <?php require 'includes/profile-bar.inc.php';
        include 'includes/nav.inc.php';?>

<div class="container">
            <div id="localstoragehello">
            <h1>Witaj!</h1>
            </div>
            <h4>SKONTAKTUJ SIĘ ZE MNĄ</h4>  
            
            <div id="contactform">
                <form action ="submit.php">

                    <label for="fname">Imię</label><br>
                    <input type="text" id="fname" name="firstname" placeholder="Your name.." minlength="3" maxlength="11"><br>
                
                    <label for="lname">Nazwisko</label><br>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name.." minlength="3"><br>

                
                    <label for="topic">Temat</label><br>
                    <textarea   id="topic" name="topic" placeholder="Temat (maksymalnie 50 znaków)" style="height:50px; resize: none;" maxlength="50"></textarea>
                   <br> <label for="subject">Pytanie</label><br>
                    <textarea   id="subject" name="subject" placeholder="Pytanie" style="height:200px"></textarea>
                    <div id="buttons">
                    <input type="submit" value="Wyślij" onclick="StorageCreate();">
                    <input type="reset" value="Reset" onclick="StorageRemove();">
                    </div>
                
                  </form>
            </div>
        </div>
        <footer>
            <span>Copyright &copy; Tomasz Krezymon 2021</span>
            <h4><a href="contact">Kontakt</a></h4>
        </footer>
        </body>