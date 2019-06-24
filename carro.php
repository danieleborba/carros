<?php
	$title = "Listagem de Carros";
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
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="shortcut icon" type="imagem/x-icon" href="img/traffic-cone.png">
		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<?php geraNav(); ?>

		<main>
			<div class="container center">
				<h1 class="title teal-text">
					<?php echo $title ?>
				</h1><br>

				<!-- Pesquisa -->
				<div style="padding: 1em">
					<form action="carro.php" method="POST">
						<ul class="collapsible">
						    <li class="
						    <?php 
					    		if (isset($_POST['pesquisa'])) {  
					    			echo 'active'; 
					    		}
						    ?>">
						      <div class="collapsible-header"><i class="material-icons">search</i>Busca</div>
						      <div class="collapsible-body">
						     		<div class="row">
				                    	<div class="col s1 m1 l1" id="icone_filtro">
				                    		<i class="material-icons teal-text">filter_list</i>
				                    	</div>
				                    	<div class="col s10 m11 l2">
					                        <div class="input-field">
					                            <select name="filtro" class="right">
					                                <option value="" <?php if ($filtro == '') echo 'selected' ?>>Filtrar por...</option>
					                                <option value="placa" <?php if ($filtro == 'placa') echo 'selected' ?>>Placa</option>
					                                <option value="fabricante" <?php if ($filtro == 'fabricante') echo 'selected' ?>>Fabricante</option>
					                                <option value="modelo" <?php if ($filtro == 'modelo') echo 'selected' ?>>Modelo</option>
					                                <option value="ano" <?php if ($filtro == 'ano') echo 'selected' ?>>Ano</option>
					                                <option value="cpf_pessoa" <?php if ($filtro == 'cpf_pessoa') echo 'selected' ?>>CPF do Dono</option>
					                            </select>
					                        </div>
					                    </div>
				                        <div class="col s12 m12 l6">
				                            <div class="input-field">
				                                <i class="material-icons prefix">search</i>
				                                <input id="pesquisar" type="text" name="pesquisa" value="<?php echo $pesquisa; ?>" class="validate">
				                                <label for="pesquisar">Pesquisa</label>
				                            </div>
				                        </div>
				                        <div class="col s6 offset-s3 m4 offset-m4 l3">
				                            <button class="btn waves-effect waves-light" type="submit" name="enviar" style="margin-top: 1.5em"><input style="margin-top: .7em" type="submit" value="pesquisar" name="pesquisar" class="white-text"><i class="material-icons right">send</i></button>
											</button>
				                        </div>
				                    </div>
						    </li>
						    <li class="
						    <?php 
					    		if (isset($_POST['pesquisar2'])) {  
					    			echo 'active'; 
					    		}
						    ?>">
							<div class="collapsible-header"><i class="material-icons">zoom_in</i>Busca avançada</div>
							<div class="collapsible-body">
								<div class="row center">
									<div class="col s11 m12 l3">
										<input type="hidden" name="filtro_avancado" value="ano_carro">
										<p><h5 style="font-style: normal; text-shadow: none; font-size: 110%"><b>Ano do carro</b></h5></p>
									</div>
									<div class="col s12 m12 l1">
										<p>Entre</p>
									</div>
									<div class="col s12 m12 l2">
										<input type="text" name="inicio" id="inicio" value="<?php echo $inicio; ?>"
											data-mask="0000">
									</div>
									<div class="col s12 m12 l1">
										<p>e</p>
									</div>
									<div class="col s12 m12 l2">
										<input type="text" name="fim" id="fim" value="<?php echo $fim; ?>"
											data-mask="0000">
									</div>
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
               		if (isset($_POST['pesquisar'])) {
				        if ($pesquisa == '') {
				            $sql = "SELECT * FROM ". $tb_carro;
				        } elseif ($filtro == 'placa') {
				            $sql = "SELECT * FROM ". $tb_carro. " WHERE placa LIKE '%". $pesquisa. "%' ORDER BY ". $filtro;
				        } elseif ($filtro == 'fabricante') {
				            $sql = "SELECT * FROM ". $tb_carro. " WHERE fabricante LIKE '". $pesquisa. "%' ORDER BY ". $filtro;
				        } elseif ($filtro == 'modelo') {
				            $sql = "SELECT * FROM ". $tb_carro. " WHERE modelo LIKE '". $pesquisa. "%' ORDER BY ". $filtro;
				        } elseif ($filtro == 'ano') {
				            $sql = "SELECT * FROM ". $tb_carro. " WHERE ano LIKE '%". $pesquisa. "%' ORDER BY ". $filtro;
				        } elseif ($filtro == 'cpf_pessoa') {
				            $sql = "SELECT * FROM ". $tb_carro. " WHERE cpf_pessoa LIKE '%". $pesquisa. "%' ORDER BY ". $filtro;
				        } else {
				            $sql = "SELECT * FROM ". $tb_carro. " WHERE nome LIKE '%". $pesquisa. "%' OR cpf LIKE '". $pesquisa. "%' OR rg LIKE'%". $pesquisa. "%'"; 
				        }
				        $resultado = mysqli_query ($conexao, $sql);
				    }
				    /* Pesquisa Avançada */ 
	           		elseif (isset($_POST['pesquisar2'])) {
	           			if ($filtro_avancado == 'ano_carro') {
	           				if ($inicio != '' && $fim != '') {
				            	$sql = "SELECT * FROM ". $tb_carro. " WHERE ano between '" .$inicio. "' and '" .$fim. "'";
	           				}
				        } else {
				            $sql = "SELECT * FROM ". $tb_ocorrencia; 
				        }
				        $resultado = mysqli_query ($conexao, $sql);
	           		} else {
	           			/* Sem filtro */
			            $sql = "SELECT * FROM ". $tb_carro; 
				        $resultado = mysqli_query($conexao, $sql);
			        }	
			    ?>

				<div class="row">
					<div class="col s12 m12 l12">
						<!-- <?php echo $sql; ?> -->
						<table class="responsive-table">
							<thead>
								<th>Placa</th>
								<th>Fabricante</th>
								<th>Modelo</th>
								<th>Ano</th>
								<th>CPF do Dono</th>
								<th>Dono</th>
								<th></th>
								<th></th>
							</thead>
					<?php
						$resultado = mysqli_query($conexao, $sql);
						while ($row = mysqli_fetch_array($resultado)) {  ?>
							<tr>
								<td>
									<?php echo $row['placa']; ?>
								</td>
								<td>
									<?php echo $row['fabricante']; ?>
								</td>
								<td>
									<?php echo $row['modelo']; ?>
								</td>
								<td>
									<?php echo $row['ano']; ?>
								</td>
								<td>
									<?php echo $row['cpf_pessoa']; ?>
								</td>
								<td>
									<?php
										$sql2 = 'select nome from '.$tb_pessoa.' where cpf = "' .$row['cpf_pessoa']. '"';
										$dono = mysqli_query($conexao, $sql2);
										while ($row2 = mysqli_fetch_array($dono)) {
											echo $row2['nome'];
										}
									?>
								</td>
								<td><b><a href="javascript:excluirRegistro('acao.php?acao=excluir_carro&placa=<?php echo $row[0] ?>&tabela=<?php echo $tb_carro ?>&pagina=carro.php')"><i class="material-icons red-text text-darken-2">delete</i></a></td>
								<!-- Chamando modal para edição -->
								<td>
								<a href="#alterar<?php echo $row[0] ?>" class="modal-trigger"><i class="material-icons green-text text-darken-2">edit</i></a>
								<div id="alterar<?php echo $row[0] ?>" class="modal">
									<?php include('carro_alterar.php') ?>
								</div>
							</tr>
						<?php } ?>
						<tr>
							<td>
								<!-- Modal Trigger -->
								<a class="modal-trigger" href="#cadastro"><i class="material-icons green-text">add_circle</i></a>
							</td>
							<td colspan="2"></td>
							<td><span class="teal-text text-darken-2"><b><?php echo floor(avgCarros()); ?></b></span><br>(média)<br><span class="teal-text text-darken-2"><b><?php echo floor(minCarros()); ?></b></span><br>(mais antigo)<br><span class="teal-text text-darken-2"><b><?php echo floor(maxCarros()); ?></b></span><br>(mais novo)</td>
							<td colspan="3"></td>
						</tr>
					</table>
					<br><br>
					<a href="index.php" class="link white-text"><button class="waves-effect waves-light btn teal"><i class="material-icons left">arrow_back</i>Voltar</button></a>
				</div>
			</div>
		</div>

		<!-- Modal Structure -->
		<div id="cadastro" class="modal center">
			<div class="modal-content">
				<form method="get" action="acao.php">
					<h1 class="title teal-text flow-text">Cadastro de Carros</h1>
					<div class="row">
						<div class="col s12 m12 l4">
							<b>Placa</b><br>
							<input type="text" name="placa" placeholder="Placa" required="true" data-mask="SSS-0000"><br>
						</div>
						<div class="col s12 m12 l4">
							<b>Fabricante</b><br>
							<input type="text" name="fabricante" placeholder="Fabricante" required="true"><br>
						</div>
						<div class="col s12 m12 l4">
							<b>Ano</b><br>
							<input type="text" name="ano" placeholder="Ano" required="true" data-mask="0000"><br>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12 l6">
							<b>Modelo</b><br>
							<input type="text" name="modelo" placeholder="Modelo" required="true"><br>
						</div>
						<div class="col s12 m12 l6">
							<b>Dono</b><br>
							<?php geraSelect('<option value="0" selected="true" disabled>Escolha</option>', 'pessoa', '', 'cpf', 'nome', 'pessoa'); ?>
						</div>
					</div><br>
					<div class="row">
						<div class="col s12 m12 l3 offset-l3">
							<button class="waves-effect waves-light btn teal"><i class="material-icons left">arrow_back</i><a href="index.php" class="link white-text">Voltar</a></button><br><br>
						</div>
						<div class="col s12 m12 l3">
							<button class="waves-effect waves-light btn teal white-text"><i class="material-icons left prefix">send</i><input type="submit" name="enviar" value="Salvar" class="white-text"></button><br><br>
							<input type="hidden" name="tabela" value="carro">
							<input type="hidden" name="acao" value="salvar_carro">
							<input type="hidden" name="pagina" value="carro.php">
						</div>
					</div>
				</form>
			</div>
		</div>
	</main>

	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script type="text/javascript" src="src/jquery.mask.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('select').formSelect();
			$('.modal').modal();
    		$('.sidenav').sidenav();
    		$('.collapsible').collapsible();
    	});
		function excluirRegistro(url){
			if (confirm('Confirmar exclusão?'))
				location.href = url;
		};
	</script>
</body>	
</html>
