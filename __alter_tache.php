<?php

/**
 * Created by PhpStorm.
 * User: Andrick
 * Date: 6/25/2017
 * Time: 6:51 AM
 */

//var_dump($_POST);
if(isset($_POST['description'],$_POST['datedebut'],$_POST['datefin'],$_POST['id_agent'],$_POST['id_t']))
{
    if(!empty($_POST['description']) && !empty($_POST['datedebut']) && !empty($_POST['datefin']) && !empty($_POST['id_agent']) && !empty($_POST['id_t']))
    {
        require_once ("tache.class.php");
        require_once ("tache.dao.php");
        extract($_POST);
        echo 'Tout est okay<br>';

        $tach=new Tache($id_t,$description,$datedebut,$datefin,$id_agent);
        $mis=new TacheDAO();
        $t=$mis->alter_tache_agent($tach);
        header('Location: index.php');

    }
}