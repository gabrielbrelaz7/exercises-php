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
                    return "Escaleno"
                } else {
                    return "Isosceles"
                }
            }

            if (a < b + c) {
                console.log("condicao 1")
                if (b < a + c) {
                    console.log("condicao 2")
                    if (c < a + b) {
                        console.log("condicao 3")

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
                    else {
                        alert("Os lados informados não formam um triângulo")
                }
                }
                else {
                    alert("Os lados informados não formam um triângulo")
            }
            } else {
                alert("Os lados informados não formam um triângulo")
            }

        });
    });
</script>