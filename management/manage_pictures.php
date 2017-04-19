<?php
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
               // downloadPictures($file);
                break;
            case 'rmpics':
                deletePictures();
        }
    }
}

function downloadPictures($file)
{
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
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
    }
}

function deletePictures()
{

}