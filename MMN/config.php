<?php

    $dsn = "mysql:dbname=rastreamento;host=127.0.0.1";
	$dbuser = "root";
	$dbpass = "";

try {
	global $pdo;
	$pdo = new PDO($dsn,$dbuser,$dbpass);

}
catch(PDOException $e) {
	echo "Falhou a conexão: ".$e->getMessage();
	exit;
}


?>
