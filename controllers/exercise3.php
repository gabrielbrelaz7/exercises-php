<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>

<script>

    // Resposta do exercício 3

    $(function () {
        // Executa assim que o botão de salvar for clicado
        $('#resposta3').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            // Pega os valores dos inputs e coloca nas variáveis
            let celsius = parseInt($('#celsius').val());
            let id = $('#question_number').val();
            let question = $('#question_description').val();

            temperature = celsius * 1.8 + 32;

            // Método post do Jquery
            $.post('../models/exercise3.php', {

                temperature: temperature,
                id: id,
                question: question

            }, function (resposta) {

                window.location = `../view.php?id=${id}`
            });

        });
    });
</script>