<?php
function GetQuestions (){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->prepare("SELECT id,question,reponse FROM faq WHERE visible=TRUE");
    $req->execute();
    $result = $req->fetchAll();
    return($result);
}
function GetQuestionsToAnswer(){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->prepare("SELECT id,question FROM faq WHERE reponse IS NULL");
    $req->execute();
    $result = $req->fetchAll();
    return($result);
}
function AddAnswer($idQuestion, $answer, $idAdmin){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->prepare("UPDATE faq SET reponse=:answer, id_user_reponse=:idAdmin WHERE id=:idQuestion");
    $req->execute(["answer" => htmlspecialchars($answer), "idAdmin" => $idAdmin, "idQuestion" => $idQuestion]);
    return($req->fetch());
}
function AddQuestionToFaq($idQuestion){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->prepare("UPDATE faq SET visible=TRUE WHERE id=:idQuestion");
    $req->execute(["idQuestion" => $idQuestion]);
    return($req->fetch());
}
function SendMailWithAnswer($idQuestion, $reponse){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->prepare("SELECT users.email,users.username,faq.question FROM users JOIN faq ON users.ID=faq.id_user_question WHERE faq.id=:idQuestion");
    $req->execute(["idQuestion" => $idQuestion]);
    $result = $req->fetch();
    $email = $result['email'];
    $username = $result['username'];
    $question = $result['question'];
    $to      = $email;
    $subject = 'Réponse à votre question';
    $message =
        "Bonjour " . $username . ",\r\n" .
        "La réponse à votre question :\r\n\r\n" . $question . "\r\n\r\n" .
        "est la suivante :\r\n\r\n" . $reponse . "\r\n\r\n" .
        "Cordialement, " . "\r\n" .
        "L'équipe WatcHouse.";
    $headers = 'From: WatchHouse.isep@gmail.com' . "\r\n" .
        'Reply-To: WatchHouse.isep@gmail.com' . "\r\n" .
        'Content-Type: text/plain; charset = "utf8"' . "\r\n";
    mail($to, $subject, $message, $headers);
}
function DeleteQuestion($idQuestion){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->prepare("DELETE FROM faq WHERE id=:idQuestion");
    $req->execute(["idQuestion" => $idQuestion]);
    return($req->fetch());
}
function AddQuestion($id_user_question, $question){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->prepare("INSERT INTO faq(id_user_question, question, visible) Values(:id_user_question, :question, FALSE)");
    $req->execute(["id_user_question" => $id_user_question, "question" => htmlspecialchars($question)]);
    return($req->fetch());
}


function urlImage($username,$bdd) {
    $req=$bdd->query("SELECT image FROM users WHERE username='$username' ");
    while ($donnees = $req->fetch())
    {
      $urlPhoto=$donnees['image'];
      if($urlPhoto!=""){
      return "<img src='".$urlPhoto."' alt='photo'/>";
      }
      else{
      return "<img src='../Public/images/userPhoto.png' alt='photo-profil'/>";
      }
    }
  }
