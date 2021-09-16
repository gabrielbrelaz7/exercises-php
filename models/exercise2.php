<?php

include_once("../config.php");

    $question = $_POST['question'];
    $id = $_POST['id'];
    $pet = $_POST['pet'];
    $cpf = $_POST['cpf'];
    $response = "O CPF " .$cpf. " está validado e o cachorro é " .$pet;

    if(isset($id)) {

    $sql = "INSERT INTO `exercise${id}`(number, question, answer, pet, cpf) VALUES (:number, :question, :answer, :pet, :cpf)";
    $query = $dbConn->prepare($sql);
            
    $query->bindparam(':number', $id);
    $query->bindparam(':question', $question);
    $query->bindparam(':answer', $response);
    $query->bindparam(':pet', $pet);
    $query->bindparam(':cpf', $cpf);
    $query->execute();
}

else{
    var_dump("Falha no registro de banco de dados");
}

   ?>     