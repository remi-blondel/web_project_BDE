<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

if(isset($_GET['suggestion_id'], $_GET['suggestion_name'], $_GET['suggestion_place'], $_GET['suggestion_content'])
    AND !empty($_GET['suggestion_id']) AND !empty($_GET['suggestion_name']) AND !empty($_GET['suggestion_place']) AND !empty($_GET['suggestion_content']))
{
    $suggestion_id = $_GET['suggestion_id'];
    $activity_name = $_GET['suggestion_name'];
    $activity_place = $_GET['suggestion_place'];
    $activity_content = $_GET['suggestion_content'];
    $activity_dateTime = $_GET['suggestion_mainDateTime'];

    $convertToActivityQuery = singleton::getInstance()->prepare("INSERT INTO activity (name, place, datetime, description) 
                                                      VALUES ('$activity_name', '$activity_place', '$activity_dateTime', '$activity_content')");
    $convertToActivityQuery->execute();

    $deleteSuggestionVotesQuery = singleton::getInstance()->prepare("DELETE FROM user_vote WHERE pk_id_suggestion = '$suggestion_id'");
    $deleteSuggestionVotesQuery->execute();

    $deleteSuggestionQuery = singleton::getInstance()->prepare("DELETE FROM suggestion WHERE pk_id_suggestion = '$suggestion_id'");
    $deleteSuggestionQuery->execute();
}

header('location: ../bde.php');