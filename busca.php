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
        <title>Busca por Alunos</title>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS MATERIALIZE -->    
        <link href="css/materialize.min.css" rel="stylesheet">
        <link href="css/default.css" rel="stylesheet">
    </head>
    <body>
        <div class="row container">
            <div class="col s12">
                <h5 class="light">Pesquisa por Alunos</h5><hr>
                <p class="light">
                Você pesquisou por 
                    <?php 
                        include_once 'BD/conexao.php';
                        $busca = $_GET['pesquisa'];
                        echo '<b>'.$busca.'</b>';
                    ?>
                </p>
                    <table class="striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Matrícula</th>
                                <th>Data Nasc</th>
                                <th>Email</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once 'BD/conexao.php';
                                $busca = $_GET['pesquisa'];

                                $querySelect = $link->query("
                                    SELECT * FROM alunos WHERE nome LIKE '%$busca%' ".
                                    "OR matricula LIKE  '%$busca%'
                                ");
                                while($registros = $querySelect->fetch_assoc()):
                                $nome	      = $registros['nome'];
                                $matricula	  = $registros['matricula'];
                                $data_nasc	  = $registros['data_nasc'];
                                $email	      = $registros['email'];
                                $telefone     = $registros['telefone'];

                                $dadosData = implode("/",array_reverse(explode("-",$data_nasc)));

                                echo "
                                <tr>
                                <td>$nome</td>
                                <td>$matricula</td>
                                <td>$dadosData</td>
                                <td>$email</td>
                                <td>$telefone</td>
                                </tr>
                                ";
                            endwhile;

                            ?>
                        </tbody>
                    </table>
            </div>
        </div>
<?php include_once 'includes/footer.php' ?>
