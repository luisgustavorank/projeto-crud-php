<?php 
include('includes/protect.php');
include('BD/conexao.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$_SESSION['id'] = $id;
$querySelect = $link->query("SELECT * FROM alunos WHERE id='$id'");

while($registros = $querySelect->fetch_assoc()):
    $nome	      = $registros['nome'];
    $sexo	      = $registros['sexo'];
    $matricula	  = $registros['matricula'];
    $data_nasc	  = $registros['data_nasc'];
    $email	      = $registros['email'];
    $telefone     = $registros['telefone'];
    $cep	      = $registros['cep'];
    $endereco     = $registros['endereco'];
    $numero	      = $registros['numero'];
    $bairro       = $registros['bairro'];
    $cidade	      = $registros['cidade'];
    $estado	      = $registros['estado'];
endwhile;
?>
 
 <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Registro</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS MATERIALIZE -->    
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
</head>
<body>
    <?php include_once 'includes/menu.php'; ?>

    <div class="row container">
        <p>&nbsp;</p>
        <form action="" method="">
          <fieldset class="formulario" style="padding: 15px">

            <h5 class="light center">Visualização de Registro</h5>
           
            <!-- CAMPO NOME -->
            <div class="input-field col s10">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" disabled>
                <label for="nome">Nome do Aluno</label>
            </div>
            <!-- CAMPO GENERO -->
            <div class="input-field col s2">
                <select name="sexo" id="sexo" disabled>
                <?php  
                    if($sexo=="Feminino"){
                    echo '<option value="Feminino" selected>Feminino</option>';
                    }elseif($sexo=="Masculino"){
                    echo '<option value="Masculino" selected>Masculino</option>';
                    }else{
                    echo '<option value="Outros" selected>Outros</option>';
                    }
                ?>
                </select>
            </div>
            <!-- CAMPO MATRICULA -->
            <div class="input-field col s7">
                <i class="material-icons prefix">person</i>
                <input type="text" name="matricula" id="matricula" value="<?php echo $matricula ?>" disabled>
                <label for="matricula">Matrícula</label>
            </div>
            <!-- CAMPO DATA NASCIMENTO -->
            <div class="input-field col s5">
                <i class="material-icons prefix">calendar_month</i>
                <input type="date" name="data_nasc" id="data_nasc" value="<?php echo $data_nasc ?>" disabled>
                <label for="data_nasc">Data de Nascimento</label>
            </div>
            <!-- CAMPO EMAIL -->
            <div class="input-field col s7">
                <i class="material-icons prefix">email</i>
                <input type="email" name="email" id="email" value="<?php echo $email ?>" disabled>
                <label for="email">Email</label>
            </div>
            <!-- CAMPO TELEFONE -->
            <div class="input-field col s5">
                <i class="material-icons prefix">phone</i>
                <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone ?>" disabled>
                <label for="telefone">Telefone</label>
            </div>
            <!-- CAMPO ENDEREÇO -->
            <h5 class="light center">Endereço</h5>
                    
            <div class="input-field col s12">
                <i class="material-icons prefix">place</i>
                <input type="text" name="cep" id="cep" value="<?php echo $cep ?>" disabled>
                <label for="cep">Informe o CEP</label>
            </div>
            <div class="input-field col s10">
                <i class="material-icons prefix">place</i>
                <input type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>" disabled>
                <label for="endereco">Logradouro</label>
            </div>
            <div class="input-field col s2">
                <input type="text" name="numero" id="numero" value="<?php echo $numero ?>" disabled>
                <label for="numero">Número</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">place</i>
                <input type="text" name="bairro" id="bairro" value="<?php echo $bairro ?>" disabled>
                <label for="bairro">Bairro</label>
            </div>
            <div class="input-field col s10">
                <i class="material-icons prefix">place</i>
                <input type="text" name="cidade" id="cidade" value="<?php echo $cidade ?>" disabled>
                <label for="cidade">Cidade</label>
            </div>
            <div class="input-field col s2">
                <select id="estado" name="estado" disabled>
                <?php  
                    echo "<option value=$estado' selected>$estado</option>";
                ?>
                </select>
            </div>
            <!-- BOTÕES -->
            <div class="input-field col s12">
                <a href="consultas.php" class="btn blue">Voltar</a>
            </div>
          </fieldset>
        </form>
    </div>
    <?php include_once 'includes/footer.php' ?>