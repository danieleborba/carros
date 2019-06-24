<?php
	// Pegando os valores do BD
	$sql2 = "select * from ocorrencia where codigo = " .$row[0];
	$resultado2 = mysqli_query($conexao, $sql2);
	while ($row2 = mysqli_fetch_array($resultado2)) {
		$data_ocorrencia = $row2[1];
		$local_ocorrencia = $row2[2];
		$descricao = $row2[3];
		$placa_carro = $row2[4];
	}
?>
<form method="get" action="acao.php">
	<h1 class="title teal-text">Alterar Ocorrência</h1><br>
	<div class="row">
		<!-- Data -->
		<div class="col s12 m12 l4">
			<b>Data</b><br>
			<input type="text" name="data_ocorrencia" placeholder="Data" required="true" value="<?php echo date('d/m/Y', strtotime(str_replace('/', '-', $data_ocorrencia))) ?>"><br>
		</div>
		<!-- Local -->
		<div class="col s12 m12 l4">
			<b>Local</b><br>
			<input type="text" name="local_ocorrencia" placeholder="Local" required="true" value="<?php echo $local_ocorrencia ?>"><br>
		</div>
		<!-- Carro -->
		<div class="col s12 m12 l4">
			<b>Placa Carro</b><br>
			<?php geraSelect('<option value="0" selected="true" disabled>Escolha</option>', 'carro', $placa_carro, 'placa', 'placa', 'carro'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12 l6 offset-l3">
			<!-- Descrição -->
			<b>Descrição</b><br><br>
			<textarea name="descricao" id="descricao" placeholder="Descreva a ocorrência" style=" height: 6rem;" class="materialize-textarea" data-length="400"><?php echo $descricao ?></textarea>
		</div>
	</div><br>
	<div class="row">
		<!-- Voltar -->
		<div class="col s12 m12 l3 offset-l3">
			<button class="waves-effect waves-light btn teal modal-close"><i class="material-icons left">arrow_back</i>Voltar</button>
		</div>
		<!-- Enviar -->
		<div class="col s12 m12 l3">
			<button class="waves-effect waves-light btn teal white-text"><i class="material-icons left prefix">send</i><input type="submit" name="enviar" value="Salvar" class="white-text"></button>
			<input type="hidden" name="tabela" value="ocorrencia">
			<input type="hidden" name="acao" value="alterar_ocorrencia">
			<input type="hidden" name="pagina" value="ocorrencia.php">
			<input type="hidden" name="codigo" value="<?php echo $row[0] ?>">
		</div>
	</div>
</form>