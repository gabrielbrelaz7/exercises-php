<?php

include_once("../config.php");
include_once("../controllers/exercise5.php");

$id = $_GET['id'];
if( isset($id)) {
    $result = $dbConn->query("SELECT * from exercise${id} LIMIT 1");
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
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

    <label>Insira um número abaixo</label>
    <input type="number" name="number1" id="number1">

    <label>Insira outro número abaixo:</label>
    <input type="number" name="number2" id="number2">

    <div id="add"></div>

    <input type="hidden" value="<?php echo $row['number'] ?>" id="question_number">
    <input
        type="hidden"
        value="<?php echo $row['question'] ?>"
        id="question_description">

    <button id="add_number" value="3">
        Adicionar mais números
    </button>

    <button id="resposta5">
        Ir para a resposta        
    </button>

</form>
</body>

</html>