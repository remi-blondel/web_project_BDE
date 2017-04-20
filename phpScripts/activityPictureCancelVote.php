<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

if(isset($_GET['user_id'], $_GET['id_picture']) AND !empty($_GET['user_id']) AND !empty($_GET['id_picture']))
{
    $user_id = $_GET['user_id'];
    $id_picture = $_GET['id_picture'];

    var_dump($id_picture);
    var_dump($user_id);

    $CancelVoteQuery = singleton::getInstance()->prepare("DELETE FROM user_like WHERE pk_id_user = $user_id AND pk_id_picture = $id_picture");
    $CancelVoteQuery->execute();
}

header('location: ../activities.php#events');