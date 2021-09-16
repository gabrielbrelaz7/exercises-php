<?php

include_once("../config.php");
include_once("../controllers/exercise8.php");

$id = $_GET['id'];

if(isset($id)) {
    $result = $dbConn->query("SELECT * from pessoa_exercise${id} LIMIT 1");
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
}

if(isset($id)) {
$resultNomes = $dbConn->query("SELECT * from pessoa_exercise${id}");
$rowsNomes = $resultNomes->fetchAll(PDO::FETCH_ASSOC);
}

?>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="../css/styles.css">

        <title>Exercícios PHP</title>

        <style>
            label {
                display: block;
            }
        </style>
    </head>

    <body>
        <a class="back" href="../index.php">Voltar para as questões</a>

        <table width='80%' border="0">

            <?php foreach($rows as $row) { ?>

            <tr>Questão
                <?php echo $row['number'] ?>
            </tr>

        </br>
        <tr>
            <?php echo $row['question'] ?>
        </tr>

        <?php } ?>

    </table>

    <div class="form">

        <form id="formPeople"></br>
        <h2>Pessoa:</h2>

        <label>Nome Completo:</label>
        <input type="text" name="nome" id="nome0">

        <label>Sexo:</label>
        <select id="sexo0" name="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
        </select>

        <label>Idade:</label>
        <input type="number" name="idade" id="idade0">

        <div id="addFormPeople"></div>

        <input type="hidden" value="<?php echo $row['number'] ?>" id="question_number">
        <input
            type="hidden"
            value="<?php echo $row['question'] ?>"
            id="question_description">
    </form>

    <form id="formBook"></br>

    <h2>Livro:</h2>

    <label>Título:</label>
    <input type="text" name="titulo" id="titulo0">

    <label>Autor:</label>
    <input type="text" name="autor" id="autor0">

    <label>Total de páginas:</label>
    <input type="number" name="totPaginas" id="totPaginas0">

    <label>Página atual:</label>
    <input type="number" name="pagAtual" id="pagAtual0">

    <label>Aberto:</label>
    <select id="aberto0" name="aberto0">
        <option id="valueAberto" value="1">Sim</option>
        <option id="valueFechado" value="0">Não</option>
    </select>

    <div id="addFormBook"></div>

    <h2>Leitor:</h2>

    <select id="leitor" name="leitor">
        <?php 
    foreach($rowsNomes as $rowNome) {
?>
        <option value="<?php echo $rowNome['id'] ?>|<?php echo $rowNome['nome'] ?>">
            <?php echo $rowNome['nome'] ?>
        </option>
        <?php } ?>
    </select>

    <input type="hidden" value="<?php echo $row['number'] ?>" id="question_number">
    <input
        type="hidden"
        value="<?php echo $row['question'] ?>"
        id="question_description">
</form>

</div>

<div class="buttons">
    <button id="insertPessoa">
        Inserir pessoas
    </button>
    <button id="addPessoa" value="1">
        Adicionar mais pessoas
    </button>

    <button id="insertLivro">
        Inserir livros
    </button>
    <button id="addLivro" value="1">
        Adicionar mais livros
    </button>
</div>

</body>

</html>