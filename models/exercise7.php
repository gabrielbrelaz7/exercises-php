<?php

include_once("../config.php");

    $question = $_POST['question'];
    $id = $_POST['id'];
    $sideA = $_POST['sideA'];
    $sideB = $_POST['sideB'];
    $sideC = $_POST['sideC'];
    $typeTriangle = $_POST['typeTriangle'];
    $response = "O triângulo com medidas de $sideA, $sideB, $sideC é do tipo $typeTriangle";

    if(isset($id)) {

    $sql = "INSERT INTO `exercise${id}`(number, question, answer) VALUES (:number, :question, :answer)";
    $query = $dbConn->prepare($sql);
            
    $query->bindparam(':number', $id);
    $query->bindparam(':question', $question);
    $query->bindparam(':answer', $response);
    $query->execute();
}   
   ?>     