<?php

	require_once('connexion.dao.php');
	
	class TacheDAO {
		private $bdd;
		function __construct() {
			$this->bdd = Connexion::getConnexion();
		}
		
		function getAllTache() {
			$req = $this->bdd->query('SELECT * FROM tache');
			$tabTache = array();
			while($data = $req->fetch()) {
				$a = new Tache($data['id'], $data['description'], $data['datedebut'], $data['datefin'], $data['idagent']);
				$tabTache[] = $a;
			}
			
			$req->closeCursor();
			
			return $tabTache;
		}

		function add_new_tache_agent($description,$date_deb,$date_fin,$id_agent)
        {
            $req = $this->bdd->prepare('INSERT INTO tache SET description=?,datedebut=?,datefin=?,idagent=?');
            $req->execute([$description,$date_deb,$date_fin,$id_agent]);
        }
        function delete_tache($id_agent)
        {
            $req = $this->bdd->prepare('DELETE FROM tache WHERE id=?');
            $req->execute([$id_agent]);
        }

        function get_id_agent_tache($id)
        {
            $req = $this->bdd->prepare('SELECT idagent FROM tache WHERE id=?');
            $req->execute([$id]);
            $id_agent="";
            while($data = $req->fetch()) {
                $id_agent=$data['idagent'];
            }
            return $id_agent;

        }
        function alter_tache_agent(Tache $tache)
        {
            $req = $this->bdd->prepare('UPDATE tache SET description=?,datedebut=?,datefin=?,idagent=? WHERE id=?');
            $req->execute([$tache->getDescription(),$tache->getDatedebut(),$tache->getDatefin(),$tache->getIdagent(),$tache->getId()]);
        }
        function  nb_tachees_agent($id)
        {
            $i=0;
            $tab=[];
            $req = $this->bdd->prepare('SELECT * FROM tache WHERE idagent=?');
            $req->execute([$id]);
            $tab=$req->fetchAll();
            foreach ($tab as $t)
            {
                if($t['idagent']==$id)
                {
                    $i++;
                }
            }
            return $i;
        }
		
	}


?>