<?php
include('conexao.php');
include('../includes/protect.php');

$id = $_SESSION['id'];

$nome           = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$dadosSexo      = filter_input(INPUT_POST, 'sexo', FILTER_DEFAULT);
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
$estado         = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);

  $queryUpdate = $link->query(
  "UPDATE alunos SET nome='$nome', sexo='$dadosSexo', data_nasc='$data_nasc', email='$email', telefone='$telefone', cep='$cep', endereco='$endereco', numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado' WHERE id='$id'");

  $affected_rows = mysqli_affected_rows($link);
  var_dump(mysqli_affected_rows($link));

  if($affected_rows > 0):
    $_SESSION['msg'] = "<p class='center green-text'>".'Alteração realizada com sucesso!'."</p>";
    header("Location:../consultas.php");
  endif;
?>