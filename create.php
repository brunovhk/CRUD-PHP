<?php
require_once('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$login = $_POST['login'];
$passwd = $_POST['passwd'];
//Tenta inserir os dados, se já existirem gera um exception informando que já existe um cadastro.
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare('INSERT INTO user (name,email,login,password) VALUES (:NAME,:EMAIL,:LOGIN,:PASSWORD)');
        $stmt->execute(array(
       ':NAME' => $name,
        ':EMAIL'=> $email,
        ':LOGIN'=> $login,
        ':PASSWORD'=> $passwd,

    ));
echo '<h1>Cadastro efetuado com sucesso.</h1>';
} catch (PDOException $e){
if ($e->getCode() == 23000){
    echo '<h1>Login ou email já cadastrado, tente novamente.</h1>';
}
}
