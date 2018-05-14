<?php
function listar($id) {

	$lista = array();
	global $pdo;

	$sql = $pdo->prepare("SELECT * FROM usuario WHERE id_pai = :id");
	$sql->bindValue(":id", $id);
	$sql->execute();

	if ($sql->rowCount() > 0) {
		$lista = $sql->fetchAll();
	}

	return $lista;
}
?>