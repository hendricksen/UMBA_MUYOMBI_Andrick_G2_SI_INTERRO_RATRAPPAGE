<?php
/**
 * Created by PhpStorm.
 * User: Andrick
 * Date: 6/25/2017
 * Time: 6:28 AM
 */
if(isset($_GET['id']) && !empty($_GET['id']))
{
    require_once ("tache.dao.php");
    $x=new TacheDAO();
    $x->delete_tache($_GET['id']);
    header('Location: taches.php');
}
