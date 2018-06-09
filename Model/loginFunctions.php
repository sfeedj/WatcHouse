<?php
session_start();

include_once('bddConnect.php');

function checkID($username, $password, $bdd){
  $req = $bdd->prepare('SELECT ID, password FROM users WHERE username = ?');
  $req->execute(array($username));
  $resultat = $req->fetch();

  // Comparaison du pass envoyé via le formulaire avec la base
  $isPasswordCorrect = ($password==$resultat['password'])?true:false;

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

  // Comparaison du pass envoyé via le formulaire avec la base
  $isPasswordCorrect = ($password==$resultat['password'])?true:false;

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
        "Vous avez demandé un renouvellement de mot de passe," ."\r\n" .
        "Votre nouveau mot de passe provisoire est:"  . $password . "\r\n" .
        "Nous vous invitons à le modifier dès que possible." . "\r\n" .
        "Cordialement," . "\r\n" .
        "L'équipe Domisep";
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
        $req->execute(array($password, $resultat['ID']));
        sendMailWithNewPassword($email, $resultat['username'], $password);
    }

}
?>
