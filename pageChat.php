<?php
session_start(); // connexion à la session
$pseudo = $_POST['pseudo']; // recupération de la variable pseudo dans sess...
$_SESSION['pseudo'] = $pseudo; //... et stockage dans la variable de session
?>

<!DOCTYPE html>

<html>
    <head>
        <script src="JS/jquery-3.1.1.js" type="text/javascript"></script>
        <script type="text/javascript">

            function rafraichirMsgCallback(msgs) {
                $("#chat").html("");
                
                for (i=0;i<msgs.length;i++) {
                    
                    var msg = msgs[i];
                    
                    $("#chat").html( $('#chat').html()+msg.dateheure+' - '+msg.pseudo+': '+msg.message+'<br>');
                    
                }
            }

            function rafraichirMessage() {
                $.getJSON("ajaxAffichageMessage.php", rafraichirMsgCallback);

            }

            $(function () {// Execute qd page cptmt charge

                setInterval(rafraichirMessage, 1000);
            });

            function clicBoutonEnvoyer() {

                // création d'un objet Params
                var Params = {message: $("#msg").val()};
                $('#msg').val("");

                $.post("ajaxAjouterMessage.php", Params);
            }

            function creationSession() {

            }

        </script>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>chat</title>
    </head>

    <body>


        <div id="container">
            container
            <div id="chat">


            </div><br>
            <div id="chatInput">
                <form action="ajaxAjouterMessage.php">
                    message:<input type="text" id="msg" name="msg"><br>
                    <button type="button" onclick="clicBoutonEnvoyer();">Envoyer</button>
                </form>        
            </div>
        </div>


    </body>

</html>
