<?php

namespace OO\Banco;

use PDO;

class ConexaoDB
{
    private $pdo;

    function __construct() {
        $config = include "config.php";

        if (!isset($config['db'])) {
            throw new \InvalidArgumentException("Configuração do banco de dados não existe!");
        }

        $host = (isset($config['db']['host'])) ? $config['db']['host'] : null;
        $dbname = (isset($config['db']['dbname'])) ? $config['db']['dbname'] : null;
        $user = (isset($config['db']['user'])) ? $config['db']['user'] : null;
        $password = (isset($config['db']['password'])) ? $config['db']['password'] : null;

        $pdo = new \PDO("mysql:host={$host};dbname={$dbname}", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

        try {

        } catch (\PDOException $e) {
            die("Erro código: " . $e->getCode() . ": " . $e->getMessage());
        }

        $this->pdo = $pdo;
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }



}