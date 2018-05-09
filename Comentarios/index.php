
<?php
require 'config.php';

if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
	$nome = $_POST['nome'];
	$mensagem = $_POST['mensagem'];

	$sql = $pdo->prepare("INSERT INTO comentarios SET nome =:nome, msg = :msg, data_msg = NOW() ");
	$sql->bindValue(":nome", $nome);
	$sql->bindValue(":msg", $mensagem);
	$sql->execute();
}

 ?>	
<fieldset>
	<form method="POST">
		Nome:<br>
		<input type="text" name="nome"><br><br>

		Mensagem:<br>
		<textarea name="mensagem"></textarea><br><br>

		<input type="submit" value="Enviar Mensagem">
	</form>
</fieldset>
<br>

<?php  
$sql = "SELECT * FROM comentarios ORDER BY data_msg DESC";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0){
	foreach ($sql->fetchAll() as $mensagem):
		?>

		<strong><?php echo $mensagem['nome']; ?></strong><br>
		<?php echo $mensagem['msg']; ?>
		<hr/>
		
		<?php
	endforeach;	  	
} else {
	echo "Não há mensagens!";
}
?>