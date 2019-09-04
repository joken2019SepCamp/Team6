<?php
$dsn = 'mysql:dbname=bulletin_board;host=localhost;charset=utf8';   //接続先のデータベース名、ホストを指定

$user ='root';
$password = '';

try{
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo '接続に成功しています';
}
catch(PDOException $e){
    print('Connection failed:'.$e->getMessage());
    die();
}