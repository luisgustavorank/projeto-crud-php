<?php
include('conexao.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$queryDelete = $link->query("delete from alunos where id='$id'");

if(mysqli_affected_rows($link) > 0):
  header("Location:../consultas.php");
endif;
?>

      <!--                <form action="" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Deseja realmente deletar o registro do funcionário?</p>
                            <p>
                                <input type="submit" value="Sim" class="btn btn-danger">
                                <a href="../consultas.php" class="btn btn-secondary">Não</a>
                            </p>
                        </div>
                      </form> 

-->

                    