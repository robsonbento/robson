<?php
session_start();
require 'config.php';

if(isset($_POST['email']) && empty($_POST['email']) == false) {
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	try {
	$pdo = new PDO($dsn,$dbuser,$dbpass);

	$sql = $pdo->query("SELECT * FROM usuario WHERE email ='$email' AND senha = '$senha'");
	if ($sql->rowCount() > 0) {
		
		$dado = $sql->fetch();

		$_SESSION['id'] = $dado['id'];

		header("Location: index.php");
	}

}

catch(PDOException $e) {
	echo "Falhou a conexão: ".$e->getMessage();
}

}
 ?>

Pagina de Login
<form method="POST">
	Email: <br>
	<input type="text" name="email"><br><br>
	Senha: <br>
	<input type="password" name="senha"><br><br>

	<input type="submit" value="Entrar">

</form>	