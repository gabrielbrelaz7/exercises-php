<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>

<script>

    // Add more numbers
    $(function () {
        // Executa assim que o botão de salvar for clicado
        $('#add_number').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            let contador = parseInt(document.getElementById('add_number').value)

            for (let i = 3; i < 100; i++) {

                if (contador == i) {
                    document
                        .getElementById('add_number')
                        .value = contador + 1
                }
            }

            document
                .getElementById("add")
                .insertAdjacentHTML(
                    'beforeend',
                    `<div><label>Insira outro número abaixo:</label><input type='number' name='number' id='number${contador}'></div>`
                )

        });
    });

    $(function () {
        // Executa assim que o botão de salvar for clicado
        $('#resposta5').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            let id = $('#question_number').val();
            let question = $('#question_description').val();
            let arrayNumbers = [];

            for (let i = 0; i < 100; i++) {

                let number = parseInt($(`#number${i}`).val())

                if (!isNaN(number)) {
                    arrayNumbers.push(number)
                }
            }

            function sortfunction(a, b) {
                return (a - b)
            }

            const firstNumber = arrayNumbers.sort(sortfunction)[0];
            const lastNumber = arrayNumbers
                .sort(sortfunction)
                .reverse()[0];

            // Método post do Jquery
            $.post('../models/exercise5.php', {
                id: id,
                question: question,
                firstNumber: firstNumber,
                lastNumber: lastNumber

            }, function (resposta) {
                window.location = `../view.php?id=${id}`
            });

        });
    });
</script>