<?php
 
include("connexion.php");

$bd=connect();

if (isset($_GET['id']) && !empty($_GET['id'])){
	$id = htmlspecialchars($_GET['id']);
	$SQL = $bd->prepare('SELECT * FROM user WHERE id = ?');
	$SQL->execute(array($id));
	if ($SQL->rowcount() == 1) {
		$user = $SQL->fetch();
	} else {
		header('Location: list_user.php');
		die();
	}
} else {
	header('Location: list_user.php');	
	die();
}

if (isset($_POST['update'])) {
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$tel = htmlspecialchars($_POST['tel']);

$SQL = $bd->prepare('UPDATE user SET nom = ?, prenom = ?, tel = ? WHERE id = ?');
$SQL->execute(array($nom,$prenom,$tel,$id)); 
header('Location: list_user.php');
}
?>
		<form method="post">
			<table border="1">
			<tr>
				<td>
				<input type="text" name="nom" value="<?=$user['nom'] ?>">
				</td>

			</tr>
			<tr>
				<td>
				<input type="text" name="prenom" value="<?= $user['prenom'] ?>">
				</td>
			</tr>
			<tr>
				<td>
				<input type="text" name="tel" value="<?= $user['tel'] ?>">
				</td>
			</tr>
			<button type="submit" name="update">Appliquer</button>
		</table>
		</form>
		

<?php
/*
	$deleteUserQuery="UPDATE `user` SET `id`=[value-1],`nom`=[value-2],`prenom`=[value-3],`tel`=[value-4] WHERE 1";
	$stmt=$bd -> prepare($deleteUserQuery);
	$stmt -> execute(array());
	header('Location: list_user.php');
*/





?>