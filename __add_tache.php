<?php
/**
 * Created by PhpStorm.
 * User: Andrick
 * Date: 6/25/2017
 * Time: 6:12 AM
 */

if(isset($_POST['description'],$_POST['datedebut'],$_POST['datefin'],$_POST['idagent']))
{
    if(!empty($_POST['description']) && !empty($_POST['datedebut']) && !empty($_POST['datefin']) && !empty($_POST['idagent']))
    {
        require_once ("tache.dao.php");
        extract($_POST);
        $tach=new TacheDAO();
        $tach->add_new_tache_agent($description,date($datedebut),date($datefin),$idagent);
        header('Location: taches.php');
    }
}