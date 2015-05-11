<?php

namespace OO\Pessoa\Types;

use OO\Pessoa\Pessoa;
use OO\Pessoa\Interfaces\Cnpj;

class PessoaJuridica extends Pessoa implements Cnpj{

    protected $cnpj;

    function __construct($pessoa) {

        $this->id = $pessoa['id_cliente'];
        $this->nome = $pessoa['nome'];
        $this->cnpj = $pessoa['cnpj'];
        $this->cidade = $pessoa['cidade'];
        $this->email = $pessoa['email'];
        $this->telefone = $pessoa['telefone'];
        $this->nota = $pessoa["nota"];
        $this->tipo = $pessoa['tipo'];
        $this->endereco = $pessoa['endereco'];

    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function alteraCnpj($cnpj)
    {
        return $this->cnpj = $cnpj;
    }


} 