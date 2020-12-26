<?PHP
//include "../config.php";

class reponseC {
function afficherreponse ($reponse){
		echo "ids: ".$reponse->getids()."<br>";
		echo "idc: ".$reponse->getidc()."<br>";
		echo "reponse: ".$reponse->getreponse()."<br>";
		echo "type: ".$reponse->gettype()."<br>";
	}
	/*function calculerSalaire($reponse){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	} 
	*/
	function ajouterreponse ($reponse){
		$sql="insert into reponse (ids,idc,reponse) values (:ids, :idc,:reponse)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $ids=$reponse->getids();
        $idc=$reponse->getidc();
        $reponse=$reponse->getreponse();
		$req->bindValue(':ids',$ids);
		$req->bindValue(':idc',$idc);
		$req->bindValue(':reponse',$reponse);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function calculernon ($ids){
		$sql="SELECT *
		FROM reponse
		INNER JOIN survey
		ON reponse.ids= survey.ids where reponse.ids = $ids and reponse.reponse = 'non' ";
		$db = config::getConnexion();
		$liste=$db->query($sql);
		$nb=$liste->rowCount();
		return $nb;
	}
	function calculeroui ($ids){
		$sql="SELECT *
		FROM reponse
		INNER JOIN survey
		ON reponse.ids= survey.ids where reponse.ids = $ids and reponse.reponse = 'oui' ";
		$db = config::getConnexion();
		$liste=$db->query($sql);
		$nb=$liste->rowCount();
		return $nb;

	}

	function afficherreponses(){
		//$sql="SElECT * From type e inner join formationphp.type a on e.ids= a.ids";
		$sql="SElECT * From reponse";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerreponse($ids){
		$sql="DELETE FROM reponse where ids= :ids";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':ids',$ids);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierreponse($reponse,$ids){
		$sql="UPDATE reponse SET ids=:idso, idc=:idc,reponse=:reponse,type=:type WHERE ids=:ids";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idso=$reponse->getids();
        $idc=$reponse->getidc();
        $reponse=$reponse->getreponse();
        $type=$reponse->gettype();
		$datas = array(':idso'=>$idso, ':ids'=>$ids, ':idc'=>$idc,':reponse'=>$reponse,':type'=>$type);
		$req->bindValue(':idso',$idso);
		$req->bindValue(':ids',$ids);
		$req->bindValue(':idc',$idc);
		$req->bindValue(':reponse',$reponse);
		$req->bindValue(':type',$type);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererreponse($ids){
		$sql="SELECT * from reponse where ids=$ids";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListereponses($ids){
		$sql="SELECT * from reponse where ids=$ids";
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