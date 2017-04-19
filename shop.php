<?php
require_once 'model/shopData.php';

$shopData = new shopData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-2 shopcontainer">
                <div class="row">
                    <div class="col-xs-6 col-md-12">
                        <h3>Choose by</h3>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked="checked"> Outware
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked="checked"> Goodies
                            </label>
                        </div>
                        <select class="select form-control" id="placeselect" name="placeselect">
                            <option value="all">
                                All prices
                            </option>
                            <option value="5max">
                                0€ - 5€
                            </option>
                            <option value="15max">
                                5€ - 15€
                            </option>
                            <option value="30max">
                                15€ - 30€
                            </option>
                            <option value="infinite">
                                More than 30€
                            </option>
                        </select>
                    </div>
                    <div class="col-xs-4 col-md-12">
                        <h3>Order by</h3>
                        <select class="select form-control" id="placeselect" name="placeselect">
                            <option value="priceincrease">
                                Increasing Price
                            </option>
                            <option value="pricedecrease">
                                Decreasing Price
                            </option>
                            <option value="az">
                                A - Z
                            </option>
                            <option value="za">
                                Z - A
                            </option>
                        </select>
                    </div>
                    <div class="col-xs-2 col-md-12"><BR><BR><BR>
                        <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Apply Filters</button>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-10">
                <h2 class="white title">Shop</h2>
                <div class="row vertical-align">
                    <?php foreach ($shopData->getProducts() as $product):?>
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="thumbnail">
                            <h2 class="text-center"><?=$product->name;?></h2>
                            <img src="pictures/<?=$product->img_path;?>" class="img-responsive img-center auto-resize" alt="icon">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-xs-4 col-lg-4 text-center"><span class="text22"><?=$product->price; ?> €</span></div>
                                    <div class="col-xs-8 col-lg-8 text-center"><button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>