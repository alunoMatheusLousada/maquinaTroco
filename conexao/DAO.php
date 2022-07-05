<?php

class DAO
{

    function conectaBD()
    {
        $servername = "localhost";
        $port = "5433";
        $username = "postgres";
        $password = "1661";
        $dbname = "maquinaTroco";
        $string = "host=$servername port=$port dbname=$dbname user=$username password=$password";

        try {
            $conn = new PDO("pgsql:{$string}");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Erro na Conexao: " . $e->getMessage();
        }
    }
}
