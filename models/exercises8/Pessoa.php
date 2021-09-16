<?php

include_once("../../Conexao.php");

    $pessoa = new Pessoa();

    if($_POST['metodo'] === 'insertPessoa') $pessoa->insertPessoa();
    if($_POST['metodo'] === 'fazerAniversario') $pessoa->fazerAniversario();
    if($_POST['metodo'] === 'visualizarDetalhes') $livro->visualizarDetalhes();

    class Pessoa {

        public $number;
        public $question;
        public $nome;
        public $sexo;
        public $idade;
        

    function insertPessoa() {

        $pessoa = new Pessoa();
        $pessoa->number = $_POST['number'];
        $pessoa->question = $_POST['question'];
        $pessoa->nome = $_POST['nome'];
        $pessoa->sexo = $_POST['sexo'];
        $pessoa->idade = $_POST['idade'];

        $sql = "INSERT INTO pessoa_exercise8 (number, question, nome, sexo, idade) VALUES (:number, :question, :nome, :sexo, :idade)";
                
        $query = Conexao::getConexao()->prepare($sql);
                
        $query->bindparam(':number', $pessoa->number);
        $query->bindparam(':question', $pessoa->question);
        $query->bindparam(':nome', $pessoa->nome);
        $query->bindparam(':sexo', $pessoa->sexo);
        $query->bindparam(':idade', $pessoa->idade);
            
        $query->execute();
    }     
    
    function fazerAniversario() {

        $pessoa = new Pessoa;
        $pessoa->id = $_POST['idPessoa'];

        if( isset($pessoa->id)) {
            $sql = "UPDATE pessoa_exercise8 SET idade = idade + 1 WHERE id = :id";
            $query = Conexao::getConexao()->prepare($sql);
            $query->bindparam(':id',  $pessoa->id);
            $query->execute();
        }   
    }

    }
