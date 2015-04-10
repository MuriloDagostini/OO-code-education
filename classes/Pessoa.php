<?php

class Pessoa {

    public $id;
    public $nome;
    public $idade;
    public $cpf;
    public $cidade;
    public $email;
    public $telefone;

    function __construct($id,$nome,$idade,$cpf,$cidade,$email,$telefone) {
        $this->id = $id;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->cidade = $cidade;
        $this->email = $email;
        $this->telefone = $telefone;
    }

} 