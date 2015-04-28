<?php

namespace src\OO\Pessoa;

class Pessoa implements NotaImportancia,EnderecoCobranca {

    protected $id;
    protected $nome;
    protected $cidade;
    protected $email;
    protected $telefone;
    protected $nota;
    protected $endereco;
    protected $tipo;

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @return mixed
     */
    public function setEndereco($var)
    {
        return $this->endereco = $var;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }


    /**
     * @return mixed
     */
    public function setNota($var)
    {
        return $this->nota = $var;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }


} 