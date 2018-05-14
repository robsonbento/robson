<?php
session_start();
require 'config.php';

if(!empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);

	$sql = "SELECT id FROM usuario WHERE email = '$email' AND senha = '$senha'";
	$sql = $pdo->query($sql);

	if($sql->rowCount() > 0) {
		$sql = $sql->fetch();

		$_SESSION['logado'] = $sql['id'];
		header("Location: index.php");
		exit;
	}
	else{
		echo"Usuario ou Senha errados!";
	}
}
 ?>

Pagina de Login
<form method="POST">
	Email: <br>
	<input type="email" name="email"><br><br>
	Senha: <br>
	<input type="password" name="senha"><br><br>

	<input type="submit" value="Entrar">
</form>

<a href="cadastro.php">Cadastro</a>	