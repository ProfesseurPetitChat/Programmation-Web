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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<?php if(isset($_GET["message"])) echo "<div class='alert alert-success' role='alert'>$_GET[message]</div>"; ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th >#</th>
				<th >Nom</th>
				<th >Date de naissance</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = $query->fetch() ) { ?>
				<tr>
					<th ><?php echo $row['IdPatient']; ?></th>
					<td><?php echo $row['NomPatient']; ?></td>
					<td><?php echo date('j/m/Y',strtotime($row['DateDeNaissance'])); ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

</body>
</html>
<?php	
	} catch(PDOException $e) {
		echo "PDO error: " . $e->getMessage();
	}
	$conn = null;
?>