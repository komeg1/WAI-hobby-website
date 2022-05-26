
<?php if(isset($match)):?>
   
<?php foreach($match as $image): ?>
     <div>
     <div><a href=images/watermark-<?=$image['src']?>><img src=images/thumbnail-<?=$image['src']?>></a></div>
     <p><b>TYTUŁ:</b> <i>"<?= $image['title']?>"</i></p>
     <p><b>AUTOR:</b> <i><?= $image['author']?></i></p>
     <?php if(isset($_SESSION['isLogged'])&&$_SESSION['isLogged']==='yes'):?>
                <?php if($image['isPublic']==='no'):?>
                    <p class="isPrivate"><b>ZDJĘCIE PRYWATNE</b></p>
                <?php endif?>
                <?php endif?>
     </div>
<?php endforeach?>
<?php else:?>
<p>Brak pasujących wyników</p>
<?php endif?>
    
