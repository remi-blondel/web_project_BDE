<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

if(isset($_GET['suggestion_id']) AND !empty($_GET['suggestion_id']))
{
    $suggestion_id = $_GET['suggestion_id'];

    var_dump($suggestion_id);

    $deleteSuggestionVotesQuery = singleton::getInstance()->prepare("DELETE FROM user_vote WHERE pk_id_suggestion = '$suggestion_id'");
    $deleteSuggestionVotesQuery->execute();

    $deleteSuggestionQuery = singleton::getInstance()->prepare("DELETE FROM suggestion WHERE pk_id_suggestion = '$suggestion_id'");
    $deleteSuggestionQuery->execute();
}

header('location: ../bde.php');