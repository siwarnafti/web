<?PHP

class ratingC {
	function ajouterrating ($rating){
		$sql="insert into product_rating (idc,idp,rating) values (:idc,:idp,:rating)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		

        $idc=$rating->getidc();
        $idp=$rating->getidp();
        $r=$rating->getrating();

		$req->bindValue(':idc',$idc);
		$req->bindValue(':idp',$idp);
		$req->bindValue(':rating',$r);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
    }
    
    function checkvoted($idc,$idp){
        $sql="SElECT * From product_rating WHERE idc = $idc and idp = $idp ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
	
	function afficherratings(){
		$sql="SElECT * From product_rating";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}


    function calculeRating1($idp){
		$sql="SElECT * From product_rating where rating=1 and idp=$idp";
		$db = config::getConnexion();
		try{
        $liste=$db->query($sql);
        $count=0;
        foreach($liste as $row){
            $count++;
        }
		return $count;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    function calculeRating0($idp){
		$sql="SElECT * From product_rating where rating=0 and idp=$idp";
		$db = config::getConnexion();
		try{
        $liste=$db->query($sql);
        $count=0;
        foreach($liste as $row){
            $count++;
        }
		return $count;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    
	function supprimerrating($pid){
		$sql="DELETE FROM product_rating where pid= :pid";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':pid',$pid);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierratingto0($idr){
		$sql="UPDATE product_rating SET rating=0 WHERE idpr=$idr";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
    }
    function modifierratingto1($idr){
		$sql="UPDATE product_rating SET rating=1 WHERE idpr=$idr";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	
	function recupererrating($pid){
		$sql="SELECT * from product_rating where pid=$pid";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListerating($pid){
		$sql="SELECT * from product_rating where pid=$pid";
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