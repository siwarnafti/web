<?PHP
include "../config.php";

class ProduitsC {
	function ajouterProduits ($Produits){
		$sql="insert into product (pname,pcategory,pprice) values (:pname,:pcategory,:pprice)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		

        $pname=$Produits->getpname();
        $pcategory=$Produits->getpcategory();
        $pprice=$Produits->getpprice();

		$req->bindValue(':pname',$pname);
		$req->bindValue(':pcategory',$pcategory);
		$req->bindValue(':pprice',$pprice);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherProduits(){
		//$sql="SElECT * From pprice e inner join formationphp.pprice a on e.pid= a.pid";
		$sql="SElECT * From product";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerProduits($pid){
		$sql="DELETE FROM product where pid= :pid";
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
	function modifierProduits($Produits,$pid){
		$sql="UPDATE product SET pname=:pname,pcategory=:pcategory,pprice=:pprice WHERE pid=:pid";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $pname=$Produits->getpname();
        $pcategory=$Produits->getpcategory();
        $pprice=$Produits->getpprice();

		$req->bindValue(':pid',$pid);
		$req->bindValue(':pname',$pname);
		$req->bindValue(':pcategory',$pcategory);
		$req->bindValue(':pprice',$pprice);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	
	function recupererProduits($pid){
		$sql="SELECT * from product where pid=$pid";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeProduits($pid){
		$sql="SELECT * from product where pid=$pid";
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