<?php
require_once 'business.php';

function index()
{
    return 'index';
}
function agency()
{
    return 'agency';
}
function history()
{
    return 'history';
}
function contact()
{
    return 'contact';
}
function browser(){
    return 'browser';
}
function browserBusiness(&$model){
    $match = browserFunction($_REQUEST['q'],$_SESSION);
    if($match!==0)
    $model['match']=$match;
    return 'browserBusiness-view';
}
function session_gallery(&$model){
    $gallery= sessionGalleryDatabase($_GET,$_SESSION);
    $model['gallery']=$gallery;
     return 'session_gallery';
 }
function gallery(&$model){
   $gallery= galleryDatabase($_GET,$_SESSION);
   $model['gallery']=$gallery;
    return 'gallery';
}
function profile()
{
    if(isset($_SESSION['isLogged'])&&$_SESSION['isLogged']==='yes')
    return 'profile';
    header('Location: login');
}
function login(&$model){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!isset($_SESSION['isLogged']))
        {
           $logResult = verifyLogin($_POST);
           $model['logResult'] = $logResult;
        }
      else if($_SESSION['isLogged'] === 'yes')
     return 'profile';
        }
    if(isset($_SESSION['isLogged'])&&$_SESSION['isLogged'] === 'yes')
    header('Location: profile');
    return 'login';
}

function logout(){
    if(isset($_SESSION['isLogged'])&&$_SESSION['isLogged'] === 'yes')
    {
        clearImageSession();
        session_destroy();
        
    }
    $_SESSION = array();
    header('Location: login');
}



function register(&$model)
{
    if(isset($_SESSION['isLogged'])&&$_SESSION['isLogged']==='yes')
    header('Location: profile');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $regResult = createUser($_POST);
        $model['regResult'] = $regResult;
        if(!$regResult)
        return 'redirect:register?registered=success';
    }
        return 'register';
    
}
function clearGallery(){
    clearGalleryDB($_SESSION);
    return 'profile';
}
function clearDB(){
    clearDbState();
    header('Location: register');
}

function upload(&$model){
    if(isset($_POST['submit'])&&isset($_FILES['picture'])){
        $uploadResult= verifyFile($_FILES,$_POST);
        if(!$uploadResult)
        return 'redirect:upload?uploaded=success';
        $model['uploadResult']=$uploadResult;
    }
    return 'upload';
}

function verifyFile($uploadedFile,$userInput){
    $file = $uploadedFile['picture'];
    $uniqueID = Time();
    $fileName = $uniqueID.$uploadedFile['picture']['name'];
    $acceptableExtensions = array('png','jpg');
    $dir = $_SERVER['DOCUMENT_ROOT'].'/'.'images/';
    
    $target_file = $dir.basename($fileName);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    define('MB', 1048576);

    if(!in_array($extension,$acceptableExtensions)&&($file['size']>1*MB|| $file['error'] == 1))
        return 1;
    if(!in_array($extension,$acceptableExtensions))
        return 2;
    if($file['size']>1*MB|| $file['error'] == 1)
        return 3;
    if(!move_uploaded_file($file['tmp_name'], $target_file))
        return 5;
    
        addWatermark($target_file,$dir,$extension,$fileName,$userInput['watermark']);
        addThumbnail($target_file,$dir,$extension,$fileName);
        addImageToDB($fileName,$userInput,$_SESSION,$dir);
        
    return 0;


}

function addWatermark($imageURL,$dir,$extension,$fileName,$watermarkText)
{
    if($extension==='jpg')
    $image = imagecreatefromjpeg($imageURL);
    else
    $image = imagecreatefrompng($imageURL);
    $red = imagecolorallocate($image, 255, 0, 0);
    imagestring($image, 15, 10, 10, $watermarkText, $red);
    if($extension==='jpg')
    imagejpeg($image,$dir.'watermark-'.$fileName,80);
    else
    imagepng($image,$dir.'watermark-'.$fileName,80);
    imagedestroy($image);
}

function addThumbnail($imageURL,$dir,$extension,$fileName)
{
    if($extension==='jpg')
    $image = imagecreatefromjpeg($imageURL);
    else
    $image = imagecreatefrompng($imageURL);

    $width = imagesx($image);
    $height = imagesy($image);
    $thb_width=200;
    $thb_height = 125;
    $thb_img = imagecreatetruecolor($thb_width,$thb_height);

    imagecopyresampled($thb_img,$image,0,0,0,0,$thb_width,$thb_height,$width,$height);
    if($extension==='jpg')
    imagejpeg($thb_img,$dir.'thumbnail-'.$fileName,100);
    else
    imagepng($thb_img,$dir.'thumbnail-'.$fileName,100);
    imagedestroy($image);
    imagedestroy($thb_img);
}

function sessionImageSave(){
    saveImages($_POST,$_SESSION);
    header ('Location: gallery');
}

function eraseImages(&$model){
    if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['savedImages']))
    deleteImageFromSession($_SESSION);
    header ('Location: session_gallery');
}
