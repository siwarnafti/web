<?PHP
include "../entities/reclamation.php";
include "../core/reclamationC.php";

if ( isset($_POST['nom']) and isset($_POST['email']) and isset($_POST['message']) ){
$reclamation1=new reclamation($_POST['nom'],$_POST['email'],$_POST['message'],0);
//Partie2
/*
var_dump($reclamation1);
}
*/
//Partie3
$reclamation1C=new reclamationC();
$reclamation1C->ajouterreclamation($reclamation1);
header('Location: sav.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>