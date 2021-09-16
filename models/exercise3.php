<?php

include_once("../config.php");

    $question = $_POST['question'];
    $id = $_POST['id'];
    $response = $_POST['temperature'];

    if(isset($id)) {

    $sql = "INSERT INTO `exercise${id}`(number, question, answer) VALUES (:number, :question, :answer)";
    $query = $dbConn->prepare($sql);
            
    $query->bindparam(':number', $id);
    $query->bindparam(':question', $question);
    $query->bindparam(':answer', $response);
    $query->execute();
    
}
            
   ?>     