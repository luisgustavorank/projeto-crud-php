<?php 
include('includes/protect.php');
include('includes/menu.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Alunos</title>

    <!--Import Google Icon Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- CSS -->    
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
</head>
<body>
    <div class="row container">
        <div class="col s12">
            <h5 class="light">Consultas</h5><hr>
            
            <form action="busca.php" method="GET"> 
                <input type="text" name="pesquisa" size="50" placeholder="Nome ou Matricula" autofocus> 
            </form>

            <?php
                if(isset($_SESSION['msg'])):
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                endif;
            ?>
            
            <table class="striped">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include_once 'BD/read.php';
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include_once 'includes/footer.php' ?>