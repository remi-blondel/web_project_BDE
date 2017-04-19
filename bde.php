<?php
if($_SESSION['role']!='bde' OR !isset($_SESSION['role']) OR empty($_SESSION['role']))
{
    header("HTTP/1.1 403 Forbidden");  // header "interdit"
    header("Refresh:1;url=home.php"); // redirection vers "login.php" dans 5 secondes
    die();
}
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
                <tr>
                    <td>DEUX PRIX POUR L’EXIA.CESI AU HACKING HEALTH 2017</td>
                    <td><img src="pictures/news1.jpg" class="img-thumbnail img-responsive img-center auto-resize" alt="icon"></td>
                    <td>Trois élèves de l’exia.CESI de Strasbourg ont gagné deux Prix au Hacking Health Camp 2017 ! Cet événement international, qui s’est tenu du 17 au 19 mars à Strasbourg, vise à briser les barrières de l’innovation en santé. Plus de 600 personnes sont venues du monde entier pour réfléchir sur 50 défis. Parmi elles : 90 professionnels de santé (infirmiers, pharmaciens, psychiatres…), 200 hackers et designers.</td>
                    <td><a class='btn btn-default glyphicon glyphicon-edit' role='button' href="editNews.php"></a></td>
                    <td><a class='btn btn-default glyphicon glyphicon-remove' role='button' href='#'></a></td>
                </tr>
                <tr>
                    <td>DEUX PRIX POUR L’EXIA.CESI AU HACKING HEALTH 2017</td>
                    <td><img src="pictures/news1.jpg" class="img-thumbnail img-responsive img-center auto-resize" alt="icon"></td>
                    <td>Trois élèves de l’exia.CESI de Strasbourg ont gagné deux Prix au Hacking Health Camp 2017 ! Cet événement international, qui s’est tenu du 17 au 19 mars à Strasbourg, vise à briser les barrières de l’innovation en santé. Plus de 600 personnes sont venues du monde entier pour réfléchir sur 50 défis. Parmi elles : 90 professionnels de santé (infirmiers, pharmaciens, psychiatres…), 200 hackers et designers.</td>
                    <td><a class='btn btn-default glyphicon glyphicon-edit' role='button' href="editNews.php"></a></td>
                    <td><a class='btn btn-default glyphicon glyphicon-remove' role='button' href='#'></a></td>
                </tr>
                <tr>
                    <td>DEUX PRIX POUR L’EXIA.CESI AU HACKING HEALTH 2017</td>
                    <td><img src="pictures/news1.jpg" class="img-thumbnail img-responsive img-center auto-resize" alt="icon"></td>
                    <td>Trois élèves de l’exia.CESI de Strasbourg ont gagné deux Prix au Hacking Health Camp 2017 ! Cet événement international, qui s’est tenu du 17 au 19 mars à Strasbourg, vise à briser les barrières de l’innovation en santé. Plus de 600 personnes sont venues du monde entier pour réfléchir sur 50 défis. Parmi elles : 90 professionnels de santé (infirmiers, pharmaciens, psychiatres…), 200 hackers et designers.</td>
                    <td><a class='btn btn-default glyphicon glyphicon-edit' role='button' href="editNews.php"></a></td>
                    <td><a class='btn btn-default glyphicon glyphicon-remove' role='button' href='#'></a></td>
                </tr>
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
                    <th>Participants</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td>Barbecue</td>
                    <td>Rémi Blondel</td>
                    <td>23/04/2017</td>
                    <td>Exia</td>
                    <td>25</td>
                    <td><button type="button" class="btn btn-warning disabled"><i class="fa fa-spinner" aria-hidden="true"></i></i> Pending</button></td>
                    <td><button id="btnformactivity" class="btn btn-success text-center"><i class="fa fa-check" aria-hidden="true"></i> Approve</button></td>
                    <td><button type="button" class="btn btn-danger text-center"><i class="fa fa-minus-circle" aria-hidden="true"></i></i> Dismiss</button></td>
                </tr>
                <tr>
                    <td>Barbecue</td>
                    <td>Rémi Blondel</td>
                    <td>23/04/2017</td>
                    <td>Exia</td>
                    <td>25</td>
                    <td><button type="button" class="btn btn-warning disabled"><i class="fa fa-spinner" aria-hidden="true"></i></i> Pending</button></td>
                    <td><button id="btnformactivity" class="btn btn-success text-center"><i class="fa fa-check" aria-hidden="true"></i> Approve</button></td>
                    <td><button type="button" class="btn btn-danger text-center"><i class="fa fa-minus-circle" aria-hidden="true"></i></i> Dismiss</button></td>
                </tr>
                <tr>
                    <td>Barbecue</td>
                    <td>Rémi Blondel</td>
                    <td>23/04/2017</td>
                    <td>Exia</td>
                    <td>25</td>
                    <td><button type="button" class="btn btn-warning disabled"><i class="fa fa-spinner" aria-hidden="true"></i></i> Pending</button></td>
                    <td><button id="btnformactivity" class="btn btn-success text-center"><i class="fa fa-check" aria-hidden="true"></i> Approve</button></td>
                    <td><button type="button" class="btn btn-danger text-center"><i class="fa fa-minus-circle" aria-hidden="true"></i></i> Dismiss</button></td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>