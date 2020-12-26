<?PHP
include "../../entities/survey.php";
include "../../core/surveyC.php";

if (isset($_POST['nom']) and isset($_POST['question']) and isset($_POST['type']) ){
$surveys1=new survey($_POST['nom'],$_POST['question'],$_POST['type']);
$surveys1C=new surveyC();
$surveys1C->ajoutersurvey($surveys1);
header('Location: survey.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>