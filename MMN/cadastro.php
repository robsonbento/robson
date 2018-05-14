<h2>Area de Cadastro: </h2> <br>
<?php
session_start();
require 'config.php';

if(!empty($_GET['codigo'])){
	$codigo = addslashes($_GET['codigo']);

	$sql = "SELECT * FROM usuario WHERE codigo = '$codigo'";
	$sql = $pdo->query($sql);

	if ($sql->rowCount() == 0) {
		header("Location: login.php");
		exit;
	}

}
else{
	header("Location: login.php");
	exit;
}

if(!empty($_POST['email'])) {
	$nome = addslashes($_POST['nome']);
	$cpf = addslashes($_POST['cpf']);
	$email = addslashes($_POST['email']);
	$celular = addslashes($_POST['celular']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = "SELECT * FROM usuario WHERE email = '$email'";
	$sql = $pdo->query($sql);

	if ($sql->rowCount() <= 0) {
		
		$codigo = md5(rand(0,999));
		$sql = "INSERT INTO usuario (nome, cpf, email, celular, senha, codigo) VALUES ('$nome', '$cpf', '$email', '$celular', '$senha', '$codigo')";
		$sql = $pdo->query($sql);

		unset($_SESSION['logado']);
		header("Location: index.php");
		exit;
	}

}
?>

<form method="POST">
	Nome Completo: <br>
	<input type="text" name="nome"><br><br>
	CPF: <br>
	<input type="text" name="cpf"><br><br>
	email: <br>
	<input type="text" name="email"><br><br>
	Celular: <br>
	<input type="text" name="celular"><br><br>

	Senha: <br>
	<input type="password" name="senha"><br><br>

	<input type="submit" value="Enviar">

</form>