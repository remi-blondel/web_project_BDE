<?php
    $id_user = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Edit Role</title>
    <link rel="shortcut icon" href="../pictures/exia.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>

<header>
    <?php include_once("../navbar.php") ?>
</header>

<div id="allcontent">
    <div class="container-fluid containerlevel1">
        <div class="row">
            <h2>Edit Role</h2>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <form action="manage_user.php" method="POST">
                    <div class="form-group"><BR>
                        <label for="roletitle">Role Title*</label>
                        <input type="text" class="form-control" id="roletitle" name="role" placeholder="Enter title here..." required>

                        <!-- Ajout de variables superglobales à la mano -->
                        <input type="hidden" name="id" value='<?= $id_user; ?>'/>
                        <input type="hidden" name="action" value="edituser">
                    </div>
                    <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>