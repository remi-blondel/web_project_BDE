<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

$userId = $_SESSION['user_id'];
$activityId = $_GET['id_activity'];

$addSuggestionQuery = singleton::getInstance()->prepare("INSERT INTO user_subscribe (pk_id_user, pk_id_activity)
                                                        VALUES ($userId, $activityId)");

$addSuggestionQuery->execute();

header('location: ../home.php#activities');