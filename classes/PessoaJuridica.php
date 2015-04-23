<?php

class PessoaJuridica extends Pessoa{

    protected $cnpj;

    function __construct($id,$nome,$cnpj,$cidade,$email,$telefone,$nota,$tipo,$endereco) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cnpj = $cnpj;
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
    public function getCnpj()
    {
        return $this->cnpj;
    }



} 