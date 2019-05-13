<?php
	
	include 'conexao.php';
	include 'db.php';
	include 'usuario.php';

	$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

	if ( ($acao == 'salvar') )  {
		
		$usuario = new Usuario();
		$conexao = new Conexao();

		$usuario->__set('nome', $_POST['nome']);

		$tarefa_service = new DB($conexao,$usuario);

		$tarefa_service->inserir();

	} else if ( ($acao == 'deletar') ) {
		
		$usuario = new Usuario();
		$conexao = new Conexao();

		$usuario->__set('id', $_POST['id']);

		$tarefa_service = new DB($conexao,$usuario);
		$tarefa_service->deletar();

	} else if ( ($acao == 'consultar') ) {

	
		$usuario = new Usuario();
		$conexao = new Conexao();

		$usuario->__set('id', $_POST['id']);

		$tarefa_service = new DB($conexao,$usuario);
		$result = $tarefa_service->consultar();

		$result = isset($result['nome']) ? $result['nome'] : '';

		
	} else if ( ($acao == 'alterar') ) {
		echo "alterar";

		$usuario = new Usuario();
		$conexao = new Conexao();

		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('id', $_POST['id']);

		$tarefa_service = new DB($conexao, $usuario);

		$tarefa_service->alterar();

	}
?>

<html>
<head>
	<title>Formulário</title>
	<meta charset="utf-8">
</head>
<body>
	<hr>
	<h1>Salvar</h1>
	<form action="index.php?acao=salvar" method="post">
		<input type="text" name="nome" placeholder="digite seu nome">
		<button type="submit">Enviar</button>
	</form>
	<hr>
	
	<br><br>
	
	<hr>
	<h1>Deletar</h1>
	<form action="index.php?acao=deletar" method="post">
		<input type="text" name="id" placeholder="digite seu id">
		<button type="submit">Enviar</button>
	</form>
	<hr>

	<br><br>

	<h1>Consultar</h1>
	<form action="index.php?acao=consultar" method="post">
		<input type="text" name="id" placeholder="digite seu id">
		<button type="submit">Enviar</button>
	</form>
	<hr>

	<br><br>
	
	<h1>Alterar</h1>
	<form action="index.php?acao=consultar" method="post">
		<input type="text" name="id" placeholder="digite seu id">
		<button type="submit">Enviar</button>
	</form>
	<form action="index.php?acao=alterar" method="post">
		<input type="hidden" name="id" value="<?= $_POST['id'] ?>">
		<input type="text" name="nome" placeholder="digite seu nome" value="<?=  $result ?>">
		<button type="submit">Alterar</button>
	</form>
	<hr>
</body>
</html>