<?php
require_once('config.php');

    $user = $_POST['search'];
    //Tenta a conexão com o banco de dados e executa a função, caso contrário gera um Exception
    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //Faz a tratativa caso o campo search seja deixado em branco
        $query = $conn->prepare("SELECT * FROM user WHERE login = :LOGIN");
        $query->bindParam(':LOGIN',$user);
        $query->execute();
        $return = $query->fetchAll();
        if (count($return) > 0){
            $stmt = $conn->query("SELECT id, name, email, login, password FROM user WHERE login = '$user';");
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "<b>Id:</b> {$linha['id']} - <b>Nome: </b>{$linha['name']} - <b>Email: </b>{$linha['email']} - <b>Login</b> {$linha['login']} - <b>Password:</b> {$linha['password']}";
        }else{
        echo '<h1>Nenhum usuário com login informado encontrado</h1>';
        }
    } catch (Exception $e){
        echo 'ERROR: ' . $e->getMessage();

}


