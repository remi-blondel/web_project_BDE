<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

if(isset($_FILES['activity_picture']))
{
    $userId = $_SESSION['user_id'];
    $fileInfo = pathinfo($_FILES['activity_picture']['name']);
    $extension_upload = $fileInfo['extension'];
    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    echo $userId;

    if (in_array($extension_upload, $allowed))
    {
        $picture_new_name = uniqid('', true) . '.' . $extension_upload;
        move_uploaded_file($_FILES['activity_picture']['tmp_name'], '../pictures/' . $picture_new_name);

        $updateDbQuery = singleton::getInstance()->prepare("INSERT INTO picture (path, pk_id_user) VALUE ('$picture_new_name', '$userId')");
        $updateDbQuery->execute();
    }
}

header('location: ../activities.php#upload');

/*$picture = $_FILES['activity_picture'];

$picture_name = $picture['name'];
$picture_name = $picture['tmp_name'];
$picture_size = $picture['size'];
$picture_error = $picture['error'];

echo pathinfo($_FILES['activity_picture']['name']);

$picture_extension = explode('.', $picture_name);
$picture_extension = strtolower(end($picture_extension));

$allowed = array('jpg', 'jpeg', 'png', 'gif');

echo $picture_extension;

if(in_array($picture_extension, $allowed))
{
    if($picture_error === 0)
    {
        if($picture_size <= 2097152)
        {
            $picture_new_name = uniqid('', true) . '.' . $picture_extension;
            $picture_destination = 'uploads/'.$picture_new_name;

            if(move_uploaded_file($picture_name, $picture_destination))
            {
                echo $picture_destination;
            }
        }
    }
}*/