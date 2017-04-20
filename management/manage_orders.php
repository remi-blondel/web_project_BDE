<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

if(!empty($_POST) || !empty($_GET))
{
    if(isset($_REQUEST['action']) && !empty($_REQUEST['action']))
    {
        $type = $_REQUEST['action'];
        switch($type)
        {
            case 'delorder':
                deleteOrder();
                break;
        }
    }
}

function deleteOrder()
{
    try
    {
        $stmt = singleton::getInstance()->prepare(<<<SQL
        DELETE FROM user_buy
        WHERE pk_id_product = :id_prod AND pk_id_user = :id_user
SQL
        );

    $stmt->bindValue(':id_prod',           $_GET['idprod'],     PDO::PARAM_INT);
    $stmt->bindValue(':id_user',           $_GET['iduser'],     PDO::PARAM_INT);

    $stmt->execute();

    header('location: ../staff.php');
    }
    catch (PDOException $e)
    {
        printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
    }
}