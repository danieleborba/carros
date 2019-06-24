<?php
	include('connect/connect.php');
	include('funcoes.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Carroçidente</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="shortcut icon" type="imagem/x-icon" href="img/traffic-cone.png">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="index">
	<main class="center">
		<div id="principal" class="center" style="margin-top: -20px">
			<div class="row center-align">
				<div class="col s11 m12 l12 center">
					<h1 class="center titulo">
						<img src="img/logo2.png" id="logo">
					</h1>
				</div>
			</div>

			<!-- Botões para acessar as páginas de listagem/cadastro/edição -->
			<div class="row"  style="margin-top: -10em">
				<div class="col s4 m4 l2 offset-l3">
					<a href="pessoa.php"><i class="icone material-icons teal-text text-darken-1" style="font-size: 5rem">account_circle</i></a>
					<p>Pessoas<br>
						<?php echo countPessoas() ?>
					</p>
				</div>
				<div class="col s4 m4 l2">
					<a href="carro.php"><i class="icone material-icons teal-text text-darken-1" style="font-size: 5rem">directions_car</i></a>
					<p>Carros<br>
						<?php echo countCarros(); ?>
					</p>
				</div>
				<div class="col s4 m4 l2">
					<a href="ocorrencia.php"><i class="icone material-icons teal-text text-darken-1" style="font-size: 5rem">announcement</i></a>
					<p>Ocorrências<br>
						<?php echo countOcorrencias(); ?>
					</p>
				</div>
			</div>
		</div>
	</main>

	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script>
		$(document).ready(function(){
			$('select').formSelect();
		});
		function excluirRegistro(url) {
			if (confirm('Confirmar exclusão?'))
				location.href = url;
		}

	</script>
</body>
</html>