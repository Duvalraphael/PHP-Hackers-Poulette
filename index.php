<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>Hackers Poulette</title>
</head>
<body>
<div class="container">
	<form class="well span12" action="index.php" method="post">
        <div class="row">
            <div class="span5">
                <label>Prénom :</label> <input class="span5" id="prenom"  placeholder="Prénom" type="text" name="prenom" required> 
                <label>Nom :</label><input class="span5" id="nom" placeholder="Nom" type="text" name="nom" required>
                <label>Adresse Email :</label> <input class="span5"  id="email" placeholder="E-mail" type="text" name="email" required> 
                <label>Pays :</label>
                <select class="span5" id="Pays" name="Pays"  required>
                    <option selected value="na">
                        Choisis un pays:
                    </option>
                    <option value="AL" >Allemagne</option>
                    <option value="AUS" >Australie</option>
                    <option value="AUT" >Autriche</option>
                    <option value="BE" >Belgique</option>
                    <option value="BR" >Brésil</option>
                    <option value="BU" >Bulgarie</option>
                    <option value="CAM" >Cameroun</option>
                    <option value="CAN" >Canada</option>
                    <option value="CRO" >Croatie</option>
                    <option value="ES" >Espagne</option>
                    <option value="ET" >Etats unis</option>
                    <option value="FI" >Finlande</option>
                    <option value="FR" >France</option>
                    <option value="GI" >Gibraltar</option>
                    <option value="GR" >Groenland</option>
                    <option value="HO" >Hongrie</option>
                    <option value="IT">Italie</option>
                    <option value="JA">Japon</option>
                    <option value="PA" >Pays-bas</option>
                    <option value="PO" >Portugal</option>
                </select>
                    <label for="genre" id="genre" >Genre :</label>
                        <input type="radio" name="genre" value="Femme" id="Femme" required>
                        <span>Femme</span>
                        <input type="radio" name="genre" value="Homme" id="Homme" required>
                        <span>Homme</span>
                        
            </div>
            <input type="checkbox" name="contact_me_by_fax_only" value="1" style="display:none !important" tabindex="-1" autocomplete="off">
            <div class="span7">
            <label>Sujet :</label>
                <select  id="sujet" name="sujet">
                    <option selected value="na">
                        Choisis un langage:
                    </option>
                    <option value="Php">PHP</option>
                    <option value="Javascript">Javascript</option>
                    <option value="Html">HTML</option>
                    <option value="CSS">CSS</option>
                </select>
                <label>Message</label> 
                <textarea class="input-xlarge span7" id="message" name="message" rows="10" placeholder=" Insérer votre message" required></textarea>
            </div>
            <button class="btn btn-primary pull-right" type="submit">Envoyer</button>
        </div>
    </form>
</div>
<?php
$options = array(
    'prenom' 	    => FILTER_SANITIZE_STRING,
    'nom' 	        => FILTER_SANITIZE_STRING,
    'email' 		=> FILTER_VALIDATE_EMAIL,
    'Pays'          => FILTER_SANITIZE_STRING,
    'genre'         => FILTER_SANITIZE_STRING,
    'sujet'         => FILTER_SANITIZE_STRING,
    'message' 		=> FILTER_SANITIZE_STRING);


    $result = filter_input_array(INPUT_POST, $options);

    if ($result != null AND $result != FALSE) {

        echo "Clean! <br>";
    
    } else {
    
        echo "Un champ est vide ou n'est pas correct!";
    
    }

    foreach($options as $key => $value) 
    {
       $result[$key]=trim($result[$key]);
    }
    
    print_r ($result["prenom"] . "<br>");
    print_r ( $result["nom"] . "<br>");
    print_r ($result["email"] . "<br>");
    print_r ($result["Pays"] . "<br>");
    print_r ($result["genre"] . "<br>");
    print_r ($result["sujet"]."<br>");
    print_r ($result["message"] . "<br>");


    $honeypot = FALSE;
if (!empty($_REQUEST['contact_me_by_fax_only']) && (bool) $_REQUEST['contact_me_by_fax_only'] == TRUE) {
    $honeypot = TRUE;
    log_spambot($_REQUEST);
} else {
    $to      = 'raphaelo0191@gmail.com';
$subject = $result["sujet"];
$message = 'confirmation de form';
$headers = array(
    'From' => $result["email"],
    'Name' => $result["prenom"]." ".$result["nom"],
    'Pays' => $result["Pays"],
    'Genre' => $result["genre"],
    'Message' => $result["message"]


);

mail($to, $subject, $message, $headers)
}
    ?>
</body>
</html>