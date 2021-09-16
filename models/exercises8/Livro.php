<?php

include_once("../../Conexao.php");

$livro = new Livro();

if($_POST['metodo'] === 'insertLivro') $livro->insertLivro();
if($_POST['metodo'] === 'abrirLivro') $livro->abrirLivro();
if($_POST['metodo'] === 'fecharLivro') $livro->fecharLivro();
if($_POST['metodo'] === 'avancarLivro') $livro->avancarPagina();
if($_POST['metodo'] === 'voltarLivro') $livro->voltarPagina();
if($_POST['metodo'] === 'folhearLivro') $livro->folhearLivro();

class Livro {
       
       public $id;
       public $idPessoa;
       public $titulo;
       public $autor;
       public $totPaginas;
       public $pagAtual;
       public $aberto;
       public $leitor;


       function insertLivro() {

              $livro = new Livro;
              $livro->idPessoa = $_POST['leitorID'];
              $livro->titulo = $_POST['titulo'];
              $livro->autor = $_POST['autor'];
              $livro->totPaginas = $_POST['totPaginas'];
              $livro->pagAtual = $_POST['pagAtual'];
              $livro->aberto = $_POST['aberto'];
              $livro->leitor = $_POST['leitorNome'];
              
              $sql = "INSERT INTO livro_exercise8 
              (idPessoa, titulo, autor, totPaginas, pagAtual, aberto, leitor) 
              VALUES (:idPessoa, :titulo, :autor, :totPaginas, :pagAtual, :aberto, :leitor)";

              $query = Conexao::getConexao()->prepare($sql);

              $query->bindparam(':idPessoa',  $livro->idPessoa);
              $query->bindparam(':titulo', $livro->titulo);
              $query->bindparam(':autor', $livro->autor);
              $query->bindparam(':totPaginas', $livro->totPaginas);
              $query->bindparam(':pagAtual', $livro->pagAtual);
              $query->bindparam(':aberto', $livro->aberto);
              $query->bindparam(':leitor', $livro->leitor);
              $query->execute();

       }

       function abrirLivro() {
        
            $livro = new Livro;
            $livro->id = $_POST['idLivro'];

            $sql = "UPDATE livro_exercise8 SET aberto = 1 WHERE id = :id";
            $query = Conexao::getConexao()->prepare($sql);
            $query->bindparam(':id',  $livro->id);
            $query->execute();
       }

       function fecharLivro() {
        
            $livro = new Livro;
            $livro->id = $_POST['idLivro'];

            $sql = "UPDATE livro_exercise8 SET aberto = 0 WHERE id = :id";
            $query = Conexao::getConexao()->prepare($sql);
            $query->bindparam(':id',  $livro->id);
            $query->execute();
       }

       function avancarPagina() {
        
        if(isset($_POST['idLivro'])) { 
            $livro = new Livro;
            $livro->id = $_POST['idLivro'];
        }
            $sql = "UPDATE livro_exercise8 SET pagAtual = pagAtual + 1 WHERE id = :id";
            $query = Conexao::getConexao()->prepare($sql);
            $query->bindparam(':id',  $livro->id);
            $query->execute();
       }

       function voltarPagina() {
        
        if(isset($_POST['idLivro'])) { 
            $livro = new Livro;
            $livro->id = $_POST['idLivro'];
        }
            $sql = "UPDATE livro_exercise8 SET pagAtual = pagAtual - 1 WHERE id = :id";
            $query = Conexao::getConexao()->prepare($sql);
            $query->bindparam(':id',  $livro->id);
            $query->execute();
       }

       function folhearLivro() {
        
            $livro = new Livro;
            $livro->id = $_POST['idLivro'];
            $result = Conexao::getConexao()->query("SELECT totPaginas FROM livro_exercise8 WHERE id = $livro->id");
            $folhearLivro = $result->fetchAll(PDO::FETCH_ASSOC);

            print_r("O livro tem um total de " . $folhearLivro[0]['totPaginas'] . " páginas.");
        }

       }
   