<!-- Modal Trigger -->
<a class="modal-trigger" href="#cadastrar"><i class="material-icons green-text">add_circle</i></a>

<!-- Modal Structure -->
<div id="cadastrar" class="modal">
	<div class="modal-content">
		<form action="acao.php" method="get">
		<div class="row">
			<div class="col s12 m12 l12">
				<h1 class="flow-text">Cadastro de Pessoas</h1>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m12 l6">
				<b>Nome</b><br>
				<input type="text" name="nome" placeholder="Nome" required="true"><br>
			</div>
			<div class="col s12 m12 l6">
				<b>Endereço</b><br>
				<input type="text" name="endereco" placeholder="Endereço" required="true"><br>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m12 l4">
				<b>Telefone</b><br>
				<input type="text" name="telefone" placeholder="Telefone" required="true" data-mask="(00) 00000-0000"><br>
			</div>
			<div class="col s12 m12 l4">
				<b>RG</b><br>
				<input type="text" name="rg" placeholder="RG" required="true" data-mask="0.000.000"><br>
			</div>
			<div class="col s12 m12 l4">
				<b>CPF</b><br>
				<input type="text" name="cpf" placeholder="CPF" required="true" data-mask="000.000.000-00"><br>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m12 l3 offset-l3">
				<button class="waves-effect waves-light btn teal modal-close"><i class="material-icons left">arrow_back</i>Voltar</button><br><br>
			</div>
			<div class="col s12 m12 l3">
				<button class="waves-effect waves-light btn teal white-text" value="Enviar"><i class="material-icons right">send</i><input type="submit" class="white-text"></button><br><br>
				<input type="hidden" name="tabela" value="pessoa">
				<input type="hidden" name="acao" value="salvar_pessoa">
				<input type="hidden" name="pagina" value="pessoa.php">
			</div>
		</div>
		</form>
	</div>
</div>