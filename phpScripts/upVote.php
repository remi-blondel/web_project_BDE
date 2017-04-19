<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

if(isset($_GET['user_id'], $_GET['id_suggestion'], $_GET['dateTimeNbr']) AND !empty($_GET['user_id']) AND !empty($_GET['id_suggestion']) AND !empty($_GET['dateTimeNbr']))
{
    $user_id = $_GET['user_id'];
    $id_suggestion = $_GET['id_suggestion'];
    $dateTimeNbr = $_GET['dateTimeNbr'];

    $upVoteQuery = singleton::getInstance()->prepare("INSERT INTO user_vote (choice_datetime$dateTimeNbr, pk_id_user, pk_id_suggestion) 
                                                      VALUES ('1', '$user_id', '$id_suggestion')
                                                      ON DUPLICATE KEY UPDATE choice_datetime$dateTimeNbr=1");
    $upVoteQuery->execute();
}

header('location: ../home.php#suggestions');