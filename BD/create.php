<?php
include('conexao.php');
include('../includes/protect.php');

$nome           = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$dadosSexo      = $_POST['sexo'];
$matricula      = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
// TRATAMENTO DE DADOS DA DATA PARA O MYSQL
$dadosData      = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$data_nasc = "";
if (isset($dadosData['data_nasc'])) {
  $data_nasc = $dadosData['data_nasc'];
}
// CONTINUAÇÃO
$email          = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone       = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$cep            = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
$endereco       = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
$numero         = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
$bairro         = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade         = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
$dadosEstado    = $_POST['estado'];

$querySelect = $link->query("SELECT email FROM alunos");
$array_emails = [];

while($emails = $querySelect->fetch_assoc()):
    $emails_existentes = $emails['email'];
    array_push($array_emails, $emails_existentes);
endwhile;

$querySelect = $link->query("SELECT matricula FROM alunos");
  $array_matriculas = [];

while($matriculas = $querySelect->fetch_assoc()):
    $matriculas_existentes = $matriculas['matricula'];
    array_push($array_matriculas, $matriculas_existentes);
endwhile;

if(in_array($email, $array_emails)):
  $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um aluno cadastrado com este email!'."</p>";
  header("Location: ../cadastro.php");
elseif(in_array($matricula, $array_matriculas)):
  $_SESSION['msg'] = "<p class='center red-text'>".'Já existe um aluno cadastrado com esta matricula!'."</p>";
  header("Location: ../cadastro.php");
else:
  $queryInsert = $link->query(
  "INSERT INTO alunos (nome,sexo,matricula,data_nasc,email,telefone,cep,endereco,numero,bairro,cidade,estado) VALUES ('$nome','$dadosSexo','$matricula','$data_nasc','$email','$telefone','$cep','$endereco','$numero','$bairro','$cidade','$dadosEstado')");

  $affected_rows = mysqli_affected_rows($link);
  var_dump(mysqli_affected_rows($link));

if($affected_rows > 0):
    $_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com sucesso!'."</p>";
    header("Location:../cadastro.php");
  endif;
endif;
?>