<?php
 
include("connexion.php");




function delete_user($id)
{

$bd=connect();


if(isset($id))
{
	$deleteUserQuery="DELETE FROM user WHERE id=$id";
	$stmt=$bd -> prepare($deleteUserQuery);
	$stmt -> execute(array());
	header('Location: list_user.php');
}
else
{
	echo 'echec suppression utilisateur';
}

}




if(isset($_GET['id']))
{

	$id= $_GET['id'];
	delete_user($id);
	header('location:list_user.php');
}
else
{
header('location:list_user.php');
}

?>