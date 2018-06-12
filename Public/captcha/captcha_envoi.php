<html>
<head>

<style>
body {

                background-color: #ffffff;
                color: #000000;
                font-family: Verdana,Georgia, "Times New Roman", Times, serif;
                font-size: 12px;
                margin-top: 5px;
                margin-bottom: 0px;
                text-align: center;
                width: 99%;

}

a, a:link, a:visited {
                text-decoration: none;
                color: #6099FC;
}
a:hover, a:visited:hover {
                text-decoration: underline;
                color: #ADD1F4;
}

fieldset2 {
  border:1px solid #3366CC;
  background-color: #FFE;
}

fieldset

{

     border:1px dashed #ADD1F4;
     border-color:#ADD1F4 ;
     font-family: Verdana,Arial, Helvetica, sans-serif;
                font-size: 10px;
}
legend

{


     font-family: Verdana,Arial, Helvetica, sans-serif;
                font-size: 12px;
                font-weight:bold;
}
h1

{


     font-family: Verdana,Arial, Helvetica, sans-serif;
                font-size: 14px;
                 color: #6099FC;
}
input[type=submit] {
                border: #3366CC 1px solid;
                font-size: 8pt;
                color: #000000;
                font-family: verdana;
                background-color: #ADD1F4;
                text-align: center
}
input[type=reset] {
                border: #3366CC 1px solid;
                font-size: 8pt;
                color: #000000;
                font-family: verdana;
                background-color: #ADD1F4;
                text-align: center
}
#table_tableau {
font-size : 10px;
padding : 5px;
border-collapse : collapse;
border : 3px solid #efefef;
margin : 8px;
}

#tr_tableau {
padding : 5px;
border-collapse : collapse;
border :1px solid #3399FF;
background-color:#3399FF;
margin : 10px;
}
#th_tableau {
color: #3399FF;
padding : 5px;
border-collapse : collapse;
border : 1px solid #3399FF;
text-align : center;
margin : 10px;
height : 10px;
background-color : #dfdfdf;
}
#td_tableau {
padding : 5px;
border-collapse : collapse;
border : 1px solid #6099FC;
margin : 10px;
background-color : #ADD1F4;
}
#td_tableau2 {
padding : 5px;
border-collapse : collapse;
border : 1px solid #6099FC;
margin : 10px;
background-color : #E1E6FA;
}
@font-face {
                                font-family: ttf;
                                src: url(ttf/akaDylan_Plain.ttf);
                        }
dd {
                                width: 350px;
                        }
                        #eot {
                                font-family: eot, sans-serif;
                        }
                        #pfr {
                                font-family: pfr, sans-serif;
                        }
                        #svg {
                                font-family: svg, sans-serif;
                        }
                        #ttf {
                                font-family: ttf, sans-serif;
                        }
</style>
</head>
<body>
<table width="500" align="center" border="0" cellspacing="10" cellpadding="10">
   <tr><td>
  <fieldset id="fieldset"><legend><font size='+3'><dd id="ttf">Exemple Captcha</dd></legend>
 <table width="400" align="center" border="0" cellspacing="0" cellpadding="2" id='table_tableau'">


        <tr id='tr_tableau'>

        <td valign='top' id='td_tableau'>
<?php
         // Instruction 1
 $fp = fopen ("compteur.txt", "r+");
 // Instruction 2
 $nb_visites = fgets ($fp, 11);
 // Instruction 3
 $nb_visites = $nb_visites + 1;
 // Instruction 4
 fseek ($fp, 0);
 // Instruction 5
 fputs ($fp, $nb_visites);
 // Instrcution 6
 fclose ($fp);

        $Username = $_POST['Username'];
        $Username2 = $_POST['Username2'];
        $Usermail = $_POST['Usermail'];
        $key = $_POST['key'];
        $capcha = $_POST['capcha'];

        $UserMessage = htmlentities($_POST['TextData']);
        $date=date('m-d-Y à H:i');

        //LISTE DE MOTS INTERDITS SERONT REMPLACES PAR *
        $UserMessage = str_replace("pute"," * ",$UserMessage);
        $UserMessage = str_replace("salope","* ",$UserMessage);
        $UserMessage = str_replace("bite","*",$UserMessage);
        $UserMessage = str_replace("couille","* ",$UserMessage);
        $UserMessage = str_replace("enculé"," * ",$UserMessage);
        $UserMessage = str_replace("encule"," *",$UserMessage);


        //RECOPIER LA LIGNE ET AJOUTEZ A LA SUITE POUR VOS PROPRES DEFINITIONS DE MOTS INTERDITS ET METTRE A LA SUITE
        $UserMessage = str_replace("sucer","* ",$UserMessage);
        $UserMessage = str_replace("suce","* ",$UserMessage);

        //FIN DES MOTS INTERDITS
         function VerifierAdresseMail($Usermail)
{
   $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
   if(preg_match($Syntaxe,$Usermail))
      return true;
   else
     return false;
}


         if ($Username == ""){
                echo "<script>window.alert('Veuillez Entrer  votre prénom.');history.go(-1);</script>";
                exit;
        }
         if ($Username2 == ""){
                echo "<script>window.alert('Veuillez Entrer  votre nom.');history.go(-1);</script>";
                exit;
        }
         if ($Usermail == ""){
                echo "<script>window.alert('Veuillez Entrer  un email .');history.go(-1);</script>";
                exit;
        }
         if ($UserMessage == ""){
                echo "<script>window.alert('Veuillez entrer  un message et respecter la Net Etiquette Cool et fair-play. Il y a des mots interdits, seront remplacés par *');history.go(-1);</script>";
                exit;
        }

         if ($key == ""){
                echo "<script>window.alert('Veuillez recopier le code SVP *');history.go(-1);</script>";
                exit;
        }

        if ($capcha==$key) {

        echo'';
         } else {

       echo "<script>window.alert('Erreur dans le code ');history.go(-1);</script>";
                exit;
                }

                echo 'Posté le  '.$date.'<br/>'.ucfirst($Username).'  '.ucfirst($Username2).'  <br/>  '.$Usermail.' <br/>  '.$UserMessage.'<br/>Votre code est exact !';

        $Usermail=htmlentities($_POST['Usermail']);
if(VerifierAdresseMail($Usermail)) {
  echo '';
}else{
  echo "<script>window.alert('Votre email est invalide ');history.go(-1);</script>";

  }







                 $prenom=ucfirst($Username);
                 $nom=ucfirst($Username2);
                 $mail=$Usermail;



$message  =  "$prenom $nom ,votre  test  du $date a  réussi \n";
$message.="Votre message : $UserMessage\n\n";
$message.="D'autres srcipts sur http://www.villalespensees.fr/ephemeride/demo.php\n\n";
$to = "$mail"; //  email destinataire
$from = "$mail"; /*url ou votre email*/
$msg = "Subject :Votre test\n";
$msg .= "$message \n";

mail($to, "Test captcha ", $msg);
                ?>
              <br/><a href="captcha_exemple.php">Retour</a></td></tr></table>
         </fieldset></td></tr></table>

