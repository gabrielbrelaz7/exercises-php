<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>

<script>

    // Resposta do exercício 2

    $(function () {
        // Executa assim que o botão de salvar for clicado
        $('#resposta2').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            let id = $('#question_number').val();
            let question = $('#question_description').val();
            let pet = $('#pets').val();
            let cpf = $('#cpf').val();

            let validCPF = cpf.length

            if (validCPF === 11) {

                // Método post do Jquery
                $.post('../models/exercise2.php', {
                    id: id,
                    question: question,
                    pet: pet,
                    cpf: cpf

                }, function (resposta) {

                    window.location = `../view.php?id=${id}`
                });

            } else {
                alert("CPF infomado é inválido")
            }

        });
    });
</script>