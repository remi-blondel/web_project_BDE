<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

$get = $_GET['file'];

$file = dirname(dirname(__FILE__) ). '/'.$get;
echo $file;
if(!empty($_POST) || !empty($_GET))
{
    if(isset($_REQUEST['action']) && !empty($_REQUEST['action']))
    {
        $type = $_REQUEST['action'];
        switch($type)
        {
            case 'dlpics':
               downloadPictures($file);
                break;
            case 'rmpics':
                deletePictures();
        }
    }
}

function downloadPictures($file)
{

    /*$finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file);

    if (file_exists($file))
    {
        header('Content-Description: File Transfer');
        header('Content-Type: ' . $mime);
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }*/
}

function deletePictures()
{
    $picture_id = $_GET['img_id'];

    $deleteUpVotesQuery = singleton::getInstance()->prepare("DELETE FROM user_like WHERE pk_id_picture = $picture_id");
    $deleteUpVotesQuery->execute();

    $deleteCommentsQuery = singleton::getInstance()->prepare("DELETE FROM comment WHERE pk_id_picture = $picture_id");
    $deleteCommentsQuery->execute();

    $deletePictureQuery = singleton::getInstance()->prepare("DELETE FROM picture WHERE pk_id_picture = $picture_id");
    $deletePictureQuery->execute();
    header('location: ../staff.php');
}