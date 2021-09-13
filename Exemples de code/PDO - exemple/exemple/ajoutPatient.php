<?php
try {
	$conn = new PDO("mysql:host=localhost;dbname=clinique", "root", "");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//$params = array(':NomPatient' => $_POST['NomPatient'],':DateDeNaissance' => $_POST['DateDeNaissance']);
	$query=$conn->prepare('
		INSERT INTO patient(NomPatient,DateDeNaissance) 
		VALUES (:NomPatient,:DateDeNaissance)');
	$query->execute($_POST);//$query->execute($params);
	
	if($query->rowCount()==1) {
		header('location:tablepatient.php?message='.urlencode("Le patient $_POST[NomPatient] a bien été ajouté"));
	}
} catch(PDOException $e) {
	echo "PDO error: " . $e->getMessage();
}
$conn = null;
?>
