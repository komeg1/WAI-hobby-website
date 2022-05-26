<?php
use MongoDB\BSON\ObjectID;

function galleryDatabase($get,$userInfo){
    $db =get_db();
    if(isset($get['page']))
        $page = $get['page'];
    else
        $page = 1;
    $query = [
        'isPublic' =>'yes',
            ];
    $count = $db->gallery->count($query);
    if(isset($userInfo['isLogged'])&&$userInfo['isLogged']==='yes')
            {
                $query=
                [
                    'isPublic' => 'no',
                    'userID' => new ObjectId($userInfo['userID']),
                ];
            $count += $db->gallery->count($query);
            }
    if($count)
    {
        $limit =3;
        $from = $page*$limit-$limit+1;
        $pages = ceil($count/$limit);
        $opts = [
        'skip' =>   $from-1,
        'limit' => $limit,
        ];
        if(isset($userInfo['isLogged'])&&$userInfo['isLogged']==='yes')
        {
            $query=
            [
                '$or' => [
                ['isPublic' => 'yes'],
                ['userID' => new ObjectId($userInfo['userID'])],
                        ]
            ];
        }
        else
        {
            $query = [
                'isPublic' =>'yes',
            ];
        }

    $gallery =[
        'images' =>$db->gallery->find($query,$opts),
        'pages' => $pages,
        'currentPage' => $page,

    ];
    return $gallery;
    }
    else
    return 0;
    
}

function sessionGalleryDatabase($get,$userInfo){
    $db =get_db();
    if(isset($get['page']))
        $page = $get['page'];
    else
        $page = 1;
    if(isset($userInfo['savedIMG'])&&count($userInfo['savedIMG']))
    {
    $count = count($userInfo['savedIMG']);
    if($count)
    {
        $limit = 3;
        $from = $page*$limit-$limit+1;
        $pages = ceil($count/$limit);
    }
        $opts = [
            'skip' =>   $from-1,
            'limit' => $limit,
            ];
            
        $query = [
                'stored' =>'yes',
                ];
    
        $gallery =[
            'images' =>$db->gallery->find($query,$opts),
            'pages' => $pages,
            'currentPage' => $page,
    
        ];
        return $gallery;
    }
   
}

function saveImages(&$userInput,&$userInfo){
    if(isset($userInput['savedImages']))
    {
        $db = get_db();
        foreach($userInput['savedImages'] as $save)
        {
                $userInfo['savedIMG'][$save]=true;
                $query = ['_id'=> new ObjectId($save)];
                $image =$db->gallery->findOne($query);
                $image['stored']='yes';
                $db->gallery->replaceOne($query, $image);
            
        }
    }
        header('Location: gallery');
    
}

function deleteImageFromSession(&$userInfo){
$db = get_db();
foreach($_POST['savedImages'] as $save)
{
        unset($userInfo['savedIMG'][$save]);
        $query = ['_id'=> new ObjectId($save)];
        $image =$db->gallery->findOne($query);
        $image['stored']='no';
        $db->gallery->replaceOne($query, $image);
    
}
}


function clearImageSession(){
    $db =get_db();
    $query =['stored' => ['$regex' => 'yes']];
    $reset = ['stored' => 'no'];
    $db->gallery->updateMany($query,['$set' => $reset]);
    

}

function browserFunction($request,$userInfo){
    $db = get_db();
    $q = $request;
    if(isset($userInfo['userID']))
      $query=
     [
        '$or' => [
            ['isPublic' =>'yes'],
            ['userID' => new ObjectId($userInfo['userID'])],
        ],
       'title' => ['$regex' => $q],
       
     ];
     else
     $query=
     [
        'isPublic' =>'yes',
       'title' => ['$regex' => $q],
     ];
     if(!$db->gallery->count($query))
     $match =0;
     else
     $match = $db->gallery->find($query);
     return $match;
    }