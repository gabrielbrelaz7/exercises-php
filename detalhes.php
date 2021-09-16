<?php

include_once("../exercises-php/config.php");
include_once("../exercises-php/controllers/exercise8.php");


if( isset($_GET['idLivro'])) {
    $idLivro= $_GET['idLivro'];
    $result = $dbConn->query("
    
    SELECT * from livro_exercise8
    INNER JOIN pessoa_exercise8
    ON livro_exercise8.idPessoa = pessoa_exercise8.id
    WHERE livro_exercise8.id = ${idLivro};
    ");

    $rowsLivroPessoa = $result->fetchAll(PDO::FETCH_ASSOC);
}


?>

<html>
    <head>
    <meta charset="UTF-8">
        <title>Detalhes</title>

        <style>
            .questao:last-child {
                background: blue;
                color: white;
            }

            .block {
                display: block;
            }
        </style>
    </head>

    <body>

        <a href="index.php">Voltar para as questões</a><br/><br/>

        <h1>Detalhes</h1>



        <?php
            if( isset($idLivro)) {
                foreach($rowsLivroPessoa as $rowLivroPessoa) {
            ?>

            <div class="element">        
            <label>Nome:</label>
            <?php echo $rowLivroPessoa['nome'] ?>
            </div> 

            <div class="element">        
            <label>Sexo:</label>
            <?php echo $rowLivroPessoa['sexo'] ?>
            </div> 

            <div class="element">        
            <label>Idade:</label>
            <?php echo $rowLivroPessoa['idade'] ?>
            </div> 
            
            <div class="element">        
            <label>Autor:</label>
            <?php echo $rowLivroPessoa['autor'] ?>
            </div>  
            
                        
            <div class="element">        
            <label>Total de Páginas:</label>
            <?php echo $rowLivroPessoa['totPaginas'] ?>
            </div> 

                                
            <div class="element">        
            <label>Página Atual:</label>
            <?php echo $rowLivroPessoa['pagAtual'] ?>
            </div> 

            <div class="element">        
            <label>Aberto:</label>
            <?php echo $rowLivroPessoa['aberto'] ?>
            </div> 

            <div class="element">        
            <label>Leitor:</label>
            <?php echo $rowLivroPessoa['leitor'] ?>
            </div> 
    

            <input id="idLivro" type="hidden" value="<?php echo $rowLivroPessoa['id']?>">

            <br><br><br>

            <?php
                }}
            ?>
    
    </body>
</html>