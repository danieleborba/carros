<?php
	$title = "Listagem de Ocorrências";
	include('connect/connect.php');
	include('funcoes.php');	

	// Definindo variáveis de pesquisa
	$pesquisa = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : '';
	$pesquisar = isset($_POST['pesquisar']) ? $_POST['pesquisar'] : '';
	$pesquisar2 = isset($_POST['pesquisar2']) ? $_POST['pesquisar2'] : '';
	$filtro = isset($_POST['filtro']) ? $_POST['filtro'] : '';
	$filtro_avancado = isset($_POST['filtro_avancado']) ? $_POST['filtro_avancado'] : '';
	$inicio = isset($_POST['inicio']) ? $_POST['inicio'] : '';
	$fim = isset($_POST['fim']) ? $_POST['fim'] : '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="shortcut icon" type="imagem/x-icon" href="img/traffic-cone.png">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- Função para incluir o header com navbar -->
	<?php geraNav(); ?>

	<main>
		<div class="container center">
			<!-- Título no desktop -->
			<h1 class="title teal-text hide-on-small-only">
				<?php echo $title ?>
			</h1>

			<!-- Título no mobile -->
			<h2 class="title teal-text hide-on-med-and-up">
				<?php echo $title ?>
			</h2><br>

			<!-- Pesquisas -->
			<div style="padding: 1em">
				<form action="ocorrencia.php" method="POST">
					<ul class="collapsible">
						<!-- Pesquisa Simple -->
						<li class="<?php if ($pesquisa != '') echo 'active'; ?>">
							<div class="collapsible-header">
								<i class="material-icons">search</i>Busca simples
							</div>
							<div class="collapsible-body">
								<div class="row">
									<div class="col s1 m1 l1" id="icone_filtro">
										<i class="material-icons teal-text">filter_list</i>
									</div>
									<div class="col s10 m11 l2">
										<div class="input-field">
											<!-- Selecionar o filtro -->
											<select name="filtro" class="right">
												<option value="" <?php if ($filtro == '') echo 'selected' ?>>Filtrar
													por...</option>
												<option value="data_ocorrencia"
													<?php if ($filtro == 'data_ocorrencia') echo 'selected' ?>>Data
												</option>
												<option value="local" <?php if ($filtro == 'local') echo 'selected' ?>>
													Local</option>
												<option value="descricao"
													<?php if ($filtro == 'descricao') echo 'selected' ?>>Descrição
												</option>
												<option value="placa_carro"
													<?php if ($filtro == 'placa_carro') echo 'selected' ?>>Placa</option>
											</select>
										</div>
									</div>
									<!-- Pesquisa -->
									<div class="col s12 m12 l6">
										<div class="input-field">
											<i class="material-icons teal-text left prefix">search</i>
											<input id="pesquisar" type="text" name="pesquisa"
												value="<?php echo $pesquisa; ?>" class="validate">
											<label for="pesquisar">Pesquisa</label>
										</div>
									</div>
									<!-- Enviar -->
									<div class="col s6 offset-s3 m4 offset-m4 l3">
										<button class="waves-effect waves-light btn teal" style="margin-top: 1em"><input style="margin-top: .7em" type="submit" value="pesquisar" name="pesquisar" class="white-text"><i class="material-icons right">send</i></button>
									</div>
								</div>
							</div>
						</li>

						<!-- Pesquisa Avançada -->
						<li class="<?php if (isset($_POST['inicio']) || isset($_POST['fim'])) { echo 'active'; } ?>">
							<div class="collapsible-header">
								<i class="material-icons">zoom_in</i>Busca avançada
							</div>
							<div class="collapsible-body">
								<div class="row center">
									<div class="col s11 m12 l3" style="margin-top: -.7em">
										<div class ="input-field">
											<!-- Selecionar filtro -->
											<select name="filtro_avancado" class="right">
												<option value="" <?php if ($filtro_avancado == '') echo 'selected' ?> disabled>
													Filtrar por...</option>
												<option value="data_ocorrencia"
													<?php if ($filtro_avancado == 'data_ocorrencia') echo 'selected' ?>>
													Data</option>
												<option value="codigo"
													<?php if ($filtro_avancado == 'codigo') echo 'selected' ?>>Código
												</option>
											</select>
										</div>
									</div>
									<!-- Valor Inicial -->
									<div class="col s12 m12 l1">
										<p>Entre</p>
									</div>
									<div class="col s12 m12 l2">
										<input type="text" name="inicio" id="inicio" value="<?php echo $inicio; ?>"
											data-mask="00/00/0000">
									</div>
									<!-- Valor final -->
									<div class="col s12 m12 l1">
										<p>e</p>
									</div>
									<div class="col s12 m12 l2">
										<input type="text" name="fim" id="fim" value="<?php echo $fim; ?>"
											data-mask="00/00/0000">
									</div>
									<!-- Enviar -->
									<div class="col s12 m12 l3">
										<button class="waves-effect waves-light btn teal" style="margin-top: 1em"><input style="margin-top: .7em" type="submit" value="pesquisar" name="pesquisar2" class="white-text"><i class="material-icons right">send</i></button>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</form>
			</div>

			<?php
				/* Pesquisa simples */
           		if (isset($_POST['pesquisar'])) {
           			if ($pesquisa == '') {
			            $sql = "SELECT * FROM ". $tb_ocorrencia;
			        } elseif ($filtro == 'data_ocorrencia') { 
			            $sql = "SELECT * FROM ". $tb_ocorrencia. " WHERE data_ocorrencia LIKE '%". $pesquisa. "%' ORDER BY ". $filtro;
			        } elseif ($filtro == 'local') {
			            $sql = "SELECT * FROM ". $tb_ocorrencia. " WHERE local_ocorrencia LIKE '%". $pesquisa. "%' ORDER BY ". $filtro;
			        } elseif ($filtro == 'descricao') {
			            $sql = "SELECT * FROM ". $tb_ocorrencia. " WHERE descricao LIKE '%". $pesquisa. "%' ORDER BY ". $filtro;
			        } elseif ($filtro == 'placa_carro') {
			            $sql = "SELECT * FROM ". $tb_ocorrencia. " WHERE placa_carro LIKE '%". $pesquisa. "%' ORDER BY ". $filtro;
			        } else {
			            $sql = "SELECT * FROM ". $tb_ocorrencia. " WHERE data_ocorrencia LIKE '%". $pesquisa. "%' OR local_ocorrencia LIKE '". $pesquisa. "%' OR descricao LIKE'%". $pesquisa. "%' OR placa_carro LIKE '". $pesquisa. "%' "; 
			        }
			        $resultado = mysqli_query($conexao, $sql);
           		} 
           		/* Pesquisa Avançada */ 
           		elseif (isset($_POST['pesquisar2'])) {
           			if ($filtro_avancado == 'data_ocorrencia') {
           				if ($inicio != '' && $fim != '') {
			            	$sql = "SELECT * FROM ". $tb_ocorrencia. " WHERE data_ocorrencia between '". date('Y-m-d', strtotime(str_replace('/', '-', $inicio))). "' and '" .date('Y-m-d', strtotime(str_replace('/', '-', $fim))). "'";
           				} elseif ($inicio == '') {
			            	$sql = "SELECT * FROM ". $tb_ocorrencia. " WHERE data_ocorrencia <= '". date('Y-m-d', strtotime(str_replace('/', '-', $fim))). "'";
           				}elseif ($fim == '') {
           					$sql = "SELECT * FROM ". $tb_ocorrencia. " WHERE data_ocorrencia >= '". date('Y-m-d', strtotime(str_replace('/', '-', $inicio))). "'";
           				}
			      		$resultado = mysqli_query ($conexao, $sql);
			        } elseif ($filtro_avancado == 'codigo') {
			            $sql = "SELECT * FROM ". $tb_ocorrencia. " WHERE codigo BETWEEN ". $inicio. " AND ". $fim;
			        } else {
			            $sql = "SELECT * FROM ". $tb_ocorrencia; 
			        }
			        $resultado = mysqli_query ($conexao, $sql);
           		} else {
           			/* Sem filtro */
		            $sql = "SELECT * FROM ". $tb_ocorrencia; 
			        $resultado = mysqli_query($conexao, $sql);
		        }		        
		    ?>

		    <!-- Tabela com os valores do BD -->
			<div class="row">
				<div class="col s12 m12 l12">
					<table class="responsive-table">
						<!-- <?php echo $sql ?> -->
						<thead>
							<th>Código</th>
							<th>Data</th>
							<th>Local</th>
							<th>Descrição</th>
							<th>Placa do Carro</th>
							<th></th> <!-- Coluna em branco p/ exclusão -->
							<th></th> <!-- Coluna em branco p/ edição -->
						</thead>
						<tbody>
							<?php
								while ($row = mysqli_fetch_array($resultado)) { ?>
									<tr>
										<td>
											<?php echo $row['codigo']; ?>
										</td>
										<td>
											<?php echo date('d/m/Y', strtotime(str_replace('/', '-', $row['data_ocorrencia']))) ?>
										</td>
										<td>
											<?php echo $row['local_ocorrencia']; ?>
										</td>
										<td>
											<?php echo $row['descricao']; ?>
										</td>
										<td>
											<?php echo $row['placa_carro']; ?>
										</td>

										<!-- Chamando função de exclusão -->
										<td>
											<a href="javascript:excluirRegistro('acao.php?acao=excluir_ocorrencia&codigo=<?php  echo $row[0] ?>&tabela=<?php echo $tb_ocorrencia ?>&pagina=ocorrencia.php')">
												<i class="material-icons red-text text-darken-2">delete</i>
											</a>
										</td>
										
										<!-- Chamando modal para edição -->
										<td>
											<a href="#alterar<?php echo $row[0] ?>" class="modal-trigger">
												<i class="material-icons green-text text-darken-2">edit</i>
											</a>
											<div id="alterar<?php echo $row[0] ?>" class="modal modal1">
												<br>
												<?php 
													include('ocorrencia_alterar.php');
												?>
											</div>
										</td>
									</tr>
							<?php } ?>
							<tr>
								<!-- Incluindo página com o modal para cadastro -->
								<td>
									<?php include_once('ocorrencia_cadastrar.php'); ?>
								</td>
								<td colspan="6"></td>
							</tr>
						</tbody>
					</table>
					<br><br>

					<!-- Botão para a página inicial -->
					<a href="index.php" class="link white-text"><button class="waves-effect waves-light btn teal"><i class="material-icons left">arrow_back</i>Voltar</button></a>
				</div>
			</div>
		</div>
	</main>

	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script type="text/javascript" src="src/jquery.mask.js"></script>
	<script src="js/init.js"></script>

	<script type="text/javascript">

		// Inicializando funções do Materialize
		$(document).ready(function () {
			$('select').formSelect();
			$('.dropdown-trigger').dropdown();
			$('.modal').modal();
			$('textarea#descricao').characterCounter();
			$('.sidenav').sidenav();
			$('.collapsible').collapsible();
		});

		// Função para excluir tuplas
		function excluirRegistro(url) {
			if (confirm('Confirmar exclusão?'))
				location.href = url;
		}
	</script>
	
</body>
</html>