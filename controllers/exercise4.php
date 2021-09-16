<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>

<script>

    // Resposta do exercício 4

    $(function () {
        // Executa assim que o botão de salvar for clicado
        $('#resposta4').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            // Pega os valores dos inputs e coloca nas variáveis
            let metros = parseFloat($('#metros').val());
            let id = $('#question_number').val();
            let question = $('#question_description').val();

            const measure = metros * 100;

            // Método post do Jquery
            $.post('../models/exercise4.php', {

                measure: measure,
                id: id,
                question: question

            }, function (resposta) {

                window.location = `../view.php?id=${id}`
            });

        });
    });
</script>