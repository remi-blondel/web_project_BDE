<?php

require_once '../database/singleton.php';
require_once '../database/config.php';

$activityTitle = $_POST['activity_title'];
$description = $_POST['description'];
$location = $_POST['location'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$date3 = $_POST['date3'];
$time1 = $_POST['time1'];
$time2 = $_POST['time2'];
$time3 = $_POST['time3'];
$user = $_SESSION['user_id'];

$datetime1 = $date1 . " " . $time1 . ":00";
$datetime2 = $date2 . " " . $time2 . ":00";
$datetime3 = $date3 . " " . $time3 . ":00";

//var_dump($activityTitle, $location, $description, $datetime1, $datetime2, $datetime3, $user);

$addSuggestionQuery = singleton::getInstance()->prepare("INSERT INTO suggestion (name, place, content, state, datetime1, datetime2, datetime3, pk_id_user)
                                                        VALUES ('activity', 'arras', 'description', 'pending', '2017-04-04 10:30:00', '2017-04-04 10:30:00', '2017-04-04 10:30:00', '1')");
                                                        //VALUES ('$activityTitle', '$location', '$description', 'pending', '$datetime1', '$datetime2', '$datetime3', '$user')");
$addSuggestionQuery->execute();

//header('location: ../home.php#suggestions');