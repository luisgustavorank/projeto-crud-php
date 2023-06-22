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
    <title>Edição de Registros</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS MATERIALIZE -->    
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
     <!--SCRIPT JS-->
    <script src="js/cep.js" defer></script>
</head>
<body>
    <!-- EDIÇÃO DE CADASTRO -->

    <?php include_once 'includes/menu.php'; ?>

    <div class="row container">
        <div class="col s12">
            <h5 class="light">Edição de Registros</h5><hr>
        </div>
    </div>

    <div class="row container">
        <p>&nbsp;</p>
        <form action="BD/update.php" method="POST" id="address-form">
          <fieldset class="formulario" style="padding: 15px">
              <legend>
                  <img src="img/user.png" alt="[image]" width="120">
              </legend>
            <h5 class="light center">Alteração de Cadastro</h5>
           
            <!-- CAMPO NOME -->
            <div class="input-field col s10">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" required>
                <label for="nome">Nome do Aluno</label>
            </div>
            <!-- CAMPO GENERO -->
            <div class="input-field col s2">
                <select name="sexo" id="sexo" required>
                <?php  
                    if($sexo=="Feminino"){
                    echo '<option value="Feminino" selected>Feminino</option>';
                    echo '<option value="Masculino">Masculino</option>';
                    echo '<option value="Outros">Outros</option>';
                    }elseif($sexo=="Masculino"){
                    echo '<option value="Masculino" selected>Masculino</option>';
                    echo '<option value="Feminino">Feminino</option>';
                    echo '<option value="Outros">Outros</option>';
                    }else{
                    echo '<option value="Outros" selected>Outros</option>';
                    echo '<option value="Feminino">Feminino</option>';
                    echo '<option value="Masculino">Masculino</option>';
                    }
                ?>
                </select>
            </div>
            <!-- CAMPO MATRICULA -->
            <div class="input-field col s7">
                <i class="material-icons prefix">person</i>
                <input type="text" name="matricula" id="matricula" value="<?php echo $matricula ?>" disabled required>
                <label for="matricula">Matrícula</label>
            </div>
            <!-- CAMPO DATA NASCIMENTO -->
            <div class="input-field col s5">
                <i class="material-icons prefix">calendar_month</i>
                <input type="date" name="data_nasc" id="data_nasc" value="<?php echo $data_nasc ?>" required placeholder="dd/mm/aaaa">
                <label for="data_nasc">Data de Nascimento</label>
            </div>
            <!-- CAMPO EMAIL -->
            <div class="input-field col s7">
                <i class="material-icons prefix">email</i>
                <input type="email" name="email" id="email" value="<?php echo $email ?>" maxlength="50" required>
                <label for="email">Email</label>
            </div>
            <!-- CAMPO TELEFONE -->
            <div class="input-field col s5">
                <i class="material-icons prefix">phone</i>
                <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone ?>" required>
                <label for="telefone">Telefone</label>
            </div>
            <!-- CAMPO ENDEREÇO -->
            <h5 class="light center">Endereço</h5>
                    
            <div class="input-field col s12">
                <i class="material-icons prefix">place</i>
                <input type="text" name="cep" id="cep" value="<?php echo $cep ?>" maxlength="8" minlength="8" required>
                <label for="cep">Informe o CEP</label>
            </div>
            <div class="input-field col s10">
                <i class="material-icons prefix">place</i>
                <input type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>" required data-input>
                <label for="endereco">Logradouro</label>
            </div>
            <div class="input-field col s2">
                <input type="text" name="numero" id="numero" value="<?php echo $numero ?>" maxlength="6" required data-input>
                <label for="numero">Número</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">place</i>
                <input type="text" name="bairro" id="bairro" value="<?php echo $bairro ?>" required data-input>
                <label for="bairro">Bairro</label>
            </div>
            <div class="input-field col s10">
                <i class="material-icons prefix">place</i>
                <input type="text" name="cidade" id="cidade" value="<?php echo $cidade ?>" required data-input>
                <label for="cidade">Cidade</label>
            </div>
            <div class="input-field col s2">
                <select id="estado" name="estado" required data-input>
                <?php  
                    echo "<option value=$estado' selected>$estado</option>";
                    echo '<option value="AC">AC</option>';
                    echo '<option value="AL">AL</option>';
                    echo '<option value="AP">AP</option>';
                    echo '<option value="AM">AM</option>';
                    echo '<option value="BA">BA</option>';
                    echo '<option value="CE">CE</option>';
                    echo '<option value="DF">DF</option>';
                    echo '<option value="ES">ES</option>';
                    echo '<option value="GO">GO</option>';
                    echo '<option value="MA">MA</option>';
                    echo '<option value="MT">MT</option>';
                    echo '<option value="MS">MS</option>';
                    echo '<option value="MG">MG</option>';
                    echo '<option value="PA">PA</option>';
                    echo '<option value="PB">PB</option>';
                    echo '<option value="PR">PR</option>';
                    echo '<option value="PE">PE</option>';
                    echo '<option value="PI">PI</option>';
                    echo '<option value="RJ">RJ</option>';
                    echo '<option value="RN">RN</option>';
                    echo '<option value="RS">RS</option>';
                    echo '<option value="RO">RO</option>';
                    echo '<option value="RR">RR</option>';
                    echo '<option value="SC">SC</option>';
                    echo '<option value="SP">SP</option>';
                    echo '<option value="SE">SE</option>';
                    echo '<option value="TO">TO</option>';
                ?>
                </select>
            </div>
            <!-- BOTÕES -->
            <div class="input-field col s12">
                <input type="submit" value="alterar" class="btn blue">
                <a href="consultas.php" class="btn red">cancelar</a>
            </div>
          </fieldset>
        </form>
    </div>
    <?php include_once 'includes/footer.php' ?>