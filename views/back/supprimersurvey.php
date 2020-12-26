
<?PHP
include "../../core/surveyC.php";
$surveyC=new surveyC();
if (isset($_GET["ids"])){
	$surveyC->supprimersurvey($_GET["ids"]);
    header('Location:survey.php');
}

?>