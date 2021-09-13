<?php
try {
	$conn = new PDO("mysql:host=localhost;dbname=clinique", "root", "");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query=$conn->prepare('
		INSERT INTO patient(NomPatient,DateDeNaissance) 
		VALUES (:NomPatient,:DateDeNaissance)');
	$query->execute($_POST);
	
	if($query->rowCount()==1) {
		header('location:tablepatientbs.php?message='.urlencode("Le patient $_POST[NomPatient] a bien été ajouté."));
	}
} catch(PDOException $e) {
	echo "PDO error: " . $e->getMessage();
}
$conn = null;
?>
