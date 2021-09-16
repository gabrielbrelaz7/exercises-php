<?php

include_once("../config.php");
include_once("../controllers/exercise2.php");

$id = $_GET['id'];
if( isset($id)) {
    $result = $dbConn->query("SELECT * from exercise${id} LIMIT 1");
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
}

else {
    print_r("Falha na consulta ao banco de dados");
}

?>

<html>
    <head>
        <title>Exercícios PHP</title>
    </head>

    <body>
        <a class="back" href="../index.php">Voltar para as questões</a><br/><br/>

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

    <form></br>

    <label>Digite o CPF:</label>
    <input type="text" name="cpf" id="cpf">

    <input type="hidden" value="<?php echo $row['number'] ?>" id="question_number">

    <label>Escolha um cachorro:</label>
    <select id="pets" name="pets">
        <option value="Poddle">Poddle</option>
        <option value="Pitbull">Pitbull</option>
        <option value="Golden Retriver">Golden Retriver</option>
        <option value="Labrador">Labrador</option>
    </select>

    <input
        type="hidden"
        value="<?php echo $row['question'] ?>"
        id="question_description">

    <button id="resposta2">
        Ir para a resposta
    </button>

</form>
</body>

</html>