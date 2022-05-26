<?php require 'includes/general_head.inc.php'?>
    <title>Profil</title>
    <link rel="stylesheet" href="static/style/profilestyle.css">
</head>
<body>
<?php include 'includes/profile-bar.inc.php'?>
<nav>
        <div class = "logo">
            <a href="index"><h1>rockets</h1> <h2>world</h2></a>
        </div>
</nav>
<div class="container">
<h3>Witaj <?php echo $_SESSION['email']?><br></h3>
    <div id="profileInformation">
        <h2>Informacje</h2>
        Twoje ID: <?php echo $_SESSION['userID']?><br>
        <?php if($_SESSION['email']==='admin@gmail.com'):?>
        <a href="clearDB"><b>Wyczyść bazę użytkowników</b></a><br>
        <a href="clearGallery"><b>Wyczyść galerię</b></a><br>
        <?php endif?>
        <a href="logout">Wyloguj się</a><br><br><br>
        <a href="gallery">Galeria</a>
        <a href="session_gallery">Zapisane zdjęcia</a>
    </div>
</div>
<footer>
        <span>Copyright &copy; Tomasz Krezymon 2021</span>
        <h4><a href="contact">Kontakt</a></h4>
    </footer>
</body>
</html>
