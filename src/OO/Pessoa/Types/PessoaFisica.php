<?php

namespace src\OO\Pessoa\Types;

use src\OO\Pessoa\Pessoa;
use src\OO\Pessoa\Util\Cpf;

class PessoaFisica extends Pessoa implements Cpf{

    protected $cpf;
    protected $idade;

    function __construct($pessoa) {
        $this->id = $pessoa['id'];
        $this->nome = $pessoa['nome'];
        $this->idade = $pessoa['idade'];
        $this->cpf = $pessoa['cpf'];
        $this->cidade = $pessoa['cidade'];
        $this->email = $pessoa['email'];
        $this->telefone = $pessoa['telefone'];
        $this->nota = $pessoa['nota'];
        $this->tipo = $pessoa['tipo'];
        $this->endereco = $pessoa['endereco'];
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

    public function alteraCpf($cpf)
    {
        $this->cpf = $cpf;
    }


} 