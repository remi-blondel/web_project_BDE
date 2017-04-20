<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../style.css">

<?php
require_once '../database/singleton.php';
require_once '../database/config.php';

if(!empty($_POST) || !empty($_GET)){
    if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
        $type = $_REQUEST['action'];
        switch($type)
        {
            case 'edituser':
                editUser();
                break;
            case 'delrole':
                deleteRole();
                break;
        }
    }
}

function editUser()
{
    try
    {
        $stmt = singleton::getInstance()->prepare(<<<SQL
        UPDATE user
        SET role = :role
        WHERE pk_id_user = :id
SQL
        );

        $stmt->bindValue(':role',      $_POST['role'],    PDO::PARAM_STR);
        $stmt->bindValue(':id',        $_POST['id'],      PDO::PARAM_INT);

        $stmt->execute();

        header('location:../staff.php');
    }
    catch(PDOException $e)
    {
        printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
    }
}

function deleteRole()
{
    try
    {
        $stmt = singleton::getInstance()->prepare(<<<SQL
        UPDATE user
        SET role = 'none'
        WHERE pk_id_user = :id
SQL
        );
        /**
         * Récupération de l'ID depuis le GET HTTP
         */
        $stmt->bindValue(':id',      $_GET['id'],    PDO::PARAM_INT);

        $stmt->execute();

        header('location:../staff.php');
    }
    catch(PDOException $e)
    {
        printf("Erreur %d : %s\n", $e->getCode(), $e->getMessage());
    }
}
?>

