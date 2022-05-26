<div id="profile-bar">
    <?php if(isset($_SESSION['isLogged'])&&$_SESSION['isLogged']==='yes'):?>
        <div><span>Użytkownik: <?=$_SESSION['email']?></span></div>
        <div><a href="profile">Profil</a></div>
        <div><a href="gallery">Galeria</a></div>
        <div><a href="session_gallery">Zapisane zdjęcia</a></div>
        <div><a href="browser">Wyszukiwarka</a></div>
        <div><span><a href="logout">Wyloguj się</a> </span></div>
    <?php else:?>
        <div><span><a href="login">Zaloguj się</a></span></div>
        <div><a href="gallery">Galeria</a></div>
        <div><a href="session_gallery">Zapisane zdjęcia</a></div>
        <div><a href="browser">Wyszukiwarka</a></div>
        <div><span><a href="register">Zarejestruj się</a></span></div>
    <?php endif?>
</div>