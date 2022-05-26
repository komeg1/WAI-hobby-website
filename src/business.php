<?php
function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}
function clearDbState() {
    $db = get_db();
    $db->user->deleteMany(['email' => ['$regex' => '']]);
}
function createUser($userInputArr){

    if($userInputArr['email']==='')
    return 3;
    if($userInputArr['password']===''||$userInputArr['repassword']==='')
    return 4;
    if(!($userInputArr['repassword']===$userInputArr['password']))
         return 1;
         $password = $userInputArr['password'];
         $hash = password_hash($password,PASSWORD_DEFAULT);
            $db = get_db();
            
            $account=[
                'email' => $userInputArr['email'],
                'password' => $hash,
            ];
            
            $current = CheckIfExist($userInputArr['email']);

            if($current ===NULL)
            {
                $db->user->insertOne($account);
                return 0;
            }
            else
                return 2;
         }


function CheckIfExist($email)
{
    $db=get_db();
    return $db->user->findOne(['email'=>$email]);
}

function verifyLogin($userInputArr){
    if(!CheckIfExist($userInputArr['email']))
        return 1;

    $db=get_db();
    $user = $db->user->findOne(['email'=>$userInputArr['email']]);
    if(!password_verify($userInputArr['password'],$user['password']))
        return 2;
    
    session_regenerate_id();
    $_SESSION['isLogged']='yes';
    $_SESSION['userID']=$user['_id'];
    $_SESSION['email']=$user['email'];
    return 'profile';
}

function addImageToDB($fileName,$userInput,$userInfo,$dir)
{
    $db = get_db();
    $image=[
        'src' => $fileName,
        'author' =>$userInput['author'],
        'title'=>$userInput['title'],
        'userID'=> (isset($userInfo['userID'])?$userInfo['userID']:$userInput['author']),
        'isPublic'=> (isset($userInfo['userID'])?$userInput['accessToPicture']:'yes'),
        'stored' => 'no',
    ];
    $db->gallery->insertOne($image);
}
function clearGalleryDB(&$userInfo){
    $db = get_db();
    unset($userInfo['savedIMG']);
    $db->gallery->deleteMany(['src' => ['$regex' => '']]);
    $files = glob($_SERVER['DOCUMENT_ROOT'].'/images/*.*'); 
    foreach($files as $file){ 
     if(is_file($file)) {
         unlink($file); 
  }
}

}
