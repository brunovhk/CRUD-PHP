<?php
require_once('config.php');
//Faz as tratativas para que todos os campos sejam informados corretamente

$login = $_POST['login'];
$passwd = $_POST['password'];
$newPassword = $_POST['newPassword'];
$newPasswordConfirm = $_POST['newPasswordConfirm'];
//Tenta a conexão com o banco de dados e executa a função, caso contrário gera um Exception
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//Verificação básica de confirmação da senha
    if ($newPassword == $newPasswordConfirm){
        $stmt = $conn->prepare('UPDATE user SET password = :PASSWORD WHERE login = :LOGIN AND password = :PASSWD');
        $stmt->execute(array(
            ':PASSWD' => $passwd,
            ':PASSWORD' => $newPassword,
            ':LOGIN' => $login
        ));
        echo '<h1>Senha alterada com sucesso!</h1>';
    }else{
        echo '<h1>As senhas digitadas não coincidem, tente novamente.</h1>';

    }

} catch (Exception $e){
    echo 'ERROR: ' . $e->getMessage();
}
