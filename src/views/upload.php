<?php require 'includes/general_head.inc.php'?>
    <title>Profil</title>
    <link rel='stylesheet' href='static/style/registerstyle.css'>
</head>
<body>
<?php if(isset($_GET['uploaded'])&&$_GET['uploaded']=='success') {$uploadResult = 0;}?>
<?php include 'includes/profile-bar.inc.php'?>
<nav>
        <div class = 'logo'>
            <a href='index'><h1>rockets</h1> <h2>world</h2></a>
        </div>
</nav>


<div>
<form method='post' action='upload' enctype='multipart/form-data'>
<h3>Przeslij zdjecie do galerii:</h3> 
Prześlij zdjęcie:<br><br>
<label for='picture' class='upload-button'>Wstaw zdjęcie</label><br><br>
<input type='file' name ='picture' id='picture' ><br>
Znak wodny:* 
<input type='text' name='watermark' id='watermark' required><br>
Autor: 
<input type='text' name='author' id ='author' <?php echo 'value='.(isset($_SESSION['isLogged'])&&$_SESSION['isLogged']==='yes' ? $_SESSION['email'] : '') ?>><br>
Tytuł: 
<input type='text' name='title' id='title'><br>
<?php if(isset($_SESSION['isLogged'])&&$_SESSION['isLogged']==='yes'):?>
Widoczność zdjęcia: <br>
Publiczne: <input type='radio' id='public' name='accessToPicture' value='yes'>
 Prywatne: <input type='radio' id='private' name='accessToPicture' value='no'>
<?php endif?>
<div id='buttonCenter'>
<input type='submit' value='Wyślij' name='submit'>
</div>
<?php 
    if(isset($uploadResult)) {
        switch ($uploadResult) {
            case 0:
                echo '<p style=color:green;>Zdjęcie zostało zapisane w galerii!</p>';
           break;
            case 1:
                 echo '<p style=color:red;>Plik jest za duży i posiada złe rozszerzenie!</p>';
            break;
            case 2:
                 echo '<p style=color:red;>Plik nie jest typu ".jpg" lub ".png"!</p>';
            break;
            case 3:
                echo '<p style=color:red;>Plik jest za duży!</p>';
            break;
            case 4:
                echo ' <p style=color:red;>Problem z zapisaniem zdjęcia po stronie serwera!</p>';
            break;
    }
}
    ?>
</form>
</div>
<footer>
        <span>Copyright &copy; Tomasz Krezymon 2021</span>
        <h4><a href='contact'>Kontakt</a></h4>
    </footer>
</body>
</html>