<script src="http://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript" ></script>

<script>

    // PESSOAS

    $(function () {
        // Executa assim que o botão for clicado
        $('#insertPessoa').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            let number = $('#question_number').val();
            let question = $('#question_description').val();

            let contadorPessoa = parseInt(document.getElementById('addPessoa').value)
            let createPeople = [];

            for (let i = 0; i < contadorPessoa; i++) {

                let nome = document
                    .getElementById(`nome${i}`)
                    .value
                let sexo = document
                    .getElementById(`sexo${i}`)
                    .value
                let idade = document
                    .getElementById(`idade${i}`)
                    .value

                    createPeople
                    .push({nome, sexo, idade})
            }

            createPeople.forEach(function (element) {
                $.post('../models/exercises8/Pessoa.php', {

                    number: number,
                    question: question,
                    nome: element.nome,
                    sexo: element.sexo,
                    idade: element.idade,
                    metodo: 'insertPessoa'
                }
                , function  (resposta) {
                    window.location = `../view.php?idLeitor=${number}`
                });

            });
            });

        });


    $(function () {
        // Executa assim que o botão de salvar for clicado
        $('#addPessoa').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            let contadorPessoa = parseInt(document.getElementById('addPessoa').value)

            for (let i = 0; i < 100; i++) {

                if (contadorPessoa == i) {
                    document
                        .getElementById('addPessoa')
                        .value = contadorPessoa + 1
                }
            }

            document
                .getElementById("addFormPeople")
                .insertAdjacentHTML(
                    'beforeend',
                    `
                    <h4> Pessoa adicionada </h4>

                    <label>Nome Completo:</label>
                    <input type="text" name="nome${contadorPessoa}" id="nome${contadorPessoa}">
                    
                    <label>Sexo:</label>
                    <select id="sexo${contadorPessoa}" name="sexo${contadorPessoa}">
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>

                    <label>Idade:</label>
                    <input type="number" name="idade${contadorPessoa}" id="idade${contadorPessoa}">

                    `
                )

        });
    });

    // LIVROS

    $(function () {
        $('#addLivro').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            let contadorLivro = parseInt(document.getElementById('addLivro').value)

            for (let i = 0; i < 100; i++) {

                if (contadorLivro == i) {
                    document
                        .getElementById('addLivro')
                        .value = contadorLivro + 1
                }
            }

            document
                .getElementById("addFormBook")
                .insertAdjacentHTML(
                    'beforeend',
                    `
                    <h4> Livro adicionado </h4>

                    <label>Título:</label>
                    <input type="text" name="titulo${contadorLivro}" id="titulo${contadorLivro}">
                    
                    <label>Autor:</label>
                    <input type="text" name="autor${contadorLivro}" id="autor${contadorLivro}">

                    <label>Total de páginas:</label>
                    <input type="number" name="totPaginas${contadorLivro}" id="totPaginas${contadorLivro}">

                    <label>Página atual:</label>
                    <input type="number" name="pagAtual${contadorLivro}" id="pagAtual${contadorLivro}">

                    <label>Aberto:</label>
                    <select id="aberto${contadorLivro}" name="aberto${contadorLivro}">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>

                    `
                )

        });
    });

    $(function () {
        // Executa assim que o botão for clicado
        $('#insertLivro').click(function (e) {

            // Cancela o envio do formulário
            e.preventDefault();

            let idLivro = $('#question_number').val();

            let contadorLivro = parseInt(document.getElementById('addLivro').value)
            let createBook = [];
            
            for (let i = 0; i < contadorLivro; i++) {

                let titulo = document
                    .getElementById(`titulo${i}`)
                    .value

                let autor = document
                    .getElementById(`autor${i}`)
                    .value

                let totPaginas = document
                    .getElementById(`totPaginas${i}`)
                    .value

                let pagAtual = document
                    .getElementById(`pagAtual${i}`)
                    .value   
                
                let aberto = parseInt(document
                .getElementById(`aberto${i}`)
                .value)
                
                let leitor = document
                .getElementById(`leitor`)
                .value
                
                let leitorNome = leitor.split("|")[1]
                let leitorID = leitor.split("|")[0]

                    createBook
                    .push({titulo, autor, totPaginas, pagAtual, aberto, leitorNome, leitorID})
            }

            createBook.forEach(function (element) {

                console.log(element)
                $.post('../models/exercises8/Livro.php', {

                    idLivro: idLivro,
                    titulo: element.titulo,
                    autor: element.autor,
                    totPaginas: element.totPaginas,
                    pagAtual: element.pagAtual,
                    aberto: element.aberto,
                    leitorNome: element.leitorNome,
                    leitorID: element.leitorID,
                    metodo: 'insertLivro'
                }
                , function  (resposta) {
                    window.location = `../view.php?idLivro=${idLivro}`
                });

            });
            });

        });
    // MÉTODOS 

    // ABRIR LIVRO

        function abrirLivro(param) {
            let idLivro = param
            
            $.post('models/exercises8/Livro.php', {

                idLivro: idLivro,
                metodo: 'abrirLivro'
            
            }, function (resposta) {
                window.location = `../exercises-php/view.php?idLivro=${idLivro}`
            });
        }
    
        // FECHAR LIVRO

        function fecharLivro(param) {
            let idLivro = param
            
            $.post('models/exercises8/Livro.php', {

                idLivro: idLivro,
                metodo: 'fecharLivro'
            
            }, function (resposta) {
                window.location = `../exercises-php/view.php?idLivro=${idLivro}`
            });
        }

        // FOLHEAR LIVRO

        function folhearLivro(param) {
            let idLivro = param
            
            $.post('models/exercises8/Livro.php', {

                idLivro: idLivro,
                metodo: 'folhearLivro'
            
            }, function (resposta) {
                alert(resposta)
            });
            
        }

        // AVANÇAR PÁGINA

        function avancarLivro(param) {
            let idLivro = param
            
            $.post('models/exercises8/Livro.php', {

                idLivro: idLivro,
                metodo: 'avancarLivro'
            
            }, function (resposta) {
                window.location = `../exercises-php/view.php?idLivro=${idLivro}`
            });
        }

        // VOLTAR PÁGINA

        function voltarLivro(param) {
            let idLivro = param
            
            $.post('models/exercises8/Livro.php', {

                idLivro: idLivro,
                metodo: 'voltarLivro'
            
            }, function (resposta) {
                window.location = `../exercises-php/view.php?idLivro=${idLivro}`
            });
        }

        // FAZER ANIVERSÁRIO

        function fazerAniversario(param) {
            let idPessoa = param
            
            $.post('models/exercises8/Pessoa.php', {

                idPessoa: idPessoa,
                metodo: 'fazerAniversario'
            
            }, function (resposta) {
                window.location = `../exercises-php/view.php?idLeitor=${idPessoa}`
            });
        }


        // VISUALIZAR DETALHES

    function visualizarDetalhes(param) {
            let idLivro = param
                window.location = `../exercises-php/detalhes.php?idLivro=${idLivro}`
        }

    
</script>