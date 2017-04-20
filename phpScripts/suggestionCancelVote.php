<?php

require_once '../database/singleton.php';
require_once '../database/config.php';

if(isset($_GET['user_id'], $_GET['id_suggestion'], $_GET['dateTimeNbr']) AND !empty($_GET['user_id']) AND !empty($_GET['id_suggestion']) AND !empty($_GET['dateTimeNbr']))
{
    $user_id = $_GET['user_id'];
    $id_suggestion = $_GET['id_suggestion'];
    $dateTimeNbr = $_GET['dateTimeNbr'];

    $upVoteQuery = singleton::getInstance()->prepare("UPDATE user_vote SET choice_datetime$dateTimeNbr = NULL WHERE pk_id_user = $user_id AND pk_id_suggestion = $id_suggestion AND choice_datetime$dateTimeNbr = 1");

    $upVoteQuery->execute();
}

header('location: ../home.php#suggestions');