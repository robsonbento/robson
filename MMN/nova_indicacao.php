<h2>Indicação: </h2> <br>
<?php
session_start();
require 'config.php';

if(!empty($_POST['nome']) && !empty($_POST['email'])) {
	$nome = addslashes($_POST['nome']);
	$cpf = addslashes($_POST['cpf']);
	$email = addslashes($_POST['email']);
	$celular = addslashes($_POST['celular']);
	$senha = md5(addslashes($_POST['senha']));
	$codigo = rand(0,9999999999);
	$id_pai = $_SESSION['logado'];

	$sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
	$sql->bindValue(":email", $email);
	$sql->execute();

	if ($sql->rowCount() == 0) {
		
		$sql = $pdo->prepare("INSERT INTO usuario (nome, cpf, email, celular, senha, codigo, id_pai) VALUES (:nome, :cpf, :email, :celular, :senha, :codigo, :id_pai)");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":celular", $celular);
		$sql->bindValue(":senha", $senha);
		$sql->bindValue(":codigo", $codigo);
		$sql->bindValue(":id_pai", $id_pai);
		$sql->execute();

		header("Location: index.php");
		exit;
	}
	else {
		echo "Usuario já Existente!";
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