<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>

<script>

    $(function () {
        // Executa assim que o botão de salvar for clicado
        $('#add_number').click(function (e) {


            // Cancela o envio do formulário
            e.preventDefault();

            
            let contador = parseInt(document
                .getElementById('add_number')
                .value)


            for (let i = 3; i < 100; i++) {

                if (contador == i) {
                    document
                        .getElementById('add_number')
                        .value = contador + 1
                }
            }

            document
                .getElementById("form")
                .insertAdjacentHTML(
                    'beforeend',
                    `<label>Insira outro número abaixo:</label><input type='number' name='number' id='number${contador}'>`
                )

        });
    });

    // Resposta do exercicio 1

    $(function () {
        // Executa assim que o botão de salvar for clicado
        $('#resposta1').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();


            let id = $('#question_number').val();
            let question = $('#question_description').val();

            let contador = parseInt(document.getElementById('add_number').value)

            let arrayNumbers = [];

            for (let i = 1; i < contador; i++) {

                let numbers = parseFloat(document
                    .getElementById(`number${i}`)
                    .value)

                    arrayNumbers
                    .push(numbers)
            }

            const total = arrayNumbers.reduce(
                (total, currentElement) => parseFloat(total + currentElement)
            )
            const media = total / arrayNumbers.length
            
            // Método post do Jquery
            $.post('../models/exercise1.php', {

                media: media,
                id: id,
                questao: question

            }, function (resposta) {

                window.location = `../view.php?id=${id}`

            });

        });
    });
</script>