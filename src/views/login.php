<?php require 'includes/general_head.inc.php';?>
    <link rel="stylesheet" href="static/style/registerstyle.css">
</head>
<body>
<?php include 'includes/profile-bar.inc.php'?>
<nav>
        <div class = "logo">
            <a href="index"><h1>rockets</h1> <h2>world</h2></a>
        </div>
        
</div>

</nav>
    <form action="login" method="post" enctype="multipart/form-data">
    <h3>Logowanie</h3>
    E-mail:
    <input type="email" name="email" id="nameId"> <br>
    Hasło:
    <input type="password" name="password" id="passwordId"> <br>
    <div id="buttonCenter">
    <input type="submit" value="Login" name="submit">
</div>
    <?php 
    if(isset($logResult)) {
        switch ($logResult) {
            case 1:
                 echo " <p style=color:red;>Użytkownik nie istnieje!</p>";
            break;
            case 2:
                 echo " <p style=color:red;>Złe hasło!</p>";
            break;
    }
}
    ?>
    <br>
    <div id="haveAcc">
    Nie masz konta? <a href="register">Zarejestruj się </a>
</div>
    </form>
    <footer id="loginFooter">
            <span>Copyright &copy; Tomasz Krezymon 2021</span>
            <h4><a href="contact">Kontakt</a></h4>
</footer>
</body>
</html>
