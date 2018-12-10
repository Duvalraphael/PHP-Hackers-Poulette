/*Mon formulaire en avait un present et fonctionnel mais je voulais voir si je savais le faire de moi même */

$(document).ready(function(){

    $('.submit').click(function(){
        validateForm();   
    });
    
    let validateForm =()=> {

        const nameReg = /^[A-Za-z]+$/;
        const numberReg =  /^[0-9]+$/;
        const emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    
        let prenom = $('#prenom').val();
        let nom = $('#nom').val();
        let email = $('#email').val();
        let Pays = $('#Pays').val();
        let genre =$("input[name=genre]:checked").length
        let message = $('#message').val();



        var inputVal = new Array(prenom, nom, email, Pays, genre, message);
    
        var inputMessage = new Array("Prénom", "Nom", "email", "Pays", "genre", "message");
    
         $('.error').hide();
    
            if(inputVal[0] == ""){
                $('#labelPrenom').after('<span class="error"> Veuillez entrer votre ' + inputMessage[0] + '</span>');
            } 
            else if(!nameReg.test(prenom)){
                $('#labelPrenom').after('<span class="error"> Seul les lettres sont autorisée </span>');
            }
    
            if(inputVal[1] == ""){
                $('#labelNom').after('<span class="error"> Veuillez entrer votre ' + inputMessage[1] + '</span>');
            }
            else if(!nameReg.test(nom)){
                $('#LabelNom').after('<span class="error"> Seul les lettres sont autorisée </span>');
            }
    
            if(inputVal[2] == ""){
                $('#labelEmail').after('<span class="error"> Veuillez entrer votre ' + inputMessage[2] + '</span>');
            } 
            else if(!emailReg.test(email)){
                $('#labelEmail').after('<span class="error"> Veuillez entrer une adresse e-mail valide </span>');
            }
    
            if(inputVal[3] == "na"){
                $('#labelPays').after('<span class="error"> Veuillez entrer votre ' + inputMessage[3] + '</span>');
            } 
            else if(!numberReg.test(telephone)){
                $('#labelPays').after('<span class="error"> Veuillez choisir </span>');
            }
            
            if (genre < 1){
                alert("Veuillez entrer votre genre.");
            }
          /*  if((inputVal[4] != "Femme" ) || (inputVal[4] != "Homme")){
                $('#labelGenre').after('<span class="error"> Veuillez entrer votre ' + inputMessage[4] + '</span>');
            }*/
            
            if(inputVal[5] == ""){
                $('#labelMessage').after('<span class="error"> Veuillez entrer votre ' + inputMessage[5] + '</span>');
            } 
    }   
    
    });