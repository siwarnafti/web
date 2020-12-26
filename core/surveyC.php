<?PHP
include "../config.php";

class surveyC {
function affichersurvey ($survey){
		echo "ids: ".$survey->getids()."<br>";
		echo "nom: ".$survey->getnom()."<br>";
		echo "question: ".$survey->getquestion()."<br>";
		echo "type: ".$survey->gettype()."<br>";
	}
	/*function calculerSalaire($survey){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}
	*/
	function ajoutersurvey ($survey){
		$sql="insert into survey (ids,nom,question,type) values (:ids, :nom,:question,:type)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $ids=$survey->getids();
        $nom=$survey->getnom();
        $question=$survey->getquestion();
        $type=$survey->gettype();
		$req->bindValue(':ids',$ids);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':question',$question);
		$req->bindValue(':type',$type);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function affichersurveys(){
		//$sql="SElECT * From type e inner join formationphp.type a on e.ids= a.ids";
		$sql="SElECT * From survey";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	
	function afficherSurveys_toansewer($idc){
		$sql="SElECT * From survey where ids NOT IN (SELECT ids FROM reponse WHERE idc = $idc )";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function supprimersurvey($ids){
		$sql="DELETE FROM survey where ids= :ids";
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
	function modifiersurvey($survey,$ids){
		$sql="UPDATE survey SET ids=:idso, nom=:nom,question=:question,type=:type WHERE ids=:ids";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idso=$survey->getids();
        $nom=$survey->getnom();
        $question=$survey->getquestion();
        $type=$survey->gettype();
		$datas = array(':idso'=>$idso, ':ids'=>$ids, ':nom'=>$nom,':question'=>$question,':type'=>$type);
		$req->bindValue(':idso',$idso);
		$req->bindValue(':ids',$ids);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':question',$question);
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
	function recuperersurvey($ids){
		$sql="SELECT * from survey where ids=$ids";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListesurveys($ids){
		$sql="SELECT * from survey where ids=$ids";
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