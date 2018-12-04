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
	<form class="well span12" action="index.php">
        <div class="row">
            <div class="span5">
                <label>Prénom :</label> <input class="span5" id="prenom" alt="Prénom" placeholder="Prénom" type="text" name="prenom" required> 
                <label>Nom :</label><input class="span5" id="nom" alt="Nom" placeholder="Nom" type="text" name="nom" required>
                <label>Adresse Email :</label> <input class="span5" placeholder="E-mail" type="text" name="email" required> 
                <label>Pays :</label>
                <select class="span5" id="Pays" name="Pays" alt="Pays">
                    <option selected value="na">
                        Choisis un pays:
                    </option>
                    <option value="AL" alt="Allemagne">Allemagne</option>
                    <option value="AUS" alt="Australie">Australie</option>
                    <option value="AUT" alt="Autriche">Autriche</option>
                    <option value="BE" alt="Belgique">Belgique</option>
                    <option value="BR" alt="Brésil">Brésil</option>
                    <option value="BU" alt="Bulgarie">Bulgarie</option>
                    <option value="CAM" alt="Cameroun">Cameroun</option>
                    <option value="CAN" alt="Canada">Canada</option>
                    <option value="CRO" alt="Croatie">Croatie</option>
                    <option value="ES" alt="Espagne">Espagne</option>
                    <option value="ET" alt="Etats unis">Etats unis</option>
                    <option value="FI" alt="Finlande">Finlande</option>
                    <option value="FR" alt="France">France</option>
                    <option value="GI" alt="Gibraltar">Gibraltar</option>
                    <option value="GR" alt="Groenland">Groenland</option>
                    <option value="HO" alt="Hongrie">Hongrie</option>
                    <option value="IT" alt="Italie">Italie</option>
                    <option value="JA" alt="Japon">Japon</option>
                    <option value="PA" alt="Pays-Bas">Pays-bas</option>
                    <option value="PO" alt="Portugal">Portugal</option>
                </select>
                    <label >Genre :</label>
                    <select class="span5" id="genre" name="genre" alt="genre">
                        <option selected value="na">
                                Choisis un genre :
                        </option>
                        <option value="Fe" id="Femme" alt="Femme"> Femme </option>
                        <option value="Ho" id="Homme" alt="Homme"> Homme </option>
                    </select>
            </div>
            <div class="span7">
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

    print_r ($result['firstname'] . "<br>");
    print_r ( $result['lastname'] . "<br>");
    print_r ($result['email'] . "<br>");
    print_r ($result['country'] . "<br>");
    print_r ($result["message"] . "<br>");
?>
</body>
</html>