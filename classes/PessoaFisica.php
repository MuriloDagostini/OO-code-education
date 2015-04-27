<?php

class PessoaFisica extends Pessoa implements ClienteInterface{

    protected $cpf;
    protected $idade;

    function __construct($id,$nome,$idade,$cpf,$cidade,$email,$telefone,$nota,$tipo,$endereco) {
        $this->id = $id;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->cidade = $cidade;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->nota = $nota;
        $this->tipo = $tipo;
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getIdade()
    {
        return $this->idade;
    }



} 