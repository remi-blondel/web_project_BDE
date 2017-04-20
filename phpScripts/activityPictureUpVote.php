<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

if(isset($_GET['user_id'], $_GET['id_picture']) AND !empty($_GET['user_id']) AND !empty($_GET['id_picture']))
{
    $user_id = $_GET['user_id'];
    $id_picture = $_GET['id_picture'];

    $upVoteQuery = singleton::getInstance()->prepare("INSERT INTO user_like (pk_id_user, pk_id_picture) 
                                                      VALUES ('$user_id', '$id_picture')");
    $upVoteQuery->execute();
}

header('location: ../activities.php#events');