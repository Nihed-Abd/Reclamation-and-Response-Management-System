<?PHP
	include ("Dashbord/Controller/reclamationC.php");

	$reclamationC=new reclamationC();
	$listeReclamation=$reclamationC->afficherReclamation();
    
if(isset($_POST['submit']))
{
    $listeReclamation=$reclamationC->afficherReclamation();
}

if(isset($_POST['ajout']))
{
    header ('Location:../reclamation/add.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Liste des réclamations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="scss/style.css">

	</head>

	<body>
	<section class="ftco-section">
		<div class="container">
            <h3 class="mb-4 text-center"><FONT COLOR="WHITE"><strong>Affichage des réclamations</strong></FONT></h3>
            <br>
            <br>
            <div class="form-group">
                <a href="../reclamation/add.php">
                    <button type="ajout" name="actualiser" value="Ajouter" class="btn btn-primary">
                        Ajouter
                    </button>
                </a>
                <a href="../reclamation/reclamation.html">
                    <button type="home" name="actualiser" value="home" class="btn btn-primary">
                        HOME
                    </button>
                </a>
            </div>
            <table id="myTable" class="table table-striped" >  
                <thead>
                    <th><FONT COLOR="WHITE">ID</FONT></th>
                    <th><FONT COLOR="WHITE">Name</FONT></th>
                    <th><FONT COLOR="WHITE">Mail</FONT></th>
                    <th><FONT COLOR="WHITE">Type</FONT></th>
                    <th><FONT COLOR="WHITE">Message</FONT></th>
                    <th><FONT COLOR="WHITE">ID réc</FONT></th>
                    <th><FONT COLOR="WHITE"></FONT></th>
                    <th><FONT COLOR="WHITE"></FONT></th>
                </thead>
                <tbody>
                    <?PHP
				        foreach($listeReclamation as $reclamation){
			        ?>
                    <tr>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $reclamation['id']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $reclamation['name']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $reclamation['mail']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $reclamation['type']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $reclamation['message']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $reclamation['idRec']; ?></FONT>
                        </td>
                        <td>
                            <div class="form-group">
                                <form method="POST" action="../reclamation/delete.php">
                                    <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-primary">
                                    <input type="hidden" value=<?PHP echo $reclamation['id']; ?> name="id">
                                </form>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <a href="../reclamation/modify.php?id=<?PHP echo $reclamation['id']; ?>">
                                    <input type="submit" value="Modfier" class="btn btn-primary">
                                </a>
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