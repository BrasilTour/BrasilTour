<?php
// Arquivo: config/database.php

function connectDB() {
    $servername = "localhost";
    $username = "root"; // Altere se o seu usuário do MySQL for diferente
    $password = ""; // Altere se você tiver uma senha para o MySQL
    $dbname = "brasil_tour";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Define o modo de erro do PDO para exceção
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }
}