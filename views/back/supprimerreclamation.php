
<?PHP
include "../../core/reclamationC.php";
$reclamationC=new reclamationC();
if (isset($_GET["id_reclamation"])){
	$reclamationC->supprimerreclamation($_GET["id_reclamation"]);
    header('Location:afficher.php');
}

?>