<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="pictures/exia.ico"/>
    <title>Management - Staff CESi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php

require_once 'database/singleton.php';
require_once 'database/config.php';

/**
 * Inclusion de la navbar complète
 */
include_once ('navbar.php');

/**
 * Ajout des vues
 */
    getAllPictures();
    viewOrders();
    viewShop();
    viewRoles();


function getAllPictures()
{
    try
    {
        /**
         * Requête SQL pour retrive toutes les images du site en base
         */
        $stmt = singleton::getInstance()->prepare(<<<SQL
<<<<<<< HEAD
            SELECT *
=======
            SELECT path
>>>>>>> origin/master
            FROM picture
SQL
        );

        $stmt->execute();

        $allpictures =<<<HTML
        <div id = "allcontent" >
            <div class="container-fluid containerlevel1" >
            
            <div class="row" >
                <h2 > Pictures</h2 >
            </div >
                <div class="row" >
HTML;

        while ($pictures = $stmt->fetch())
        {
            $allpictures .= "<div class=\"col-xs-6 col-sm-4 col-md-3 col-lg-2\" >";
            $allpictures .= "<div class=\"thumbnail text-center\">";
            $allpictures .= "<img src =\"pictures/{$pictures['path']}\" class=\"img-responsive img-center auto-resize\" alt = \"icon\">";
            $allpictures .= "<a class='btn btn-primary text-center' role='button' href=management/manage_pictures.php?action=dlpics><i class='fa fa-cloud-download' aria-hidden = 'true' ></i ></a>";
            $allpictures .= "<a class='btn btn-danger' role='button' href='management/manage_pictures.php?action=rmpics&img_id=$pictures[0]'><i class='fa fa-trash' aria-hidden = 'true' ></i ></a>";
            $allpictures .= "</div>";
            $allpictures .= "</div>";
        }
        /**
         * Affichage des boutons de gestion des photos (modération)
         */
        $allpictures.=<<<HTML
                </div>
            </div >
        </div>
HTML;

        /**
         * Affichage final
         */
        echo $allpictures;
    }
    catch (PDOException $e)
    {
        printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
    }
}

function viewShop()
{
    try
    {
         /**
         * Requête SQL pour récupérer les données du store en base
         */
         $stmt = singleton::getInstance()->prepare(<<<SQL
         SELECT pk_id_product, name, price, cat, img_path
         FROM product
SQL
         );

         $stmt->execute();

         $store_tab = <<<HTML
                <div class="container-fluid containerlevel1">
                    <div class="row">
                        <h2>Shop</h2>
                    </div>
                    
                <div class="row">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Picture</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
HTML;
         while ($shop = $stmt->fetch())
         {
             $store_tab .= "<tr>";
             $store_tab .= "<td>{$shop['name']}</td>";
             $store_tab .= "<td><img src=\"pictures/{$shop['img_path']}\" class=\"img-responsive img-thumbnail\"></td>";
             $store_tab .= "<td>{$shop['cat']}</td>";
             $store_tab .= "<td>{$shop['price']}€</td>";
             $store_tab .= "<td><a class='btn btn-primary glyphicon glyphicon-edit' role='button' href=management/edit_Product.php?id={$shop['pk_id_product']}></a></td>";
             $store_tab .= "<td><a class='btn btn-danger glyphicon glyphicon-remove' role='button' href=management/manage_shop.php?action=delprod&id={$shop['pk_id_product']}></a></td>";
             $store_tab .= "</tr>";
         }

         $store_tab .= <<<HTML
                   </table>
                   <a class="btn btn-default" role='button' href=management/add_Product.php><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Product</a>
                </div>
            </div>
         </div >
HTML;

        echo $store_tab;
        }
        catch (PDOException $e)
        {
            printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
        }
}

function viewOrders()
{
    try
    {
        $stmt = singleton::getInstance()->prepare(<<<SQL
        SELECT * FROM user 
        INNER JOIN user_buy ON user_buy.pk_id_user = user.pk_id_user
        INNER JOIN product ON product.pk_id_product = user_buy.pk_id_product
<<<<<<< HEAD
        ORDER BY lastname 
=======
        WHERE paid = 'NO';
>>>>>>> origin/master
SQL
        );

        $stmt->execute();

        $orders_tab =<<<HTML
            <div class="container-fluid containerlevel1">
                <div class="row">
                    <h2>Students Orders</h2>
                </div>
            <div class="row">
                <table class="table table-hover table-striped">
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Paid ?</th>
                        <th>Delete</th>
                    </tr>
HTML;

        while ($order = $stmt->fetch())
        {

            $orders_tab .= "<tr>";
            $orders_tab .= "<td>{$order['lastname']}</td>";
            $orders_tab .= "<td>{$order['firstname']}</td>";
            $orders_tab .= "<td>{$order['name']}</td>";
            $orders_tab .= "<td>{$order['price']}€</td>";
            if($order['paid'] == 0)
            {
                $orders_tab .= "<td>NO</td>";
            }
            else
            {
                $orders_tab .= "<td>YES</td>";
            }
            $orders_tab .= "<td><a class='btn btn-danger glyphicon glyphicon-remove' role='button' href=management/manage_orders.php?action=delorder&idprod={$order['pk_id_product']}&iduser={$order['pk_id_user']}></a></td>";
            $orders_tab .= "</tr>";
        }

        $orders_tab .= <<<HTML
                            </table>
                        </div >
                    </div >
                </div >
        </div>
HTML;


    echo $orders_tab;

    }
    catch (PDOException $e)
    {
        printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
    }
}

function viewRoles()
{
    try {
    /**
    * Requête SQL pour récupérer les données de l'utilisateur en base
    */
    $stmt = singleton::getInstance()->prepare(<<<SQL
    SELECT pk_id_user, firstname, lastname, role
    FROM user
SQL
    );

    $stmt->execute();

    /**
    * Pré-Affichage HTML statique
    */
    $roletab = <<<HTML
        <div class="container-fluid containerlevel1">
            <div class="row">
                <h2>Students Roles</h2>
            </div>
            
            <div class="row">
                <table class="table table-hover table-striped">
                    <tr>
                        <th>Role</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Edit User</th>
                        <th>Delete Role</th>
                    </tr>
HTML;
    /**
    * Remplissage du tableau avec les données du SELECT précédent
    */
    while ($role = $stmt->fetch())
    {
        $roletab .= "<tr>";
        $roletab .= "<td>{$role['role']}</td>";
        $roletab .= "<td>{$role['lastname']}</td>";
        $roletab .= "<td>{$role['firstname']}</td>";
        $roletab .= "<td><a class='btn btn-primary glyphicon glyphicon-edit' role='button' href=management/edit_Role.php?id={$role['pk_id_user']}  ></a></td>";
        $roletab .= "<td><a class='btn btn-danger glyphicon glyphicon-remove' role='button' href=management/manage_user.php?action=delrole&id={$role['pk_id_user']}></a></td>";
        $roletab .= "</tr>";
    }

    $roletab .= <<<HTML
                </table>
            </div >
        </div >
    </div >
HTML;

    /**
    * Affichage de la vue HTML des rôles statique entièrement
    */
    echo $roletab;
    }

    /**
    * En cas d'erreur de connexion à la BDD
    */
    catch (PDOException $e)
    {
        printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
    }
}


