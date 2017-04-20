<?php
require_once 'model/activitiesData.php';
$activitiesData = new activitiesData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activities</title>
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
        <div class="container-fluid containerlevel1" id="events">
            <div class="row">
                <h2>Latest Events</h2>
            </div>
            <div class="row vertical-align panel-body">
                <div class="col-xs-12 col-sm-3"><BR>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input class="form-control" id="date" name="datevent" placeholder="DD/MM/YYYY" type="text"/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3"><BR>
                    <select class="select form-control" id="eventselect" name="eventselect">
                        <option value="rolagame">
                            Role Game
                        </option>
                        <option value="football">
                            Football
                        </option>
                        <option value="lan">
                            Lan Party
                        </option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-3"><BR>
                    <select class="select form-control" id="placeselect" name="placeselect">
                        <option value="exia">
                            Exia
                        </option>
                        <option value="umove">
                            U-Move
                        </option>
                        <option value="downtown">
                            City Center
                        </option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-3"><BR>
                    <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                </div>
            </div>
            <div class="row vertical-align">
                <?php foreach ($activitiesData->getActivityPictures() as $activityPicture):?>
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="thumbnail">
                            <img src="pictures/<?=$activityPicture->path?>" class="img-responsive img-center auto-resize" alt="icon"><BR>
                            <div class="caption">
                                <div class="row">
                                    <div class="col-xs-4 col-lg-4">
                                        <?php if(!$activitiesData->checkIfUserHasAlreadyLiked($_SESSION['user_id'], $activityPicture)): { ?>
                                        <a href="phpScripts/activityPictureUpVote.php?user_id=<?= $_SESSION['user_id']?>&id_picture=<?= $activityPicture->pk_id_picture?>" class="btn btn-default btn-responsive up_button"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                                        <?php } elseif($activitiesData->checkIfUserHasAlreadyLiked($_SESSION['user_id'], $activityPicture)): {?>
                                        <a href="phpScripts/activityPictureCancelVote.php?user_id=<?= $_SESSION['user_id']?>&id_picture=<?= $activityPicture->pk_id_picture?>" class="btn btn-success btn-responsive up_button"><span class="glyphicon glyphicon-thumbs-up"></span></a><?php }endif;?>
                                        <span class="badge btn-responsive up_votes"><?=$activitiesData->getNumberVoteByPictureId($activityPicture->pk_id_picture)->nbrVote?></span>
                                    </div>
                                    <div class="col-xs-8 col-lg-8">
                                        <form method="post" action="phpScripts/commentPicture.php">
                                            <div class="col-xs-10 col-lg-10"><input name="comment" type="text" class="form-control" placeholder="Comment..."></div>
                                            <input type="hidden" name="id_picture" class="form-control" value="<?=$activityPicture->pk_id_picture?>">
                                            <div class="col-xs-2 col-lg-2"><input class="btn btn-success" type="submit" value="→"/></div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row img-center">
                                    <?php foreach($activitiesData->getCommentsByPictureId($activityPicture) as $comment):?>
                                    <BR><div class="col-xs-2 col-lg-2"><img src="authentication/Avatarpics/<?=($activitiesData->getProfilePicByUserId($comment->pk_id_user))->user_img?>" class="img-responsive auto-resize thumbnail" alt="icon"></div>
                                    <div class="col-xs-10 col-lg-10"><div class="well well-sm">
                                            <?php if($comment->pk_id_user == $_SESSION['user_id'] OR $_SESSION['role'] == "staff"): { ?><a href="phpScripts/deleteComment.php?comment_id=<?=$comment->pk_id_comment?>" class="btn btn-danger"><span><i class="fa fa-window-close" aria-hidden="true"></i></span></a> <?php }endif; ?>
                                            <p><?=$comment->content?></p>
                                        </div></div>
                                    <?php endforeach?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>

        <div class="container-fluid containerlevel1" id="upload">
            <div class="row">
                <h2>Upload a Picture</h2>
            </div>
            <div class="row">
                <div class="row vertical-align panel-body">
                    <form method="post" action="phpScripts/activityPictureForm.php" enctype="multipart/form-data">
                        <div class="col-xs-12 col-sm-2">
                            <label>Select the date</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input class="form-control" id="date" name="suggestiondate" placeholder="DD/MM/YYYY" type="text"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <label>Select the activity</label>
                            <select class="select form-control" id="eventselect" name="eventselect">
                                <option value="rolagame">
                                    Role Game
                                </option>
                                <option value="football">
                                    Football
                                </option>
                                <option value="lan">
                                    Lan Party
                                </option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <label>Select the place</label>
                            <select class="select form-control" id="placeselect" name="placeselect">
                                <option value="exia">
                                    Exia
                                </option>
                                <option value="umove">
                                    U-Move
                                </option>
                                <option value="downtown">
                                    City Center
                                </option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <input type="file" name="activity_picture">
                            <input class="btn btn-success" type="submit" value="Submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>