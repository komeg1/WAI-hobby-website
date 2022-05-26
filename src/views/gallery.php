<?php require 'includes/general_head.inc.php'?>
<link rel="stylesheet" href="static/style/gallerystyle.css">
</head>
<body>
<?php include 'includes/profile-bar.inc.php'?>
<nav>
        <div class = "logo">
            <a href="index"><h1>rockets</h1> <h2>world</h2></a>
        </div>
        
</nav>
<div id="galleryContainer">
 
    <div id="title">
        <h3>Galeria</h3>
        <a href="upload"><p>Udostępnij zdjęcie</p></a>
    </div>
    <?php if($gallery['pages']): ?>
    <form method="post" id="imgsaving" action="sessionImageSave">
    <div id="imageGallery">
    <?php foreach($gallery['images'] as $zdjecie): ?>
    <div class="galleryImage">
        <a href="images/watermark-<?= $zdjecie['src']?>"><img src="images/thumbnail-<?=$zdjecie['src']?>"></a>
        <div>
            <p><b>TYTUŁ:</b> <i>"<?= $zdjecie['title']?>"</i></p>
            <p><b>AUTOR:</b> <i><?= $zdjecie['author']?></i></p>
            <p><b>ZAPISZ</b><input type="checkbox" id="imgsaving" name="savedImages[]" value=<?=$zdjecie['_id']?>
            <?php if(isset($_SESSION['savedIMG'][$zdjecie['_id']->__toString()])&&$_SESSION['savedIMG'][$zdjecie['_id']->__toString()]==true):?>
            checked
            <?php endif?>
            ></p>
            <?php if(isset($_SESSION['isLogged'])&&$_SESSION['isLogged']==='yes'):?>
                <?php if($zdjecie['isPublic']==='no'):?>
                    <p class="isPrivate"><b>ZDJĘCIE PRYWATNE</b></p>
                <?php endif?>
            <?php endif?>
        </div>
        </div>
        <?php endforeach ?>
    </div>
    <div class="pages">
    <?php for($i =1;$i<=$gallery['pages'];$i++): ?>
    <a <?php if($i==$gallery['currentPage']) echo 'style="background-color: #0f00dd; color:white;"'?> href="gallery?page=<?=$i?>"><?=$i?></a>
    <?php endfor?>
</div>
<input type="submit" id="imgsaving" value="Zapisz zdjęcia"/>
</form>
<?php else: ?>
    <h3>Brak zdjęć w galerii</h3>
<?php endif?>
</div>
<footer>
        <span>Copyright &copy; Tomasz Krezymon 2021</span>
        <h4><a href="contact">Kontakt</a></h4>
    </footer>
</body>
</html>
