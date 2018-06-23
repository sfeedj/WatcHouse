<?php
session_start();

include_once('bddConnect.php');

function checkID($username, $password, $bdd){
  $req = $bdd->prepare('SELECT ID, password FROM users WHERE username = ?');
  $req->execute(array($username));
  $resultat = $req->fetch();

  // Comparaison du pass envoye via le formulaire avec la base
  $isPasswordCorrect = password_verify($password, $resultat['password']);
  
  if (!$resultat)
  {
    return false;
  }
  else
  {
    if ($isPasswordCorrect) {
      $_SESSION['ID'] = $resultat['ID'];
      $_SESSION['username'] = $username;
      return true;
    }
    return false;
  }
}

function checkAdmin($username, $password, $bdd){
  $req = $bdd->prepare('SELECT ID, password,admin FROM users WHERE username = ?');
  $req->execute(array($username));
  $resultat = $req->fetch();

  // Comparaison du pass envoye via le formulaire avec la base
  $isPasswordCorrect = password_verify($password, $resultat['password']);


  if (!$resultat)
  {
    return false;
  }
  else{
    if ($isPasswordCorrect AND $resultat['admin']==1) {
      $_SESSION['ID'] = $resultat['ID'];
      $_SESSION['username'] = $username;
      $_SESSION['admin'] = 1;
      return true;
    }
    return false;
  }
}
function sendMailWithNewPassword($email, $username, $password){
    $to      = $email;
    $subject = 'Votre nouveau mot de passe';
    $message =
        "Bonjour " . $username . "," . "\r\n" .
        "Vous avez demande un renouvellement de mot de passe," ."\r\n" .
        "Votre nouveau mot de passe provisoire est:"  . $password . "\r\n" .
        "Nous vous invitons a le modifier des que possible." . "\r\n" .
        "Cordialement," . "\r\n" .
        "L'equipe Domisep";
    $headers = 'From: WatchHouse.isep@gmail.com' . "\r\n" .
        'Reply-To: WatchHouse.isep@gmail.com' . "\r\n" .
        'Content-Type: text/plain; charset = "utf8"' . "\r\n";
    mail($to, $subject, $message, $headers);
}
function resetMdp($email){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->prepare('SELECT username, ID FROM users WHERE email= ?');
    $req->execute(array($email));
    $resultat = $req->fetch();
    if(!$resultat){
        return false;
    }
    else{
        $password=genererMdp();
        $req = $bdd->prepare('UPDATE users SET password=? WHERE ID= ?');
        $req->execute(array(password_hash($password, PASSWORD_DEFAULT), $resultat['ID']));
        sendMailWithNewPassword($email, $resultat['username'], $password);
        return true;
    }
}
function genererMdp($long = 8){
    $chaine = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $speciaux = '*$<>-_';
    $mdp = '';
    for ($k = 0; $k < $long; $k++){
        if ($k == round($long/2)){
            $i = mt_rand(0, strlen($speciaux)-1);
            $c = $speciaux[$i];
        }
        else{
            $i = mt_rand(0, strlen($chaine)-1);
            $c = $chaine[$i];
        }
        $mdp .= $c;
    }
    return $mdp;
}
?>
