<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>

<script>

    $(function () {
        // Executa assim que o botão de salvar for clicado
        $('#resposta7').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            let id = $('#question_number').val();
            let question = $('#question_description').val();
            let a = parseFloat($('#number1').val());
            let b = parseFloat($('#number2').val());
            let c = parseFloat($('#number3').val());

            function getTypeTriangle() {
                if (a === b && a === c & b === c) {
                    return "Equilatero"
                } else if (a != b && a != c && b != c) {
                    console.log("Escaleno")
                    return "Escaleno"
                } else {
                    return "Isosceles"
                }
            }

            if (a < b + c) {
                if (b < a + c) {
                    if (c < a + b) {

                        $.post('../models/exercise7.php', {
                            id: id,
                            question: question,
                            sideA: a,
                            sideB: b,
                            sideC: c,
                            typeTriangle: getTypeTriangle()

                        }, function (resposta) {
                            window.location = `../view.php?id=${id}`
                        });

                    }
                }
            } else {
                alert("Os lados informados não formam um triângulo")
            }

        });
    });
</script>