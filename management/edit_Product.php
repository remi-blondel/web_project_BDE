<?php
    $id_product = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
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
            <h2>Edit Product</h2>
        </div>

        <div class="row">
            <form action="manage_shop.php" method="POST">
                <div class="col-md-8">
                    <div class="form-group"><BR>
                        <label for="productitle">Product Title</label>
                        <input type="text" class="form-control" id="productitle" name="product_name" placeholder="Enter title here...">
                    </div>

                    <div class="form-group">
                        <label for="productcat">Product Category</label>
                        <input type="text" class="form-control" id="productcat" name="product_cat" placeholder="Enter category here...">
                    </div>

                    <div class="form-group">
                        <label for="productprice">Product Price</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="productprice" name="product_price" placeholder="Enter price here...">
                            <div class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"><BR>
                    <label for="pictureinput">Select a Picture for your product</label>
                    <input type="file" id="pictureinput" name="imgToUpload"><BR>

                    <input type="hidden" name="id_prod" value='<?= $id_product; ?>'>
                    <input type="hidden" name="action" value="editprod">

                    <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="../jquery/dist/jquery.min.js"></script>
<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="../scripts.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

</body>
</html>