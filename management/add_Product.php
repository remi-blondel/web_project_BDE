<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
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
            <h2>Add Product</h2>
        </div>
        <div class="row">
            <form action="manage_shop.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-8">
                    <div class="form-group"><BR>
                        <label for="productitle">Product Title</label>
                        <input type="text" class="form-control" id="productitle" name="prod_name" placeholder="Enter title here..." required>
                    </div>
                    <div class="form-group">
                        <label for="productcat">Product Category</label>
                        <input type="text" class="form-control" id="productcat" name="prod_cat" placeholder="Enter category here..." required>
                    </div>
                    <div class="form-group">
                        <label for="productprice">Product Price</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="productprice" name="prod_price" placeholder="Enter price here..." required>
                            <div class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"><BR>
                    <input type="hidden" name="action" value="addprod">
                    <label for="pictureinput">Select a Picture for your product</label>
                    <input type="file" name="prod_picture" id="pictureinput"><BR>
                    <input class="btn btn-success" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>