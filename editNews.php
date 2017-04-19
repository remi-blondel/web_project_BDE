<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit News</title>
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
            <h2>Edit News</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group"><BR>
                    <label for="newstitle">News Title</label>
                    <input type="text" class="form-control" id="newstitle" placeholder="Enter title here...">
                </div>
                <div class="form-group">
                    <label for="newsdescription">Enter your text here...</label>
                    <textarea class="form-control" id="newsdescription" rows="3"></textarea>
                </div>
            </div>
            <div class="col-md-4"><BR>
                <label for="pictureinput">Select a Picture for your news</label>
                <input type="file" id="pictureinput"><BR>
                <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>