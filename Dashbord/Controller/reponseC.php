<?PHP
	
	include_once ("config.php");
	include ("Dashbord/Model/reponse.php");

	class reponseC {
		function ajouterReponse($reponse){
			 $sql="INSERT INTO reponse (id, reponse, idd) 
			 VALUES (:id,:reponse, :idd)";
			 $db = new config();
             $conn=$db->getConnexion();
			 try{
			 	$query = $conn->prepare($sql);
			 	$query->execute([
				'id' => $reponse->getID(),
				'reponse' => $reponse->getReponse(),
				'idd' => $reponse->getIDD()
			]);			
			}
			catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
			}
		}
		
		function afficherReponse(){
			$sql="SELECT * FROM reponse";
			$conn = new config();
            $db=$conn->getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
			
		}


        function supprimerReponse($iddd){
			$sql="DELETE FROM reponse WHERE id= :id";
			$conn = new config();
            $db=$conn->getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$iddd);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


        function recupererReponse($idReponse){
			$sql="SELECT * from reponse where id=$idReponse";
			$conn = new config();
            $db=$conn->getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$garage=$query->fetch();
				return $garage;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

	}

?>