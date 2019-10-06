<?php


include("connexion.php");
//récupérer DATA

$link=connect();

$sql = "SELECT * FROM user";

$stmt = $link->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll();
//print_r($result);

//echo "bien enregistré!";


?>
<html>
	<head>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<link rel="stylesheet" href="tableau_nom.css" />


	</head>
	<body>
		<h1>Liste des utilisateurs</h1>

	<table border="1" class="table table-striped">

	
		<thead class="thead-dark">
   			<tr>
      			<th scope="col">Nom</th>
      			<th scope="col">Prenom</th>
      			<th scope="col">TEL</th>
    		</tr>
  		</thead>

			<td>
				<?php foreach ($result as $user) { ?>
					 <tr>
      					<td><?php echo $user['nom']; ?></td>
      					<td><?php echo $user['prenom']; ?></td>
      					<td><?php echo $user['tel']; ?></td>
      					<td> 
						<a class="btn btn-danger" href="supprimer_utilisateur.php?id=<?php echo $user['id'];?>" role="button">Supprimer</a>
						</td>
						<td> 
						<a class="btn btn-warning" href="editer_utilisateur.php?id=<?php echo $user['id'];?>" role="button">Editer</a>
						</td>
   					 </tr>

				<?php } ?>
		
	</table>	

		<a href="tableau_nom.php">Ajouter un utilisateur </a>

	</body>
</html>