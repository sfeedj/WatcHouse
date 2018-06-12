<?php

         $datecreation="30-03-20011";
         $nom_site="Villalespensees.fr";
         $Version="V1.0";
         $date=date('Y');

         $Username = @$_POST['Username'];
         $Username2 = @$_POST['Username'];
         $Usermail = @$_POST['Usermail'];
         $key = @$_POST['key'];



?>
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
                font-size: 10px;
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
<body><center>
  <form name="frm" method="post" action="captcha_envoi.php">
   <table width="500" align="center" border="0" cellspacing="10" cellpadding="10">
   <tr><td> <h1>Captcha sans sessions et GD compatible tout hébergeur offrant le php.<br/>C'est un simple rand qui est utilisé  pour créer le code, ici 4 chiffres.
   avec du style en utlisant la police akaDylan_Plain.ttf en n'utilisant que les chiffres.</h1><dd id="ttf">0 1 2 3 4 5 6 7 8 9</dd>
  <fieldset id="fieldset"><legend><font size='+3'><dd id="ttf">Exemple Captcha</dd></font></legend>
 <table width="400" align="center" border="0" cellspacing="0" cellpadding="2" id='table_tableau'">


        <tr id='tr_tableau'>

        <td valign='top' id='td_tableau'>
        <small>Prénom </td>
        <td id='td_tableau2'>
        <input maxlength=30 class=namebox tabvalue=1 type=text id=Username name=Username value="<?php echo $Username;?>">
        </td>
        </tr>
        <tr>
        <td id='td_tableau2'>
        <small>Nom </td>
        <td id='td_tableau'>
        <input maxlength=30 class=namebox tabvalue=1 type=text id=Username2 name=Username2 value="<?php echo $Username2;?>">
        </td>
        </tr>
        <tr>
        <td id='td_tableau'>
        <small>Mail
        </td>
        <td id='td_tableau2'>
        <input maxlength=30 class=namebox tabvalue=1 type=text id=Usermail name=Usermail value="<?php echo $Usermail;?> ">
       </td>
       </tr>
       <td id='td_tableau2'><small>Message</td>
        <td id='td_tableau'><TEXTAREA name=TextData ROWS='5' COLS='23'></TEXTAREA>

         </td> </tr>
        <tr>
        <td id='td_tableau'><small>Veuillez recopier le code </td>

        <td id='td_tableau2'><input type='text' name='key' />
         </td></tr>
       <tr>
       <td id='td_tableau2'><small>Code</td>

       <td id='td_tableau' background='ttf/fond.gif'>
       <?php
        mt_srand((float) microtime()*1000000);
         //affiche 1 nombre aléatoire entre 1000 et 10 000
         //augmentez si vous voulez 6 chiffres  10 000  et 100 000  etc....

       $capcha=mt_rand(1000, 10000);
       echo '<h1><dd id="ttf"><font size="+3"><strong>'.$capcha.'</font></strong></h1></dd>';

?>
         <input type='hidden' name='capcha' value='<?php echo $capcha;?>' />


         </td></tr>
          <tr> <td  id='td_tableau'>Testé : <?php include('compteur.txt');?> fois</td><td id='td_tableau2'>



        <input  type=submit  name=go value=Go />
         <input class=reset  type=reset value=Effacer name=reset> <a href="captcha_exemple.php" title="Cliquez pour renoveler le code">Nouveau Code</a>
       </form>
         </td></tr>
         <tr> <td  id='td_tableau'>Téléchargez <a href="http://www.villalespensees.fr/ephemeride/captcha.zip" title="Téléchargemoi je suis gratuit !">ici</a></td>
         <td>Copyright  &#169; <?php echo''.$datecreation.'';?>  - <?php echo''.$date.'';?>  &#174;  <a href="http://www.villalespensees.fr/ephemeride/demo.php" target="_blanck"> <?php echo''.$nom_site.'';?></a>  <?php echo'Version '.$Version.'';?></td></tr>
         </table>
         </fieldset></td></tr></table>