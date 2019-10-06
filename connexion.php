<?php

function connect()

{
try {
    return $link = new PDO('mysql:host=localhost;dbname=coursphp',
	'root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

}
?>