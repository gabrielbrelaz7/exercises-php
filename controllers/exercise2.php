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

            if (cpf.indexOf('-') !== false)
            {
                cpf = cpf.replaceAll("-", "");
            }
            if (cpf.indexOf('.') !== false)
            {
                cpf = cpf.replaceAll(".", "");
            }

            let arrayCpf = cpf.split("")

            sequencia1 = [10,9,8,7,6,5,4,3,2]    
            let array1 = []

            for(let i=0; i<9; i++) {
                soma = arrayCpf[i] * sequencia1[i] 
                array1.push(soma)
            }

            let soma1 = (sum, currentValue) => sum + currentValue
            
            let resultado1 = array1.reduce(soma1)

            let verificacao1 = resultado1 *10 % 11
            
            let numeroVerificar1 = parseInt(arrayCpf[9])
            
            if (verificacao1 === 10 ) {

                verificacao1 = 0

                if (verificacao1 === numeroVerificar1) {
                    validacao1= true
                }
            }

            if (verificacao1 === numeroVerificar1 ) {
                validacao1= true
            }

            else {
                validacao1= false
            }

            sequencia2 = [11,10,9,8,7,6,5,4,3,2]    
            let array2 = []

            for(let i=0; i<10; i++) {
                soma = arrayCpf[i] * sequencia2[i] 
                array2.push(soma)
            }

            let soma2 = (sum, currentValue) => sum + currentValue
            
            let resultado2 = array2.reduce(soma2)
            let verificacao2 = resultado2 *10 % 11
            
            let numeroVerificar2 = parseInt(arrayCpf[10])
            
            if (verificacao2 === 10 ) {
                verificacao2 = 0
                if (verificacao2 === numeroVerificar2) {
                    validacao2 = true
                }
            }

            if (verificacao2 === numeroVerificar2 ) {
                validacao2 = true
            }

            else {
                validacao2 = false
            }


            if (validacao1 && validacao2 === true) {

                // Método post do Jquery
                $.post('../models/exercise2.php', {
                    id: id,
                    question: question,
                    pet: pet,
                    cpf: cpf

                }, function (resposta) {

                    window.location = `../view.php?id=${id}`
                });
            }

            else {
                alert ("CPF informado é inválido");
            }

        });
    });
</script>