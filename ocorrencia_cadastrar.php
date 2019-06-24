<!-- Modal Trigger -->
<a class="modal-trigger" href="#cadastrar"><i class="material-icons green-text">add_circle</i></a>

<!-- Modal Structure -->
<div id="cadastrar" class="modal modal1">
	<div class="modal-content">
		<form method="get" action="acao.php">
			<h1 class="title teal-text">Cadastro de Ocorrências</h1><br>
			<div class="row">
				<div class="col s12 m12 l4">
					<b>Data</b><br>
					<input type="text" name="data_ocorrencia" placeholder="Data" required="true" data-mask="00/00/0000"><br>
				</div>
				<div class="col s12 m12 l4">
					<b>Local</b><br>
					<input type="text" name="local_ocorrencia" placeholder="Local" required="true"><br>
				</div>
				<div class="col s12 m12 l4">
					<b>Placa Carro</b><br>
					<?php geraSelect('<option value="0" selected="true" disabled>Escolha</option>', 'carro', '', 'placa', 'placa', 'carro'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12 l6 offset-l3 input-field">
					<b>Descrição</b><br><br>
					<textarea name="descricao" id="descricao" placeholder="Descreva a ocorrência" style=" height: 6rem;" class="materialize-textarea" data-length="400"></textarea>
				</div>
			</div><br>
			<div class="row">
				<div class="col s12 m12 l3 offset-l3">
					<button class="waves-effect waves-light btn teal modal-close"><i class="material-icons left">arrow_back</i>Voltar</button>
				</div>
				<div class="col s12 m12 l3">
					<button class="waves-effect waves-light btn teal white-text"><i class="material-icons left prefix">send</i><input type="submit" name="enviar" value="Salvar" class="white-text"></button>
					<input type="hidden" name="tabela" value="ocorrencia">
					<input type="hidden" name="acao" value="salvar_ocorrencia">
					<input type="hidden" name="pagina" value="ocorrencia.php">
				</div>
			</div>
		</form>
	</div>
</div>