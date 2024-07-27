<?php
    require_once 'Dashbord/Controller/reclamationC.php';
    require_once 'Dashbord/Model/reclamation.php';

    $error = "";
    // create user
    $reclamation = null;
    // create an instance of the controller
    $reclamationC = new reclamationC();
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
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
    <form id="form" name="form" method="post" accept-charset="utf-8" onsubmit="Checker();" >
      <h1>DEMANDE DE RECLAMATION</h1>
      <div class="separation"></div>
      <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
            <label>Identifiant :</label>
            <input type="text" autocomplete="off" placeholder="Identifiant" name="id" id="id"/>
            <i class="fas fa-user"></i>
          </div>
          <div class="groupe">
            <label>Nom :</label>
            <input type="text" autocomplete="off" placeholder="Nom" name="name" id="name"/>
            <i class="fas fa-user"></i>
          </div>
          <div class="groupe">
            <label>Email :</label>
            <input type="text" autocomplete="off" placeholder="Email" name="mail" id="mail"/>
            <i class="fas fa-envelope"></i>
          </div>
          
            <div class="groupe">
              <label>Type :</label>
              <input type="text "placeholder="Voiture/Client" name="type" id="type">
            </div>
            <div class="groupe">
              <label>ID à réclamer :</label>
              <input type="text" placeholder="ID à réclamer" name="idRec" id="idRec">
              <i class="fas fa-user"></i>
            </div>
        </div>
        <div class="droite">
          <div class="groupe">
            <label>Message</label>
            <textarea placeholder="Saisissez ici..." name="message" id="message"></textarea>
          </div>
        </div>
      </div>
      <div class="gauche">
        <div class="pied-formulaire" align="center" name="submit" value="ok" min="1" max="500" required >
        <div class="g-recaptcha" data-sitekey="6LclZEojAAAAAB7MgW7jippVof4NGn6OKAHQZNQ8"></div>
        <a href="http://localhost/reclamation/tableRec.php"><button type="submit" name="submitButton" onclick="valider()" >Envoyer le message</button></a>
        </div>
        <script type="text/javascript">
//<![CDATA[

function valider() {
  // si la valeur du champ prenom est non vide
  if(document.form.id.value != "") {
    // alors on envoie le formulaire
    document.form.submit();
  }
  else {
    // sinon on affiche un message
    alert("Saisissez l'id");
  }
      if(document.form.name.value != "") {
    // alors on envoie le formulaire
    document.form.submit();
  }
  else {
    // sinon on affiche un message
    alert("Saisissez Votre Nom");
  }
          if(document.form.mail.value != "") {
    // alors on envoie le formulaire
    document.form.submit();
  }
  else {
    // sinon on affiche un message
    alert("Saisissez l'email");
  }
                if(document.form.type.value != "") {
    // alors on envoie le formulaire
    document.form.submit();
  }
  else {
    // sinon on affiche un message
    alert("Saisissez le type");
  }
        if(document.form.idRec.value != "") {
    // alors on envoie le formulaire
    document.form.submit();
  }
  else {
    // sinon on affiche un message
    alert("Saisissez l'id à reclamer");
  }
                      if(document.form.message.value != "") {
    // alors on envoie le formulaire
    document.form.submit();
  }
  else {
    // sinon on affiche un message
    alert("Saisissez le message");
  }
}

//]]>
</script>
    </form>
    <?php

if(isset($_POST['submitButton']))
{

function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LclZEojAAAAAMkKafFkhLUXkpfvFYkUlobcVPRW',
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }


    // Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);

    if ($result['success']) {
        //If the user has checked the Captcha box
        if (
            isset($_POST["id"]) &&
            isset($_POST["name"]) &&
            isset($_POST["mail"]) &&
            isset($_POST["type"]) &&
            isset($_POST["message"]) &&
            isset($_POST["idRec"])
            
        ) {
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
                $reclamationC->ajouterReclamation($reclamation);
          header ('Location:../reclamation/tableRec.php');
            }
            else
                $error = "Missing information";
        }  
        }
        else
            $error = "Missing information";
            echo '<script>alert("Error Message");</script>';
          } 

    



















    ?>
  </body>
</html>