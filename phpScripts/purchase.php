<?php

require_once '../database/config.php';
require_once '../database/singleton.php';

if(!empty($_POST) || !empty($_GET)) {
    if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
        $type = $_REQUEST['action'];
        switch ($type) {
            case 'buy':
                buyProduct();
                break;
        }
    }
}

function buyProduct()
{
    try
    {
        $stmt = singleton::getInstance()->prepare("INSERT INTO user_buy VALUES ('0', :id_product, :id_user )"); // O = unpaid

        /**
         * Attribution des valeurs dynamiquement
         */
        $stmt->bindValue(':id_product',           $_GET['prod'],     PDO::PARAM_INT);
        $stmt->bindValue(':id_user',              $_GET['user'],     PDO::PARAM_INT);

        $stmt->execute();
        /**
         * Retour à la page admin
         */
        header('location:../shop.php');
    }
    catch (PDOException $e)
    {
        printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
    }
}