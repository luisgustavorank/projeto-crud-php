<?php 
include('includes/protect.php');
include('BD/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS MATERIALIZE -->    
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
    <!--SCRIPT JS-->
    <script src="js/cep.js" defer></script>
</head>
<body>
    <!-- FORMULARIO DE CADASTRO -->

    <?php include_once 'includes/menu.php'; ?>

    <div class="row container">
        <p>&nbsp;</p>
        <form action="BD/create.php" method="POST" id="address-form">
          <fieldset class="formulario" style="padding: 15px">
              <legend>
                  <img src="img/user.png" alt="[image]" width="120">
              </legend>
            <h5 class="light center">Cadastro de Alunos</h5>

            <?php include_once 'includes/input-cad.php'; ?>
                        
            <!-- BOTÕES -->
            <div class="input-field col s12">
                <input type="submit" value="cadastrar" class="btn blue" id="submit">
                <input type="reset" value="limpar" class="btn red">
            </div>
          </fieldset>
        </form>
    </div>
<?php include_once 'includes/footer.php'?>
    
