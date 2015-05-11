<?php

namespace OO\Banco;

class Fixture
{
    private $conexao;

    public function __construct(\PDO $pdo){
        $this->conexao = $pdo;
    }

    public function  dropClientes(){
        //echo "Removendo tabela clientes <br>";
        $this->conexao->query("DROP TABLE IF EXISTS cliente;");
        //echo " - OK <br>";
    }

    public function createClientes(){
        //echo "Criando tabela clientes <br>";
        $this->conexao->query("CREATE TABLE cliente (
            id_cliente INT NOT NULL AUTO_INCREMENT,
              nome VARCHAR(45) NOT NULL,
              idade INT NULL,
              cpf VARCHAR(15) NULL,
              cnpj VARCHAR(30) NULL,
              cidade VARCHAR(45) NOT NULL,
              email VARCHAR(45) NOT NULL,
              telefone VARCHAR(45) NOT NULL,
              nota INT NOT NULL,
              endereco VARCHAR(100) NULL,
              tipo VARCHAR(4) NOT NULL,
              PRIMARY KEY (id_cliente));");
        //echo " - OK <br>";
    }

    public function populateClientes(){
        //echo "Inserindo dados clientes <br>";

        $dados = include "clientes.php";

        foreach ($dados as $cliente){

            $stmt = $this->conexao->prepare("INSERT INTO cliente (
              nome, idade, cpf, cnpj, cidade, email,telefone, nota, endereco, tipo) VALUE (
              :nome, :idade, :cpf, :cnpj, :cidade, :email,:telefone, :nota,:endereco, :tipo);");
            $stmt->bindParam(":nome", $cliente['nome']);
            $stmt->bindParam(":idade", $cliente['idade']);
            $stmt->bindParam(":cpf", $cliente['cpf']);
            $stmt->bindParam(":cnpj", $cliente['cnpj']);
            $stmt->bindParam(":cidade", $cliente['cidade']);
            $stmt->bindParam(":email", $cliente['email']);
            $stmt->bindParam(":telefone", $cliente['telefone']);
            $stmt->bindParam(":nota", $cliente['nota']);
            $stmt->bindParam(":endereco", $cliente['endereco']);
            $stmt->bindParam(":tipo", $cliente['tipo']);
            $stmt->execute();

        }
        //echo " - OK <br>";
    }

}

