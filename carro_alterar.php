<?php
	$sql2 = "select * from carro where placa = '" .$row[0]."'";
	$resultado2 = mysqli_query($conexao, $sql2);
	while ($row2 = mysqli_fetch_array($resultado2)) {
		$fabricante = $row2[1];
		$modelo = $row2[2];
		$ano = $row2[3];
		$cpf_pessoa = $row2[4];
	}
?>
<form method="get" action="acao.php">
	<h1 class="title teal-text">Cadastro de Carros</h1>
	<div class="row">
		<div class="col s12 m12 l4">
			<b>Placa</b><br>
			<input type="text" name="placa" placeholder="Placa" required="true" value="<?php echo $row[0] ?>"><br>
		</div>
		<div class="col s12 m12 l4">
			<b>Fabricante</b><br>
			<input type="text" name="fabricante" placeholder="Fabricante" required="true" value="<?php echo $fabricante ?>"><br>
		</div>
		<div class="col s12 m12 l4">
			<b>Ano</b><br>
			<input type="text" name="ano" placeholder="Ano" required="true" value="<?php echo $ano ?>"><br>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12 l6">
			<b>Modelo</b><br>
			<input type="text" name="modelo" placeholder="Modelo" required="true" value="<?php echo $modelo ?>"><br>
		</div>
		<div class="col s12 m12 l6">
			<b>Dono</b><br>
			<?php geraSelect('<option value="0" selected="true" disabled>Escolha</option>', 'pessoa', $cpf_pessoa, 'cpf', 'nome', 'cpf_pessoa'); ?>
		</div>
	</div><br>
	<div class="row">
		<div class="col s12 m12 l4">
			<button class="waves-effect waves-light btn teal"><i class="material-icons left">arrow_back</i><a href="index.php" class="link white-text">Voltar</a></button><br><br>
		</div>
		<div class="col s12 m12 l4">
			<button class="waves-effect waves-light btn teal"><a href="carro.php" class="link white-text"><i class="material-icons left">search</i>Consultar</a></button><br><br>
		</div>
		<div class="col s12 m12 l4">
			<button class="waves-effect waves-light btn teal white-text"><i class="material-icons left prefix">send</i><input type="submit" name="enviar" value="Salvar" class="white-text"></button><br><br>
			<input type="hidden" name="tabela" value="carro">
			<input type="hidden" name="acao" value="alterar_carro">
			<input type="hidden" name="pagina" value="carro.php">
		</div>
	</div>
</form>