<?php
    if(isset($_SESSION['msg'])):
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    endif;
?>

<!-- CAMPO NOME -->
<div class="input-field col s10">
	<i class="material-icons prefix">account_circle</i>
	<input type="text" name="nome" id="nome" required>
	<label for="nome">Nome do Aluno</label>
</div>
<!-- CAMPO GENERO -->
<div class="input-field col s2">
	<select name="sexo" id="sexo" required>
		<option selected>Sexo</option>
		<option value="Feminino">Feminino</option>
		<option value="Masculino">Masculino</option>
		<option value="Outros">Outros</option>
	</select>
</div>
<!-- CAMPO MATRICULA -->
<div class="input-field col s7">
	<i class="material-icons prefix">person</i>
	<input type="text" name="matricula" id="matricula" required>
	<label for="matricula">Matrícula</label>
</div>
<!-- CAMPO DATA NASCIMENTO -->
<div class="input-field col s5">
	<i class="material-icons prefix">calendar_month</i>
	<input type="date" name="data_nasc" id="data_nasc" value="<?=$data_nasc?>" onblur="return validadata(this.value)" required placeholder="dd/mm/aaaa">
	<label for="data_nasc">Data de Nascimento</label>
</div>
<!-- CAMPO EMAIL -->
<div class="input-field col s7">
	<i class="material-icons prefix">email</i>
	<input type="email" name="email" id="email" maxlength="50" required>
	<label for="email">Email</label>
</div>
<!-- CAMPO TELEFONE -->
<div class="input-field col s5">
	<i class="material-icons prefix">phone</i>
	<input type="tel" name="telefone" id="telefone" required>
	<label for="telefone">Telefone</label>
</div>
<!-- CAMPO ENDEREÇO -->
<h5 class="light center">Endereço</h5>

<div class="input-field col s12">
	<i class="material-icons prefix">place</i>
	<input type="text" name="cep" id="cep" maxlength="8" minlength="8" required>
	<label for="cep">Informe o CEP</label>
</div>
<div class="input-field col s10">
	<i class="material-icons prefix">place</i>
	<input type="text" name="endereco" id="endereco" disabled required data-input>
	<label for="endereco">Logradouro</label>
</div>
<div class="input-field col s2">
    <input type="text" name="numero" id="numero" maxlength="6" disabled required data-input>
    <label for="numero">Número</label>
</div>
<div class="input-field col s12">
	<i class="material-icons prefix">place</i>
	<input type="text" name="bairro" id="bairro" disabled required data-input>
	<label for="bairro">Bairro</label>
</div>
<div class="input-field col s10">
	<i class="material-icons prefix">place</i>
	<input type="text" name="cidade" id="cidade" disabled required data-input>
	<label for="cidade">Cidade</label>
</div>
<div class="col s2">
	<select name="estado" id="estado" disabled required data-input>
		<option selected>UF</option>
		<option value="AC">AC</option>
		<option value="AL">AL</option>
		<option value="AP">AP</option>
		<option value="AM">AM</option>
		<option value="BA">BA</option>
		<option value="CE">CE</option>
		<option value="DF">DF</option>
		<option value="ES">ES</option>
		<option value="GO">GO</option>
		<option value="MA">MA</option>
		<option value="MT">MT</option>
		<option value="MS">MS</option>
		<option value="MG">MG</option>
		<option value="PA">PA</option>
		<option value="PB">PB</option>
		<option value="PR">PR</option>
		<option value="PE">PE</option>
		<option value="PI">PI</option>
		<option value="RJ">RJ</option>
		<option value="RN">RN</option>
		<option value="RS">RS</option>
		<option value="RO">RO</option>
		<option value="RR">RR</option>
		<option value="SC">SC</option>
		<option value="SP">SP</option>
		<option value="SE">SE</option>
		<option value="TO">TO</option>
	</select>
</div>