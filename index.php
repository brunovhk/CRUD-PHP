
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>CRUD - PHP</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-3">
<form action="create.php" method="post">
    <h2 class="text-center">Cadastro</h2>
    <label for=""><b>Nome: </b></label><br>
    <input type="text" name="name" required><br>
    <label for=""><b>Email: </b></label><br>
    <input type="text" name="email" required><br>
    <label for=""><b>Login: </b></label><br>
    <input type="text" name="login" required><br>
    <label for=""><b>Password: </b></label><br>
    <input type="password" name="passwd" required><br>
    <input type="submit" value="Criar"><br>
    </div>
</form>
        <div class="col-3">
            <form action="update.php" method="post">
                <h2 class="text-center">Editar</h2>
                <label for=""><b>Login:</b></label><br>
                <input type="text" name="login" required><br>
                <label for=""><b>Senha atual:</b></label><br>
                <input type="password" name="password" required><br>
                <label for=""><b>Nova senha:</b></label><br>
                <input type="password" name="newPassword" required><br>
                <label for=""><b>Confirmar senha:</b></label><br>
                <input type="password" name="newPasswordConfirm" required><br>
                <input type="submit" value="Alterar">
            </form>
        </div>
        <div class="col-3">
            <h2 class="text-center">Excluir</h2>
            <form action="delete.php" method="post">
                <label for=""><b>Login:</b></label><br>
                <input type="text" name="login" required><br>
                <label for=""><b>Senha:</b></label><br>
                <input type="password" name="password" required><br>
                <input type="submit" value="Excluir conta">
            </form>
        </div>

        <div class="col-3">
            <h2>Buscar usuário</h2>
            <form action="read.php" method="post">
            <label for=""><b>Login: </b></label>
                <input type="text" name="search" required>
                <input type="submit" value="Buscar">
            </form>
        </div>

        </div>
</div>
</body>
</html>
