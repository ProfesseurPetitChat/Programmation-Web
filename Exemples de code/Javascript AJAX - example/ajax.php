<?php 
	$pdo = new PDO("mysql:host=localhost;dbname=testajax", "root", "");
	$query=$pdo->prepare('SELECT * FROM patient WHERE IdPatient=:IdPatient');
	$query->execute(array("IdPatient"=>$_GET['id']));
	if($patient=$query->fetchObject()) {
		echo json_encode($patient);
	}
?>