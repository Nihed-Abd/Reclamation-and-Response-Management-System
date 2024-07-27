<?PHP
	include "Dashbord/Controller/reclamationC.php";

	$reclamationC=new reclamationC();
	
	if (isset($_POST["id"])){
		$reclamationC->supprimerReclamation($_POST["id"]);
		header ('Location:../reclamation/tableRec.php');
	}
?>