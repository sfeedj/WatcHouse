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
    $req = $bdd->prepare("SELECT id,question FROM faq WHERE reponse=''");
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

function SendMailWithAnswer($idQuestion, $answer){

}

function DeleteQuestion($idQuestion){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->prepare("DELETE FROM faq WHERE id=:idQuestion");
    $req->execute(["idQuestion" => $idQuestion]);
    return($req->fetch());
}