<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>

<script>

    $(function () {
        // Executa assim que o botão de salvar for clicado
        $('#resposta6').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            let id = $('#question_number').val();
            let question = $('#question_description').val();
            let number = $('#number').val();

            daysWeek = [
                null,
                'Segunda-feira',
                'Terça-feira',
                'Quarta-feira',
                'Quinta-feira',
                'Sexta-feira',
                'Sábado',
                'Domingo'
            ]

            if (number === 0 || number <= 7) {
                dayWeek = daysWeek[number]

                $.post('../models/exercise6.php', {
                    id: id,
                    question: question,
                    dayWeek: dayWeek
                }, function (resposta) {
                    window.location = `../view.php?id=${id}`
                });
            } else {
                alert("Por favor, digite um número da semana válido!")
            }

        });
    });
</script>