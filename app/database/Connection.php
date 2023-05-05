<?php

namespace App\database;

use PDO;
use PDOException;

class Connection
{
    //static não precisa criar um objeto da classe
    //Connection para usar o método getDb(), nesse
    //caso podemo importar a classe com "use" e usar 
    //o nome da classe seguido dois pontos
    //ex: Connection::getDb()
    public static function getDb()
    {
        #Informações sobre o banco de dados
        $host       =       "localhost";
        $db_name    =       "meuemprego_48";
        $user       =       "root";
        $pass       =       "";
        $port       =       3308;
        $charset    =       "utf8";
        $db_driver  =       "mysql";

        #informações do sistema
        $sis_nome   =       "MVC M48";
        $sis_email  =       "fabioeduardofaria@gmail.com";

        try {
            $conn = new PDO(
                $db_driver .
                    ':host=' . $host .
                    ';dbname=' . $db_name .
                    ';port='   . $port .
                    ';charset=' . $charset,
                $user,
                $pass
            );

            return $conn;
        } catch (PDOException $error) {
            die("Erro de Conexão: " . $error->getMessage());
        }
    }
}
