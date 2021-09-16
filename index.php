<?php

include_once("config.php");

$result = $dbConn->query("SELECT DISTINCT number from exercise1 
UNION 
SELECT DISTINCT number from exercise2
UNION 
SELECT DISTINCT number from exercise3
UNION 
SELECT DISTINCT number from exercise4
UNION 
SELECT DISTINCT number from exercise5
UNION 
SELECT DISTINCT number from exercise6
UNION 
SELECT DISTINCT number from exercise7 
UNION 
SELECT DISTINCT number from pessoa_exercise8"
);


$rows = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
    <head>
        <title>Homepage</title>
    </head>

    <body>

        <h1>Exercícios de PHP
        </h1>

        <h3>
        Esses exercícios são para treinamento com PHP. As linguagens de programação utilizadas neste sistema são PHP, MySQL, Ajax, Jquery e Javascript.
        </h3>

    <table width='30%' border="0">

    <?php foreach($rows as $row) { ?>

            <tr>
                <td>Questão
                    <?php echo $row['number'] ?>
                </td>
                <td>
                    <a href="../exercises-php/views/exercise<?php echo $row['number']?>.php?id=<?php echo $row['number']?>">Ir para questão</a><br/>
                </td>
            </tr>

    <?php } ?>

    </table>

    </body>
</html>