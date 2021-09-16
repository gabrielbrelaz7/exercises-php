<?php

include_once("../config.php");

    $questao = $_POST['questao'];
    $resposta = $_POST['media'];
    $id = $_POST['id'];

	if(isset($resposta) && isset($id) && isset($questao)) {	

            $sql = "INSERT INTO `exercise${id}`(number, question, answer) VALUES (:number, :question, :answer)";

            $query = $dbConn->prepare($sql);
            $query->bindparam(':number', $id);
            $query->bindparam(':question', $questao);
            $query->bindparam(':answer', $resposta);
            $query->execute();
            
    }
 
   ?>     