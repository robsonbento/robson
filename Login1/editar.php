<?php
require 'config.php';

$id = 0;

if(isset($_GET['id']) && empty($_GET['id']) == false) {
	$id = addslashes($_GET['id']);
}
if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);

	$sql = "UPDATE usuario SET nome = '$nome', email = '$email' WHERE id = '$id'";
	$pdo->query($sql);

	header("Location: index.php");
}

	$sql = "SELECT * FROM usuario WHERE id = '$id'";
	$sql = $pdo->query($sql);
	
	if($sql->rowCount() > 0) {
		$dado = $sql->fetch();
	}
	else {
	header("Location: index.php");
    }

?>

<form method="POST">
	Nome: <br>
	<input type="text" name="nome" value="<?php echo $dado['nome']; ?>"><br><br>
	email: <br>
	<input type="text" name="email" value="<?php echo $dado['email']; ?>"><br><br>
	
	<input type="submit" name="Atualizar">

</form>
