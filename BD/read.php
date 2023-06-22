<?php
include('conexao.php');

$querySelect = $link->query("select * from alunos");
while($registros = $querySelect->fetch_assoc()):
    $id	          = $registros['id'];
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

?>
    <tr>
        <td><?php echo $matricula ?></td>
        <td><?php echo $nome ?></td>
        <td><?php echo $email ?></td>
        <td><?php echo $telefone ?></td>
        <td><?php echo $cidade ?></td>
        <td><?php echo $estado ?></td>
        <td>
            <a class='visualizar' href="<?php echo "visualizar.php?id=$id"; ?>"><i class='material-icons'>visibility</i></a>&nbsp;&nbsp;
            <a href="<?php echo "editar.php?id=$id"; ?>"><i class='material-icons'>edit</i></a>&nbsp;&nbsp;
            <a class='deletar' href="<?php echo "BD/delete.php?id=$id"; ?>"><i class='material-icons'>delete</i></a>
        </td>
    </tr>
    
<?php
    endwhile;
?>