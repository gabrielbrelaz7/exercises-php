<?php

include_once("../exercises-php/config.php");
include_once("../exercises-php/controllers/exercise8.php");


if( isset($_GET['idLeitor'])) {
    $idLeitor = $_GET['idLeitor'];
    $result = $dbConn->query("SELECT * from pessoa_exercise8");
    $rowsPessoas = $result->fetchAll(PDO::FETCH_ASSOC);
}


if( isset($_GET['idLivro'])) {
    $idLivro= $_GET['idLivro'];
    $result = $dbConn->query("SELECT * from livro_exercise8");
    $rowsLivro = $result->fetchAll(PDO::FETCH_ASSOC);
}

if( isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $dbConn->query("SELECT * from exercise${id}");
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
}


?>

<html>
    <head>
    <meta charset="UTF-8">
        <title>Homepage</title>

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

        <h1>Respostas</h1>

            <?php
            if(isset($id)) {
    foreach($rows as $row) {
    ?>
            <div class="questao">
                <div class="element">        
                <label>Questão</label>
                <?php echo $row['number'] ?>
                </div> 
                
                
                <div class="element">        
                <label>Resposta:</label>
                <?php echo $row['answer'] ?>
                </div>  
            </div>
            

            <?php
    }}
?>



        <?php
            if( isset($idLivro)) {
                foreach($rowsLivro as $rowLivro) {
            ?>

            <div class="element">        
            <label>Título:</label>
            <?php echo $rowLivro['titulo'] ?>
            </div> 
            
            
            <div class="element">        
            <label>Autor:</label>
            <?php echo $rowLivro['autor'] ?>
            </div>  
                                
            <div class="element">        
            <label>Página Atual:</label>
            <?php echo $rowLivro['pagAtual'] ?>
            </div> 

            <div class="element">        
            <label>Aberto:</label>
            <?php 
            if($rowLivro['aberto'] == 0) {
                echo 'Não';
            }
            if($rowLivro['aberto'] == 1) {
                echo 'Sim';
            }
            ?>
            </div> 

            <div class="element">        
            <label>Leitor:</label>
            <?php echo $rowLivro['leitor'] ?>
            </div> 
            
                

            <button onclick="abrirLivro('<?php echo $rowLivro['id'] ?>')" id="abrirLivro<?php echo $rowLivro['id'] ?>" value="<?php echo $rowLivro['id']?>">Abrir livro</button></tr>
            <button onclick="fecharLivro('<?php echo $rowLivro['id'] ?>')" id="fecharLivro<?php echo $rowLivro['id'] ?>" value="<?php echo $rowLivro['id']?>">Fechar livro</button></tr>
            <button onclick="folhearLivro('<?php echo $rowLivro['id'] ?>')" id="folhearLivro<?php echo $rowLivro['id'] ?>" value="<?php echo $rowLivro['id']?>">Folhear livro</button></tr>
            <button onclick="avancarLivro('<?php echo $rowLivro['id'] ?>')" id="avancarLivro<?php echo $rowLivro['id'] ?>" value="<?php echo $rowLivro['id']?>">Avançar página</button></tr>
            <button onclick="voltarLivro('<?php echo $rowLivro['id'] ?>')" id="voltarLivro<?php echo $rowLivro['id'] ?>" value="<?php echo $rowLivro['id']?>">Voltar página</button></tr>
            <button onclick="visualizarDetalhes('<?php echo $rowLivro['id'] ?>')" id="visualizarDetalhes<?php echo $rowLivro['id'] ?>" value="<?php echo $rowLivro['idLeitor']?>">Visualizar Detalhes</button></tr>

            <input id="idLivro" type="hidden" value="<?php echo $rowLivro['id']?>">

            <br><br><br>

            <?php
                }}
            ?>
        
        </table>

        <?php
            if(isset($idLeitor)) {
                foreach($rowsPessoas as $rowPessoa) {
            ?>

            <div class="block">

           <label>
                    Nome
           </label>  
           <input type="text" value="<?php echo $rowPessoa['nome'] ?>" readonly>
           
           <label>
                    Sexo
           </label> 
           <input type="text" value="<?php echo $rowPessoa['sexo'] ?>" readonly>

           <label>
                    Idade
           </label>
           <input type="text" value="<?php echo $rowPessoa['idade'] ?>" readonly>
                    
       
            <button onclick="fazerAniversario('<?php echo $rowPessoa['id']?>')" value="<?php echo $rowPessoa['id']?>">Fazer aniversário</button></tr>

            <input id="idPessoa<?php echo $rowPessoa['id']?>" type="hidden" value="<?php echo $rowPessoa['id']?>">

            </div>
        <?php
                }}
            ?>

    </body>
</html>