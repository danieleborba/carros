<?php
	$sql2 = "select * from pessoa where cpf = '" .$row[0]."'";
	$resultado2 = mysqli_query($conexao, $sql2);
	while ($row2 = mysqli_fetch_array($resultado2)) {
		$cpf = $row2[0];
		$rg = $row2[1];
		$endereco = $row2[2];
		$telefone = $row2[3];
		$nome = $row2[4];
	}
?>
<div class="modal-content center">
	<form method="get" action="acao.php">
	<h1 class="title teal-text">Alterar Pessoa</h1><br>
	<div class="row">
		<div class="col s12 m12 l6">
			<b>Nome</b><br>
			<input type="text" name="nome" placeholder="Nome" required="true" value="<?php echo $nome ?>"><br>
		</div>
		<div class="col s12 m12 l6">
			<b>Endereço</b><br>
			<input type="text" name="endereco" placeholder="Endereço" required="true" value="<?php echo $endereco ?>"><br>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12 l4">
			<b>Telefone</b><br>
			<input type="text" name="telefone" placeholder="Telefone" required="true" value="<?php echo $telefone ?>" data-mask="(00) 00000-0000"><br>
		</div>
		<div class="col s12 m12 l4">
			<b>RG</b><br>
			<input type="text" name="rg" placeholder="RG" required="true" value="<?php echo $rg ?>" readonly><br>
		</div>
		<div class="col s12 m12 l4">
			<b>CPF</b><br>
			<input type="text" name="cpf" placeholder="CPF" required="true" value="<?php echo $cpf ?>" readonly><br>
		</div>
	</div><br>
	<div class="row">
		<div class="col s12 m12 l3 offset-l3">
			<button class="waves-effect waves-light btn teal modal-close"><i class="material-icons left">arrow_back</i>Voltar</button>
		</div>
		<div class="col s12 m12 l3">
			<button class="waves-effect waves-light btn teal white-text"><i class="material-icons left prefix">send</i><input type="submit" name="enviar" value="Salvar" class="white-text"></button>
			<input type="hidden" name="tabela" value="pessoa">
			<input type="hidden" name="cpf_antigo" value="<?php echo $cpf_antigo ?>">
			<input type="hidden" name="acao" value="alterar_pessoa">
			<input type="hidden" name="pagina" value="pessoa.php">
		</div>
	</div>
</form>
</div>