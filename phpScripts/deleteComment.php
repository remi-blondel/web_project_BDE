<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

if(isset($_GET['comment_id']) AND !empty($_GET['comment_id']))
{
    $comment_id = $_GET['comment_id'];

    var_dump($comment_id);

    $deleteCommentQuery = singleton::getInstance()->prepare("DELETE FROM comment WHERE pk_id_comment = $comment_id");
    $deleteCommentQuery->execute();
}

header('location: ../activities.php#events');