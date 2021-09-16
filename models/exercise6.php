<?php

include_once("../config.php");

    $question = $_POST['question'];
    $id = $_POST['id'];
    $dayWeek = $_POST['dayWeek'];
    $response = "O dia da semana é $dayWeek";

    if(isset($id)) {

    $sql = "INSERT INTO `exercise${id}`(number, question, answer) VALUES (:number, :question, :answer)";
    $query = $dbConn->prepare($sql);
            
    $query->bindparam(':number', $id);
    $query->bindparam(':question', $question);
    $query->bindparam(':answer', $response);
    $query->execute();
}   
   ?>     