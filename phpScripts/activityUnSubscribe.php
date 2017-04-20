<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

$userId = $_SESSION['user_id'];
$activityId = $_GET['id_activity'];

$addSuggestionQuery = singleton::getInstance()->prepare("DELETE FROM user_subscribe WHERE pk_id_user = $userId AND pk_id_activity = $activityId");
$addSuggestionQuery->execute();

header('location: ../home.php#activities');