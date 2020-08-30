<?php
require_once('config.php');

//Faz as tratativas caso não seja informado o login ou senha

if (isset($_POST['login'])){
    $login = $_POST['login'];
} else{
    echo '<h1>Informe seu login</h1>';
}

if (isset($_POST['password'])){
    $passwd = $_POST['password'];
} else{
    echo '<h1>Informe sua senha</h1>';
}
//Tenta a conexão com o banco de dados e executa a função, caso contrário gera um Exception
try {

    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('DELETE FROM user WHERE login = :LOGIN AND password = :PASSWD');
    $stmt->bindParam(':LOGIN',$login);
    $stmt->bindParam(':PASSWD',$passwd);
    $stmt->execute();

    echo "<h1>Conta deletada com sucesso!</h1>";
} catch (Exception $e){
    echo 'ERROR: ' . $e->getMessage();
}

