<?php
	include('conf/conf.inc.php');
	include('connect/connect.php');

	$acao = isset($_GET["acao"]) ? $_GET["acao"] : '';
	$codigo = isset($_GET['codigo']) ? isset($_GET['codigo']) : 0;
	$tabela = isset($_GET["tabela"]) ? $_GET["tabela"] : '';
	$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : '';


	if ($acao == 'excluir_carro') {
		$placa = isset($_GET["placa"]) ? $_GET["placa"] : '';
		$sql1 = "delete from ocorrencia where placa_carro = '".$placa."';";
		$result = mysqli_query($conexao, $sql1);
		$sql2 = "delete from carro where placa = '".$placa."';";
		$result = mysqli_query($conexao, $sql2);
		header('location:'.$pagina);
		// echo $sql1.'<br>'.$sql2;
	}

	if ($acao == 'excluir_ocorrencia') {
		$codigo = isset($_GET["codigo"]) ? $_GET["codigo"] : '';
		$sql = "delete from ocorrencia where codigo = ".$codigo.";";
		$result = mysqli_query($conexao, $sql);
		header('location:'.$pagina);
		// echo $sql;
	}

	if ($acao == 'excluir_pessoa') {
		$cpf = isset($_GET['cpf']) ? $_GET['cpf'] : '';
		$sql = 'select placa from carro where cpf_pessoa = "'.$cpf.'"';
		$result = mysqli_query($conexao, $sql);
		while ($row1 = mysqli_fetch_array($result))
			$placa = $row1[0];
		$sql1 = "delete from ocorrencia where placa_carro = '".$placa."';";
		$result = mysqli_query($conexao, $sql1);
		$sql2 = "delete from carro where placa = '".$placa."';";
		$result = mysqli_query($conexao, $sql2);
		$sql3 = "delete from pessoa where cpf = '".$cpf."';";
		$result = mysqli_query($conexao, $sql3);
		header('location:'.$pagina);
		// echo $sql1;
	}

	if ($acao == 'excluir_tudo') {
		$cpf = isset($_GET['cpf']) ? $_GET['cpf'] : '';
		$sql = 'select placa from carro where cpf_pessoa = "'.$cpf.'"';
		$result = mysqli_query($conexao, $sql);
		while ($row1 = mysqli_fetch_array($result))
			$placa = $row1[0];
		$sql1 = "delete from ocorrencia where placa_carro = '".$placa."';";
		$result = mysqli_query($conexao, $sql1);
		$sql2 = "delete from carro where placa = '".$placa."';";
		$result = mysqli_query($conexao, $sql2);
		$sql3 = "delete from pessoa where cpf = '".$cpf."';";
		$result = mysqli_query($conexao, $sql3);
		header('location:'.$pagina);
		// echo $sql1;
	}

	if ($acao == 'salvar_pessoa') {
		$cpf = isset($_GET['cpf']) ? $_GET['cpf'] : '';
		$rg = isset($_GET['rg']) ? $_GET['rg'] : '';
		$endereco = isset($_GET['endereco']) ? $_GET['endereco'] : '';
		$telefone = isset($_GET['telefone']) ? $_GET['telefone'] : '';
		$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
		$sql = "INSERT INTO " .$tabela. " values ('".$cpf."', '".$rg."', '".$endereco."', '".$telefone."', '".$nome."');";
		$result = mysqli_query($conexao, $sql);
		// echo $sql;
		header('location:'.$pagina); 
	}

	if ($acao == 'salvar_carro') {
		$placa = isset($_GET['placa']) ? $_GET['placa'] : '';
		$fabricante = isset($_GET['fabricante']) ? $_GET['fabricante'] : '';
		$modelo = isset($_GET['modelo']) ? $_GET['modelo'] : '';
		$ano = isset($_GET['ano']) ? $_GET['ano'] : '';
		$pessoa = isset($_GET['pessoa']) ? $_GET['pessoa'] : '';
		$sql = "INSERT INTO " .$tabela. " values ('".$placa."', '".$fabricante."', '".$modelo."', '".$ano."', '".$pessoa."');";
		$result = mysqli_query($conexao, $sql);
		// echo $sql;
		header('location:'.$pagina); 
	}

	if ($acao == 'salvar_ocorrencia') {
		$data_ocorrencia = isset($_GET['data_ocorrencia']) ? $_GET['data_ocorrencia'] : '';
		$data_ocorrencia = (date('Y-m-d', strtotime(str_replace('/', '-', $data_ocorrencia))));
		$local_ocorrencia = isset($_GET['local_ocorrencia']) ? $_GET['local_ocorrencia'] : '';
		$carro = isset($_GET['carro']) ? $_GET['carro'] : '';
		$descricao = isset($_GET['descricao']) ? $_GET['descricao'] : '';
		$sql = "INSERT INTO " .$tabela. " values ('null', '".$data_ocorrencia."', '".$local_ocorrencia."', '".$descricao."', '".$carro."');";
		$result = mysqli_query($conexao, $sql);
		// echo $sql;
		header('location:'.$pagina); 
	}

	if ($acao == 'alterar_pessoa') {
		$cpf = isset($_GET['cpf']) ? $_GET['cpf'] : '';
		$rg = isset($_GET['rg']) ? $_GET['rg'] : '';
		$endereco = isset($_GET['endereco']) ? $_GET['endereco'] : '';
		$telefone = isset($_GET['telefone']) ? $_GET['telefone'] : '';
		$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
		$sql = "update " .$tabela. " set nome = '" .$nome. "', endereco = '".$endereco."', telefone = '".$telefone."' where cpf = '".$cpf."';";
		$result = mysqli_query($conexao, $sql);
		header('location:'.$pagina); 
		// echo $sql;
	}

	if ($acao == 'alterar_carro') {
		$placa = isset($_GET['placa']) ? $_GET['placa'] : '';
		$fabricante = isset($_GET['fabricante']) ? $_GET['fabricante'] : '';
		$modelo = isset($_GET['modelo']) ? $_GET['modelo'] : '';
		$ano = isset($_GET['ano']) ? $_GET['ano'] : '';
		$cpf_pessoa = isset($_GET['cpf_pessoa']) ? $_GET['cpf_pessoa'] : '';
		$sql = "update " .$tabela. " set fabricante = '" .$fabricante. "', modelo = '".$modelo."', ano = '".$ano."', cpf_pessoa = '".$cpf_pessoa."' where placa = '".$placa."';";
		$result = mysqli_query($conexao, $sql);
		header('location:'.$pagina); 
		// echo $sql;
	}

	if ($acao == 'alterar_ocorrencia') {
		$codigo = isset($_GET['codigo']) ? $_GET['codigo'] : '';
		$data_ocorrencia = isset($_GET['data_ocorrencia']) ? $_GET['data_ocorrencia'] : '';
		$data_ocorrencia = (date('Y-m-d', strtotime(str_replace('/', '-', $data_ocorrencia))));
		$local_ocorrencia = isset($_GET['local_ocorrencia']) ? $_GET['local_ocorrencia'] : '';
		$carro = isset($_GET['carro']) ? $_GET['carro'] : '';
		$descricao = isset($_GET['descricao']) ? $_GET['descricao'] : '';
		$sql = "UPDATE " .$tabela. " set data_ocorrencia = '".$data_ocorrencia."', local_ocorrencia = '".$local_ocorrencia."', descricao = '".$descricao."', placa_carro = '".$carro."' where codigo = ".$codigo;
		$result = mysqli_query($conexao, $sql);
		// echo $sql;
		header('location:'.$pagina); 
	}

?>
