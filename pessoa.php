<?php
	$title = "Listagem de Pessoas";
	include('connect/connect.php');
	include('funcoes.php');
	$pesquisa = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : '';
	$filtro = isset($_POST['filtro']) ? $_POST['filtro'] : '';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title>
		<?php echo $title;?>
	</title>
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
				<?php echo $title; ?>
			</h1>
			<!-- Pesquisa -->
				<div style="padding: 1em">
					<form action="pessoa.php" method="POST">
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
					                                <option value="Nome" <?php if ($filtro == 'Nome') echo 'selected' ?>>Nome</option>
					                                <option value="RG" <?php if ($filtro == 'RG') echo 'selected' ?>>RG</option>
					                                <option value="CPF" <?php if ($filtro == 'CPF') echo 'selected' ?>>CPF</option>
					                                <option value="endereco" <?php if ($filtro == 'endereco') echo 'selected' ?>>Endereço</option>
					                                <option value="Telefone" <?php if ($filtro == 'Telefone') echo 'selected' ?>>Telefone</option>
					                            </select>
					                        </div>
					                    </div>
				                        <div class="col s12 m12 l6">
				                            <div class="input-field">
				                                <i class="material-icons teal-text left prefix">search</i>
				                                <input id="pesquisar" type="text" name="pesquisa" value="<?php echo $pesquisa; ?>" class="validate">
				                                <label for="pesquisar">Pesquisa</label>
				                            </div>
				                        </div>
				                        <div class="col s6 offset-s3 m4 offset-m4 l3">
				                            <button class="btn waves-effect waves-light" type="submit" name="enviar" style="margin-top: 1.5em">Pesquisar
												<i class="material-icons right white-text">send</i>
											</button>
				                        </div>
				                    </div>
						      </div>
						    </li>
						  </ul>
	               
                	</form>
                </div>

               <?php
			        if ($pesquisa == '') {
			            $sql = "SELECT * FROM ". $tb_pessoa;
			        } elseif ($filtro == 'Nome') {
			            $sql = "SELECT * FROM ". $tb_pessoa. " WHERE nome LIKE '%". $pesquisa. "%' ORDER BY ". $filtro;
			        } elseif ($filtro == 'RG') {
			            $sql = "SELECT * FROM ". $tb_pessoa. " WHERE rg LIKE '". $pesquisa. "%' ORDER BY ". $filtro;
			        } elseif ($filtro == 'CPF') {
			            $sql = "SELECT * FROM ". $tb_pessoa. " WHERE cpf LIKE '". $pesquisa. "%' ORDER BY ". $filtro;
			        } elseif ($filtro == 'endereco') {
			            $sql = "SELECT * FROM ". $tb_pessoa. " WHERE endereco LIKE '%". $pesquisa. "%' ORDER BY ". $filtro;
			        } elseif ($filtro == 'Telefone') {
			            $sql = "SELECT * FROM ". $tb_pessoa. " WHERE telefone LIKE '%". $pesquisa. "%' ORDER BY ". $filtro;
			        } else {
			            $sql = "SELECT * FROM ". $tb_pessoa. " WHERE nome LIKE '%". $pesquisa. "%'
			                                                          OR cpf LIKE '". $pesquisa. "%' 
			                                                          OR rg LIKE'%". $pesquisa. "%'"; 
			        }
			        $resultado = mysqli_query ($conexao, $sql);
			    ?>

			<div class="row">
				<div class="col s12 m12 l12">
					<table class="responsive-table">
						<thead>
							<th>Nome</th>
							<th>CPF</th>
							<th>RG</th>
							<th>Endereço</th>
							<th>Telefone</th>
							<th></th>
							<th></th>
						</thead>
				<?php
					while ($row = mysqli_fetch_array($resultado)) { 
						$cpf = $row[0]; ?>
							<tr>
								<td>
									<?php echo $row[4]; ?>
								</td>
								<td>
									<?php echo $row[0]; ?>
								</td>
								<td>
									<?php echo $row[1]; ?>
								</td>
								<td>
									<?php echo $row[2]; ?>
								</td>
								<td>
									<?php echo $row[3]; ?>
								</td>
								<td><a href="javascript:excluirRegistro('acao.php?acao=excluir_pessoa&cpf=<?php  echo $row[0] ?>&tabela=<?php echo $tb_pessoa ?>&pagina=pessoa.php')"><i class="material-icons red-text text-darken-2">delete</i></a></td>
								<td>
									<a href="#alterar<?php echo $row[0] ?>" class="modal-trigger"><i class="material-icons green-text text-darken-2">edit</i></a>
									<div id="alterar<?php echo $row[0] ?>" class="modal">
										<?php include('pessoa_alterar.php') ?>
									</div>
								</td>
							</tr>

							<?php } ?>
						<tr>
							<td><?php include_once('pessoa_cadastrar.php') ?></td>
							<td colspan="6"></td>
						</tr>
					</table>
					<br><br>
					<a href="index.php" class="link white-text"><button class="waves-effect waves-light btn teal"><i class="material-icons left">arrow_back</i>Voltar</button></a>
				</div>
			</div>
		</div>
	</main>

	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script type="text/javascript" src="src/jquery.mask.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('select').formSelect();
			$('.modal').modal();
    		$('.sidenav').sidenav();
    		$('.collapsible').collapsible();
    	});
		function excluirRegistro(url) {
			if (confirm('Confirmar exclusão?'))
				location.href = url;
		}
	</script>
</body>
</html>