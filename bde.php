<?php
if($_SESSION['role']!='bde' OR !isset($_SESSION['role']) OR empty($_SESSION['role']))
{
    header("HTTP/1.1 403 Forbidden");  // header "interdit"
    header("Refresh:1;url=home.php"); // redirection vers "login.php" dans 5 secondes
    die();
}
require_once 'model/bdeData.php';
$bdeData = new bdeData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BDE</title>
    <link rel="shortcut icon" href="pictures/exia.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<header>
    <?php include_once("navbar.php") ?>
</header>

<div id="allcontent">
    <div class="container-fluid containerlevel1">
        <div class="row">
            <h2>News</h2>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <tr>
                    <th>Title</th>
                    <th>Picture</th>
                    <th>Text</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($bdeData->getNews() as $new):?>
                    <tr>
                        <td><?= $new->title?></td>
                        <td><img src="pictures/<?= $new->img_path?>" class="img-thumbnail img-responsive img-center auto-resize" alt="icon"></td>
                        <td><?=$new->content;?></td>
                        <td><a class='btn btn-default glyphicon glyphicon-edit' role='button' href="editNews.php"></a></td>
                        <td><a class='btn btn-default glyphicon glyphicon-remove' role='button' href='#'></a></td>
                    </tr>
                <?php endforeach?>
            </table>
            <a class="btn btn-default" href="addNews.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add a News</a>
        </div>
    </div>
    <div class="container-fluid containerlevel1">
        <div class="row">
            <h2>Suggestions</h2>
        </div>
        <div class="row">
            <table class="table table-hover table-striped">
                <tr>
                    <th>Title</th>
                    <th>Poster</th>
                    <th>Main Date</th>
                    <th>Place</th>
                    <th>Number of Votes</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($bdeData->getSuggestions() as $suggestion):?>
                <tr>
                    <td><?= $suggestion->name?></td>
                    <td><?=$suggestion->firstname?> <?=$suggestion->lastname?></td>
                    <td><?= $bdeData->getMainDateTimeSuggestion($suggestion)?></td>
                    <td><?=$suggestion->place?></td>
                    <td><?=$bdeData->getMainDateTimeVoteNbrSuggestion($suggestion)?></td>
                    <td><button type="button" class="btn btn-warning disabled"><i class="fa fa-spinner" aria-hidden="true"></i></i> Pending</button></td>
                    <td><button id="btnformactivity" class="btn btn-success text-center"><i class="fa fa-check" aria-hidden="true"></i> Approve</button></td>
                    <td><button type="button" class="btn btn-danger text-center"><i class="fa fa-minus-circle" aria-hidden="true"></i></i> Dismiss</button></td>
                </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>
</div>

</body>
</html>