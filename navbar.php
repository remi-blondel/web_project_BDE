<?php
    define( 'ROOT_DIR', 'http://localhost/web_project_bde/');
    if(!isset($_SESSION['user_id']))
    {
        header('location:' . ROOT_DIR . 'authentication/Login.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="shortcut icon" href="pictures/exia.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav id="nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand" href="#"><a href="<?= ROOT_DIR?>home.php"><img class="paddingb10 img-responsive" src="<?= ROOT_DIR?>pictures/exia.png"></a></div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="<?= ROOT_DIR?>home.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-home" aria-hidden="true"></i> Home</span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= ROOT_DIR?>home.php#news">News</a></li>
                        <li><a href="<?= ROOT_DIR?>home.php#events">Latest Events</a></li>
                        <li><a href="<?= ROOT_DIR?>home.php#activities">Activities</a></li>
                        <li><a href="<?= ROOT_DIR?>home.php#suggestions">Suggestions</a></li>
                        <li><a href="<?= ROOT_DIR?>home.php#store">Store</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= ROOT_DIR?>home.php#contact">Contact</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?= ROOT_DIR?>activities.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-futbol-o" aria-hidden="true"></i> Events</span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= ROOT_DIR?>activities.php#events">Latest Events</a></li>
                        <li><a href="<?= ROOT_DIR?>activities.php#upload">Upload Pictures</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= ROOT_DIR?>shop.php"><span><i class="fa fa-shopping-basket" aria-hidden="true"></i> Store</span></a>
                </li>
                <?php if(isset($_SESSION['role']) AND !empty($_SESSION['role']) AND $_SESSION['role'] == 'staff') { ?>
                <li>
                    <a href="<?= ROOT_DIR?>staff.php"><span><i class="fa fa-cog" aria-hidden="true"></i> STAFF Management</span></a>
                </li>
                <?php } elseif(isset($_SESSION['role']) AND !empty($_SESSION['role']) AND $_SESSION['role'] == 'bde') { ?>
                <li>
                    <a href="<?= ROOT_DIR?>bde.php"><span><i class="fa fa-cog" aria-hidden="true"></i> BDE Management</span></a>
                </li>
                <?php } ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="phpScripts/logOut.php"><span><i class="fa fa-power-off" aria-hidden="true"></i> Log out</span></a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</body>

<script src="jquery/dist/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="scripts.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

</html>