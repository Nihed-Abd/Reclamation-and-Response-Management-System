<?php
	include 'Dashbord/Controller/reclamationC.php';
  	include_once 'Dashbord/Model/reclamation.php';


	$reclamationC = new reclamationC();
	$error = "";
	
	if (
    isset($_POST["id"]) &&
    isset($_POST["name"]) &&
    isset($_POST["mail"]) &&
    isset($_POST["type"]) &&
    isset($_POST["message"]) &&
    isset($_POST["idRec"])
       
	){
		if (
      !empty($_POST["id"]) && 
      !empty($_POST["name"]) &&
      !empty($_POST["mail"]) &&
      !empty($_POST["type"]) &&
      !empty($_POST["message"]) &&
      !empty($_POST["idRec"])
            
        ) {
            $reclamation = new reclamation(
              $_POST['id'], 
              $_POST['name'],
              $_POST['mail'],
              $_POST['type'],
              $_POST['message'],
              $_POST['idRec']
			);
			
            $reclamationC->modifierReclamation($reclamation, $_GET['id']);
            header ('Location:../reclamation/tableRec.php');
        }
        else
        $error = "Missing information";
	}

?>

<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Crud</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
                    <?php 
											if (isset($_GET['id'])){
												$reclamation = $reclamationC->recupererReclamation($_GET['id']);
										?>
    <form method="POST">
      <h1>MODFIER RECLAMATION</h1>
      <div class="separation"></div>
      <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
            <label>Identifiant :</label>
            <input type="text" autocomplete="off" id="Name" value="<?PHP echo $reclamation['id']; ?>" placeholder="Identifiant" name="id" 
            minlength="3" maxlength="20" size="10"
          required  />
            <i class="fas fa-user"></i>
          </div>
          <div class="groupe">
            <label>Nom :</label>
            <input type="text" autocomplete="off" id="Name" value="<?PHP echo $reclamation['name']; ?>" placeholder="Nom" name="name" 
            minlength="3" maxlength="20" size="10"
          required  />
            <i class="fas fa-user"></i>
          </div>
          <div class="groupe">
            <label>Email :</label>
            <input type="mail" autocomplete="off" id="email" value="<?PHP echo $reclamation['mail']; ?>" placeholder="Email" name="mail"/>
            <i class="fas fa-envelope"></i>
          </div>
            <div class="groupe">
              <label>Type :</label>
              <input type="text" name="type" value="<?PHP echo $reclamation['type']; ?>" placeholder="Voiture/Client">
            </div>
            <div class="groupe">
              <label>ID à réclamer :</label>
              <input type="text" name="idRec" value="<?PHP echo $reclamation['idRec']; ?>" placeholder="ID à réclamer">
              <i class="fas fa-user"></i>
            </div>
        </div>
        <div class="droite">
          <div class="groupe">
            <label>Message</label>
            <textarea placeholder="Saisissez ici..." name="message" ><?PHP echo $reclamation['message']; ?></textarea>
          </div>
        </div>
      </div>
      <div class="gauche">
        <div class="pied-formulaire" align="center" id="message" name="modifier" min="1" max="500" required >
        <button>Modifier Reclamation</button>
        </div>
    </form>
    <?php
											}
										?>
  </body>
</html>
