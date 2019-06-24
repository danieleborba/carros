<?php
	function geraSelect($default, $tabela, $selecao, $value, $descricao, $select) {
		$sql = 'select * from ' .$tabela. ' order by ' .$descricao;
		echo '<select name="'.$select.'">';
		echo $default;
		$result = mysqli_query($GLOBALS['conexao'], $sql);
		while ($row = mysqli_fetch_array($result)) {
			$birobiro = "";
			if ($row[$value] == $selecao) {
				$birobiro = ' selected';
			}
			echo '<option value="'.$row[$value].'"' .$birobiro. '>' .$row[$descricao]. '</option>';
		}
		echo '</select>';
	}

	// Contar quant. de pessoas cadastradas
	function countPessoas() {
		include('conf/conf.inc.php');
		include('connect/connect.php');
		$sql1 = 'select count(cpf) from pessoa;';
		$resultado = mysqli_query($conexao, $sql1);
		while ($row = mysqli_fetch_array($resultado))
			$num_pessoas = $row[0];
		if ($num_pessoas != null) {
			return $num_pessoas;
		} else {
			return '0';
		}
	}

	// Contar quant. de carros cadastrados
	function countCarros() {
		include('conf/conf.inc.php');
		include('connect/connect.php');
		$sql2 = 'select count(placa) from carro;';
		$resultado2 = mysqli_query($conexao, $sql2);
		while ($row2 = mysqli_fetch_array($resultado2))
			$num_carros = $row2[0];
		if ($num_carros != null) {
			return $num_carros;
		} else {
			return '0';
		}
	}

	// Contar quant. de ocorrências cadastradas
	function countOcorrencias() {
		include('conf/conf.inc.php');
		include('connect/connect.php');
		$sql3 = 'select count(codigo) from ocorrencia;';
		$resultado3 = mysqli_query($conexao, $sql3);
		while ($row3 = mysqli_fetch_array($resultado3))
			$num_occorrencias = $row3[0];
		if ($num_occorrencias != null) {
			return $num_occorrencias;
		} else {
			return '0';
		}
	}

	// Ano médio do carro
	function avgCarros() {
		include('conf/conf.inc.php');
		include('connect/connect.php');
		$sql_avg = 'select avg(ano) from carro;';
		$resultado_avg = mysqli_query($conexao, $sql_avg);
		while ($row_avg = mysqli_fetch_array($resultado_avg)) {
			$avg = $row_avg[0];
		}
		return $avg;
	}

	// Ano do carro mais velho
	function minCarros() {
		include('conf/conf.inc.php');
		include('connect/connect.php');
		$sql_min = 'select min(ano) from carro;';
		$resultado_min = mysqli_query($conexao, $sql_min);
		while ($row_min = mysqli_fetch_array($resultado_min)) {
			$min = $row_min[0];
		}
		return $min;
	}

	// Ano do carro mais novo
	function maxCarros() {
		include('conf/conf.inc.php');
		include('connect/connect.php');
		$sql_max = 'select max(ano) from carro;';
		$resultado_max = mysqli_query($conexao, $sql_max);
		while ($row_max = mysqli_fetch_array($resultado_max)) {
			$max = $row_max[0];
		}
		return $max;
	}

	function geraNav() {
		echo '<header>
				<nav class="teal lighten-1" role="navigation">

					<div class="nav-wrapper container">
						<ul class="left">
							<li><a id="logo-container" href="index.php" class="brand-logo" id="logo"><img src="img/logo.png" style="margin-top: .2em" class="brand-logo"></a></li>
						</ul>
						<ul class="right hide-on-med-and-down">
							<li><a href="pessoa.php"><i class="material-icons left">account_circle</i>Pessoa</a></li>
							<li><a href="carro.php"><i class="material-icons left">directions_car</i>Carro</a></li>
							<li><a href="ocorrencia.php"><i class="material-icons left">error</i>Ocorrência</a></li>
						</ul>

						<ul id="sidenav-mobile" class="sidenav">
							<li><a href="index.php"><i class="material-icons left teal-text">directions_transit</i>Página Inicial</a></li>
							<li><a href="pessoa.php"><i class="material-icons left teal-text">account_circle</i>Pessoa</a></li>
							<li><a href="carro.php"><i class="material-icons left teal-text">directions_car</i>Carro</a></li>
							<li><a href="ocorrencia.php"><i class="material-icons left teal-text">error</i>Ocorrência</a></li>
						</ul>

						<a href="#" data-target="sidenav-mobile" class="sidenav-trigger" style="margin-left: -.1rem;"><i class="material-icons">menu</i></a>
					</div>
				</nav>
			</header>';
	}	
?>