<?PHP
include "../config.php";

class reclamationC {
function afficherreclamation ($reclamation){
		echo "id_reclamation: ".$reclamation->getid_reclamation()."<br>";
		echo "nom: ".$reclamation->getnom()."<br>";
		echo "email: ".$reclamation->getemail()."<br>";
        echo "message: ".$reclamation->getmessage()."<br>";
        
	}
	/*function calculerSalaire($reclamation){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}
	*/
	function ajouterreclamation ($reclamation){
		$sql="insert into reclamation (nom,email,message,confirmer) values (:nom,:email,:message,:confirmer)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_reclamation=$reclamation->getid_reclamation();
        $nom=$reclamation->getnom();
        $email=$reclamation->getemail();
        $message=$reclamation->getmessage();
        $confirmer=$reclamation->getconfirmer();
		//$req->bindValue(':id_reclamation',$id_reclamation);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
        $req->bindValue(':message',$message);
        $req->bindValue(':confirmer',0);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherreclamations(){
		//$sql="SElECT * From message e inner join formationphp.message a on e.id_reclamation= a.id_reclamation";
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerreclamation($id_reclamation){
		$sql="DELETE FROM reclamation where id_reclamation= :id_reclamation";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_reclamation',$id_reclamation);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierreclamation($id_reclamation){
		$sql="UPDATE reclamation SET confirmer=1 WHERE id_reclamation=:id_reclamation";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$req->bindValue(':id_reclamation',$id_reclamation);

            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	function recupererreclamation($id_reclamation){
		$sql="SELECT * from reclamation where id_reclamation=$id_reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListereclamations($id_reclamation){
		$sql="SELECT * from reclamation where id_reclamation=$id_reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>