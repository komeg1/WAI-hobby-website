<?php require 'includes/general_head.inc.php'?>
    <title>Rejestracja</title>
    <link rel="stylesheet" href="static/style/registerstyle.css">
    
</head>
<body>
<?php if(isset($_GET['registered'])&&$_GET['registered']=='success') {$regResult = 0;}?>
<?php include 'includes/profile-bar.inc.php'?>
<nav>
        <div class = "logo">
            <a href="index"><h1>rockets</h1> <h2>world</h2></a>
        </div>
</div>

</nav>
    <form action="register" method="post" enctype="multipart/form-data">
    <h3>Rejestracja</h3>
    E-mail:
    <input type="email" name="email" id="nameId"> <br>
    Hasło:
    <input type="password" name="password" id="passwordId"> <br>
    Powtórz hasło:
    <input type="password" name="repassword" id="repasswordId"> <br>
    <div id="buttonCenter">
    <input type="submit" value="Register" name="submit">
    </div>
    <?php 
    if(isset($regResult)) {
        switch ($regResult) {
            case 0:
                echo "<p style=color:green;>Poprawnie zarejestrowano!</p>";
            break;
            case 1:
                 echo "<p style=color:red;>Hasła nie są takie same!</p>";
            break;
            case 2:
                 echo "<p style=color:red;>Użytkownik o takim e-mailu już istnieje!</p>";
            break;
            case 3:
                echo "<p style=color:red;>Pole e-mail jest puste!</p>";
            break;
            case 4:
                echo "<p style=color:red;>Pole hasło jest puste!</p>";
            break;
    }
}
    ?>
    <br>
<div id="haveAcc">Już zarejestrowany? <a href="login">Zaloguj się </a></div>
</form>
<footer id="loginFooter">
            <span>Copyright &copy; Tomasz Krezymon 2021</span>
            <h4><a href="contact">Kontakt</a></h4>
</footer>
</body>
</html>
