<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 09.10.2016
 * Time: 15:32
 */

$config = parse_ini_file("./php.ini");
$sql_database = "CREATE DATABASE {$config['name']}";
$sql = "CREATE TABLE {$config['table']} (id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT, ups varchar(12) UNIQUE NOT NULL)";

try {
    $dsn = "mysql:host=localhost";
    $pdo = new PDO($dsn, $config['user'], $config['password']);
    if ($pdo->query($sql_database)) {
        echo " <br /> <h1>Database name {$config['name']} create!</h1><br /> ";
        $dsn = "mysql:dbname={$config['name']};host=localhost";
        $pdo = new PDO($dsn, $config['user'], $config['password']);
        if ($pdo->query($sql)) {
            echo " <br /><h1>Table name  {$config['table']} create! </h1><br />";
        } else
            echo "<br />Table not create";
    } else
        echo "Not create new DB ";
    die();
} catch (\PDOException $pdo_exp) {
    die($pdo_exp->getMessage());
}