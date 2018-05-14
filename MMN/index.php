<?php
session_start();
require 'config.php';
require 'funcoes.php';

if(empty($_SESSION['logado'])) {
	header("Location: login.php");
	exit;
}

$email = '';
$codigo = '';
$id = $_SESSION['logado'];

$sql = $pdo->prepare("SELECT email, codigo FROM usuario WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

if ($sql->rowCount() > 0) {
	$sql = $sql->fetch();
	$email = $sql['email'];
	$codigo = $sql['codigo'];
}
else {
	header("Location: login.php");
	exit;
}

$lista = listar($id);

?>

<h1>Area interna do Sistema</h1>
<p>Usuario: <?php echo $email; ?> - <a href="sair.php">Sair</a></p>
<p>Link: http://robson.pc/MMN/cadastro.php?codigo=<?php echo $codigo; ?></p> <br><br>

<a href="nova_indicacao.php">Cadastrar Novo Usuario</a> <br><br>

<hr/>

<h4>Lista de Indicações</h4>
<ul>
	<?php foreach ($lista as $usuario): ?>
		<li><?php echo $usuario['nome'];  ?></li>
	<?php endforeach  ?>	
</ul>

	