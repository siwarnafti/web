<?PHP
include "../../core/reclamationC.php";
$reclamationC=new reclamationC();
if (isset($_GET["id_reclamation"])){
	$reclamationC->modifierreclamation($_GET["id_reclamation"]);
    header('Location:afficher.php');
}