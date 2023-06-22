<?php
include('BD/conexao.php');

    if(isset($_POST['email'])) {

        $email = $link->real_escape_string($_POST['email']);
        $senha = $link->real_escape_string($_POST['senha']);        

        $sql_code = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $sql_query = $link->query($sql_code) or die("Falha na execucação do código SQL: " . $link->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $user = $sql_query->fetch_assoc();
            if(password_verify($senha, $user['senha'])) {
                session_start();
            }

            $_SESSION['user-id'] = $user['user-id'];
            $_SESSION['nome'] = $user['nome'];

            header("Location: cadastro.php");

        } else {
            echo "<p class='red-text'>".'Falha ao logar! Email ou Senha incorretos'."</p>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-login.css">

    <title>Login</title>
</head>
<body>
    <main>
        <div class="conteudo">
            <div class="login-image">
                <img src="img/imagem-login.png">
            </div>
            <div class="form-login">
                <form action="" method="POST">
                    <div class="header-login">
                        <div class="title">
                            <h2 text-align="center">Faça seu Login</h2>
                        </div>
                    </div>
                    
                    <div class="input-login">
                        <div class="input-box">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Insira seu email">
                        </div>
                        <div class="input-box">
                            <label>Senha</label>
                            <input type="password" name="senha" placeholder="Insira sua senha" required>
                        </div> 

                        <div class="login-button">
                            <button><a href="#">Login</a> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>