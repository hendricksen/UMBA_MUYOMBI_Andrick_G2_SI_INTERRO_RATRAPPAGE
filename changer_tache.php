<?php

/**
 * Created by PhpStorm.
 * User: Andrick
 * Date: 6/25/2017
 * Time: 6:45 AM
 */
?>
<!doctype>
<html>
<head>
    <title>Attribution des fonctions</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php include_once('head.php'); ?>

<div>
    <?php
    require_once ("agent.dao.php");
    require_once ("tache.dao.php");
    if(isset($_GET['id']) && !empty($_GET['id']))
    {

        $x=new AgentDAO();
        $y=new TacheDAO();
        $id=$y->get_id_agent_tache($_GET['id']);
        $nom=$x->get_nom_agent_tache($id);
        $id_ser=$_GET['id'];

    }

    ;?>
    <h2>Changer tache agent <?=$nom;?></h2>
    <form method="post" action="__alter_tache.php">
       <br> <label for="description">Description :</label>
        <input type="text" name="description" id="description" /><br />
        <label for="datedebut">Date début :</label>
        <input type="date" name="datedebut" id="datedebut" /><br />
        <label for="datefin">Date fin :</label>
        <input type="date" name="datefin" id="datefin" /><br />
        <input type='hidden' value=<?=$id_ser;?> name='id_t'>
        <input type='hidden' value=<?=$id;?> name='id_agent'>
        <input type="submit" value="Enregistrer" />
    </form>
</div>


<?php include_once('foot.php'); ?>
</body>
</html>
