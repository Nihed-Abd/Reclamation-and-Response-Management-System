<?PHP
	include ("Dashbord/Controller/reponseC.php");

	$reponseC=new reponseC();
	$listeReponse=$reponseC->afficherReponse();
    
if(isset($_POST['submit']))
{
    $listeReponse=$reponseC->afficherReponse();
}

if(isset($_POST['ajout']))
{
    header ('Location:../reclamation/addreponse.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Liste des réponses</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="scss/style.css">

	</head>

	<body>
	<section class="ftco-section">
		<div class="container">
            <h3 class="mb-4 text-center"><FONT COLOR="WHITE"><strong>Affichage des réponses</strong></FONT></h3>
            <br>
            <br>
            <div class="form-group">
                <a href="../reclamation/add.php">
                    <button type="ajout" name="actualiser" value="Ajouter" class="btn btn-primary">
                        Ajouter une nouvelle réclamation 
                    </button>
                </a>
                <a href="reclamation.html">
                    <button type="ajout" name="actualiser" value="Ajouter" class="btn btn-primary">
                        HOME 
                    </button>
                </a>
            </div>
            <table id="myTable" class="table table-striped" >  
                <thead>
                    <th><FONT COLOR="WHITE">ID</FONT></th>
                    <th><FONT COLOR="WHITE">Reponse</FONT></th>
                    <th><FONT COLOR="WHITE">ID Reclamation</FONT></th>
                    <th><FONT COLOR="WHITE"></FONT></th>
                    <th><FONT COLOR="WHITE"></FONT></th>
                </thead>
                <tbody>
                    <?PHP
				        foreach($listeReponse as $reponse){
			        ?>
                    <tr>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $reponse['id']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $reponse['reponse']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $reponse['idd']; ?></FONT>
                        </td>
                        <td>
                            <div class="form-group">
                                <form method="POST" action="deletereponse.php">
                                    <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-primary">
                                    <input type="hidden" value=<?PHP echo $reponse['id']; ?> name="id">
                                </form>
                            </div>
                        </td>
                        
                    </tr>
                    <?PHP
				        }
			        ?>
                </tbody>
            </table>
            
		</div>
	</section>


	<script src="js/jquery.min.js"></script>
  	<script src="js/popper.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/jquery.validate.min.js"></script>
  	<script src="js/main.js"></script>

	</body>
</html>