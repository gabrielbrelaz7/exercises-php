<?php

include_once("../config.php");

    $question = $_POST['question'];
    $id = $_POST['id'];
    $firstNumber = $_POST['firstNumber'];
    $lastNumber = $_POST['lastNumber'];
    $response = "O primeiro número é $firstNumber e o último é $lastNumber";

    if(isset($id)) {

    $sql = "INSERT INTO `exercise${id}`(number, question, answer) VALUES (:number, :question, :answer)";
    $query = $dbConn->prepare($sql);
            
    $query->bindparam(':number', $id);
    $query->bindparam(':question', $question);
    $query->bindparam(':answer', $response);
    $query->execute();
}
        
   ?>     