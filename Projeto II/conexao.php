<?php
try{
	$pdo = new PDO("mysql:host=localhost;dbname=projeto2;charset=utf8","root","");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo "Erro ao realizar conexão. <br>". $e->getMessage();
}
?>