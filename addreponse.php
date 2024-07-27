<?php
    require_once 'Dashbord/Controller/reponseC.php';
    require_once 'Dashbord/Model/reponse.php';
    require_once 'Dashbord/Controller/reclamationC.php';

    $error = "";
    // create user
    $reponse = null;
    // create an instance of the controller
    $reclamationC= new reclamationC();
    $reponseC = new reponseC();
    if (
        isset($_POST["id"]) &&
        isset($_POST["reponse"]) &&
        isset($_POST["idd"]) 
        
    ) {
        if (
            !empty($_POST["id"]) && 
            !empty($_POST["reponse"])  && 
            !empty($_POST["idd"]) 
            
        )
         {
            $reponse = new reponse(
                $_POST['id'], 
                $_POST['reponse'], 
                $_POST['idd']
            );
			$reponseC->ajouterReponse($reponse);
      header ('Location:reponseadmin.php');
        }
        else
            $error = "Missing information";
    }  

    $liste=$reclamationC->afficherReclamation();
?>

<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Crud</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    
    <form method="POST">
      <h1>GESTION DES REPONSES</h1>
      <div class="separation"></div>
        <div class="corps-formulaire">
          <div class="gauche">
            <div class="groupe">
              <label>ID Reponse</label>
              <input type="text" autocomplete="off" placeholder="" name="id"/>
                        </div>
            <div class="groupe">
              <label>Reponse</label>
             <textarea type="text" autocomplete="off" placeholder="reponse" name="reponse"></textarea>
            </div>
            <div class="groupe">
              <label>ID Reclamation :</label>
              <select name="idd" class="form-control p-6">
                <option value="">Select An ID</option>
                <?php foreach($liste as $rec){ ?>
                <option value="<?php echo $rec['id'] ?>"><?php echo $rec['id'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="gauche">
              <div class="pied-formulaire" align="center" name="submit" min="1" max="500" required >
                <a href="localhost/reclamation/reponseadmin.php"><button>Envoyer Reponse</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
