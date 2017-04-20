<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

if(isset($_POST['comment'], $_POST['id_picture']) AND !empty($_POST['comment']) AND !empty($_POST['id_picture']))
{
    $comment = $_POST['comment'];
    $id_picture = $_POST['id_picture'];
    $user_id = $_SESSION['user_id'];

    $CommentPictureQuery = singleton::getInstance()->prepare("INSERT INTO comment (content, pk_id_user, pk_id_picture) 
                                                      VALUES ('$comment', '$user_id', '$id_picture')");
    $CommentPictureQuery->execute();
}

header('location: ../activities.php#events');