<?php
	try {
		$conn = new PDO("mysql:host=localhost;dbname=clinique", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$query=$conn->prepare('SELECT * FROM patient');
		$query->execute();
?>
<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="UTF-8" > 
</head>
<body>
	<?php if(isset($_GET["message"])) echo $_GET["message"]."<br>"; ?>
	<table >
		<thead>
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Date de naissance</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = $query->fetch() ) { ?>
				<tr>
					<th><?php echo $row['IdPatient']; ?></th>
					<td><?php echo $row['NomPatient']; ?></td>
					<td><?php echo date('j/m/Y',strtotime($row['DateDeNaissance'])); ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>
<?php	
	} catch(PDOException $e) {
		echo "PDO error: " . $e->getMessage();
	}
	$conn = null;
?>