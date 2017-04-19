<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../style.css">

<?php
require_once '../database/db_config.php';
require_once '../database/database.php';

if(!empty($_POST) || !empty($_GET))
{
    if(isset($_REQUEST['action']) && !empty($_REQUEST['action']))
    {
        $type = $_REQUEST['action'];
        switch($type)
        {
            case 'editprod':
                editProduct();
                break;
            case 'delprod':
                deleteProduct();
                break;
            case 'addprod':
                addProduct();
                break;
        }
    }
}

function editProduct()
{
    try
    {
        if (empty($_POST['product_name']) && empty($_POST['product_price']) && empty($_POST['product_cat']))
        {
            header('location:../staff.php');
        }
        else
        {
                $stmt = database::getInstance()->prepare("UPDATE Product SET name = :new_name, price = :new_price, cat = :new_cat WHERE pk_id_product = :id_product");

                /**
                 * Attribution des valeurs dynamiquement
                 */
                $stmt->bindValue(':new_name',           $_POST['product_name'],     PDO::PARAM_STR);
                $stmt->bindValue(':new_price',          $_POST['product_price'],    PDO::PARAM_INT);
                $stmt->bindValue(':new_cat',            $_POST['product_cat'],      PDO::PARAM_STR);
                $stmt->bindValue(':id_product',         $_POST['id_prod'],          PDO::PARAM_STR);

                $stmt->execute();
                /**
                * Retour à la page admin
                */
                header('location:../staff.php');
        }
    }
    catch(PDOException $e)
    {
        printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
    }
}

function deleteProduct()
{
    try
    {
        $stmt = database::getInstance()->prepare(<<<SQL
        SET AUTOCOMMIT = 0;
        
        START TRANSACTION;
        
        DELETE FROM User_Buy
        WHERE id_product = :id_prod;
        
        DELETE FROM Product
        WHERE pk_id_product = :id_prod;

        COMMIT; 
SQL
        );

        $stmt->bindValue(':id_prod',           $_GET['id'],     PDO::PARAM_INT);

        $stmt->execute();

        /**
         * Retour à la page admin
         */
        header('location:../staff.php');

    }
    catch (PDOException $e)
    {
        printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
    }


}

function addProduct()
{
    try
    {
        $stmt = database::getInstance()->prepare(<<<SQL
        INSERT INTO Product (name, price, cat, img_path)
        VALUES (:new_name, :new_price, :new_cat, :new_img)
SQL
        );

        /**
         * Attribution des valeurs dynamiquement
         */
        $stmt->bindValue(':new_name',           $_POST['prod_name'],      PDO::PARAM_STR);
        $stmt->bindValue(':new_price',          $_POST['prod_price'],     PDO::PARAM_INT);
        $stmt->bindValue(':new_cat',            $_POST['prod_cat'],       PDO::PARAM_STR);
        $stmt->bindValue(':new_img',            $_POST['prod_name'],      PDO::PARAM_STR);


        $stmt->execute();

        /**
         * Retour à la page admin
         */
        header('location:../staff.php');
    }
    catch (PDOException $e)
    {
        printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
    }
}
