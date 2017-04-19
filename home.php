<?php
require_once 'model/homeData.php';
$homeData = new homeData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="pictures/exia.ico"/>
    <title>Home</title>
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
        <div class="container-fluid containerlevel1" id="news">
            <div class="row">
                <img class="img-center auto-resize img-responsive" src="pictures/newspaper.png"><h2>News</h2>
            </div>
            <div class="row vertical-align panel-body">
                <?php foreach ($homeData->getNews() as $new):?>
                    <div class="col-xs-12 col-sm-3 col-lg-2">
                        <img src="pictures/<?=$new->img_path;?>" class="img-thumbnail img-responsive img-center auto-resize" alt="icon">
                    </div>
                    <div class="col-xs-12 col-sm-9 col-lg-4 singlenews">
                        <h4 class="text22">
                            <span><?=$new->title;?></span>
                        </h4>
                        <p class="text18 justified">
                            <?=$new->content;?>
                        </p>
                    </div>
                <?php endforeach?>
            </div>
        </div>

        <div class="container-fluid containerlevel1" id="events">
            <div class="row">
                <img class="img-center auto-resize img-responsive" src="pictures/calendar.png"><h2>Latest Events</h2>
            </div>
            <div class="row">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive img-center auto-resize" src="pictures/<?=$homeData->getActivitiesPicture(1)->path?>" alt="...">
                        </div>
                        <?php foreach ($homeData->getActivitiesPictures() as $activityPicture):?>
                            <div class="item">
                                <img class="img-responsive img-center auto-resize" src="pictures/<?=$activityPicture->path?>" alt="...">
                            </div>
                        <?php endforeach?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                <a href="activities.php"><button class="btn carouselbtn"><i class="fa fa-share" aria-hidden="true"></i> View More</button></a>
            </div>
        </div>

        <div class="container-fluid containerlevel1" id="activities">
            <div class="row">
                <img class="img-center auto-resize img-responsive" src="pictures/football.png"><h2>Activities</h2>
            </div>
            <div class="row">
                <?php foreach ($homeData->getActivities() as $activity):?>
                    <div class="col-md-12 col-lg-6">
                        <div class="well well-sm">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-4 col-lg-4">
                                        <p>
                                            <span><?=$activity->name?></span><BR><span><?=$activity->place?></span>
                                        </p>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <p>
                                            <span><?=$activity->datetime?></span>
                                        </p>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Subscribe</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-24 col-lg-12">
                                        <span><?=$activity->description?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>

        <div class="container-fluid containerlevel1" id="suggestions">
            <div class="row">
                <img class="img-center auto-resize img-responsive" src="pictures/idea.png"><h2>Suggestions</h2>
            </div>
            <div class="row">
                <?php foreach ($homeData->getSuggestions() as $suggestion):?>
                    <div class="col-md-12 col-lg-6">
                        <div class="well well-sm">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-4 col-lg-4">
                                        <p>
                                            <span><?=$suggestion->name?></span><BR><span><?=$suggestion->place?></span>
                                        </p>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <p>
                                            <span><?=$suggestion->firstname?> <?=$suggestion->lastname?></span>
                                        </p>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <button type="button" class="btn btn-warning disabled"><i class="fa fa-spinner" aria-hidden="true"></i></i> Pending</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-24 col-lg-12">
                                        <span><?=$suggestion->content?></span>
                                    </div>
                                </div>
                                <BR>
                                <div class="row">
                                    <div class="col-xs-4 col-lg-4">
                                        <?=$suggestion->datetime1?><a href="phpScripts/upVote.php?user_id=<?= $_SESSION['user_id']?>&id_suggestion=<?= $suggestion->pk_id_suggestion?>&dateTimeNbr=1"
                                                                      class="btn btn-default btn-responsive up_button"><span class="glyphicon glyphicon-thumbs-up"></span></a><span class="badge btn-responsive up_votes"><?=$homeData->getDateTime1BySuggestion($suggestion)?></span>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <?=$suggestion->datetime2?><a href="phpScripts/upVote.php?user_id=<?= $_SESSION['user_id']?>&id_suggestion=<?= $suggestion->pk_id_suggestion?>&dateTimeNbr=2"
                                                                      class="btn btn-default btn-responsive up_button"><span class="glyphicon glyphicon-thumbs-up"></span></a><span class="badge btn-responsive up_votes"><?=$homeData->getDateTime2BySuggestion($suggestion)?></span>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <?=$suggestion->datetime3?><a href="phpScripts/upVote.php?user_id=<?= $_SESSION['user_id']?>&id_suggestion=<?= $suggestion->pk_id_suggestion?>&dateTimeNbr=3"
                                                                      class="btn btn-default btn-responsive up_button"><span class="glyphicon glyphicon-thumbs-up"></span></a><span class="badge btn-responsive up_votes"><?=$homeData->getDateTime3BySuggestion($suggestion)?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>

        <div class="container-fluid containerlevel1" id="store">
            <div class="row">
                <img class="img-center auto-resize img-responsive" src="pictures/shopping-cart.png"><h2>Store</h2>
            </div>
            <div class="row">
                <div id="carousel-shop" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive img-center auto-resize" src="pictures/<?=$homeData->getStorePicture(1);?>" alt="...">
                        </div>
                        <?php foreach ($homeData->getStorePictures() as $storePicture):?>
                            <div class="item">
                                <img class="img-responsive img-center auto-resize" src="pictures/<?=$storePicture->img_path?>" alt="...">
                            </div>
                        <?php endforeach?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-shop" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-shop" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
            <a href="shop.php"><button class="btn carouselbtn"><i class="fa fa-share" aria-hidden="true"></i> Enter Shop</button></a>
        </div>

        <div id="contact" class="container-fluid containerlevel1" id="contact">
            <div class="row">
                <img class="img-center auto-resize img-responsive" src="pictures/email.png"><h2>Contact</h2>
            </div>
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Submit an activity</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Contact Us</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <form method="post" action="phpScripts/suggestionForm.php">
                            <div class="col-md-6">
                                <div class="form-group"><BR>
                                    <label for="activitytitle">Activity Title</label>
                                    <input name="activity_title" type="text" class="form-control" id="activitytitle" placeholder="Enter title here...">
                                </div>
                                <div class="form-group">
                                    <label for="activitydescription">Describe your activity</label>
                                    <textarea name="description" class="form-control" id="activitydescription" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input name="location" type="text" class="form-control" id="location" placeholder="Enter location...">
                                </div>
                            </div>
                            <div class="col-md-3"><BR>

                                <label class="control-label" for="date1">Date 1</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input name="date1" class="form-control" id="date1" placeholder="YYYY-MM-DD" type="text"/>
                                </div>

                                <label class="control-label" for="date2">Date 2</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input name="date2" class="form-control" id="date2" placeholder="YYYY-MM-DD" type="text"/>
                                </div>

                                <label class="control-label" for="date3">Date 3</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input name="date3" class="form-control" id="date3" placeholder="YYYY-MM-DD" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-3"><BR>
                                <label for="time1" class="col-2 col-form-label">Time 1</label>
                                <input name="time1" class="form-control" type="time" id="time1">
                                <label for="time2" class="col-2 col-form-label">Time 2</label>
                                <input name="time2" class="form-control" type="time" id="time2">
                                <label for="time3" class="col-2 col-form-label">Time 3</label>
                                <input name="time3" class="form-control" type="time" id="time3">
                            </div>
                            <div class="col-md-6"><BR><BR>
                                <input id="btnformactivity" class="btn btn-success" type="submit" value="Submit"/>
                            </div>
                        </form>

                    </div>

                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="form-group"><BR>
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="Enter subject here...">
                        </div>
                        <div class="form-group">
                            <label for="mailcontent">Write your e-mail</label>
                            <textarea class="form-control" id="mailcontent" rows="3"></textarea><BR>
                            <button id="btnformactivity" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>