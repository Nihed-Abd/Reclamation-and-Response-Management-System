<?PHP
	include "Dashbord/Controller/reponseC.php";

	$reponseC=new reponseC();
	
	if (isset($_POST["id"])){
		$reponseC->supprimerReponse($_POST["id"]);
		header ('Location:../reclamation/tableReponse.php');
	}
?>