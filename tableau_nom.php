<?php



include("connexion.php");
/*if (isset($_POST['Envoyer']))
{
	 $tab_data[] = ($_POST('nom'),$_POST('prenom'),$_POST('tel')) ;
	foreach( $tab_data as $var)
	{
		echo $var.'<br/>';
	}
	 
}*/

$link=connect();

//récupérer DATA
/*
$sql = "SELECT * FROM user";

$stmt = $link->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll();
print_r($result);
*/





session_start();

//$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if(!isset($_SESSION['data']))
{
$_SESSION['data']= [];
}

if (test($_POST)) 
{
	$user = [ $_POST['nom'],$_POST['prenom'],$_POST['tel']];
	//var_dump($user);
	//Insérer DATA
	$data = [
		'nom'=> $_POST['nom'],
		'prenom'=> $_POST['prenom'],
		'tel'=> $_POST['tel'],
	];

$sql = "INSERT INTO user (id,nom,prenom,tel)
VALUES (null,:nom,:prenom,:tel)";

$stmt = $link->prepare($sql);
$stmt->execute($data);


header('Location: list_user.php');

}

?>
<html>
<head>
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	<li class="breadcrumb-item active" aria-current="page">S'inscrire</li>
    <li class="breadcrumb-item"><a href="list_user">liste de inscrits</a></li>
    
  </ol>
</nav>

<link rel="stylesheet" href="tableau_nom.css" />

</head>
<body>
	

		<form action="" method="POST">
		
			<p>
			<label  for="nom">NOM:</label><br />

			<input id="nom" type="text" required="yes" name="nom"><br />


			<label for="prenom">PRENOM:</label><br />
			<input id="prenom" type="text" required="yes" name="prenom"><br />


			<label for="tel">TEL:</label><br />
			<input id="tel" type="text" required="yes" name="tel"><br />

			<input type="submit" class="btn btn-success" name="Envoyer" /><br />

			</p>
		</form>		
</body>
</html>

<?php

function test($post)
{
	if (isset($post['Envoyer']))
	{
		//if (!empty($post['nom']) && !empty($post['prenom']) && !empty($post['email'])) 
		//{
			return true;
		//}
	
		//return false;

	}
	return false;


}

?>
