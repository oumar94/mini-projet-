<?php
try {
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$bdd=new PDO('mysql:host=localhost;dbname=reservation','root','',$pdo_options);
} 
catch (Exception $e) {
	
}

$req=$bdd->prepare('SELECT salle from client where  SELECT DATEDIFF(date_debut,?) > 0 and SELECT DATEDIFF(date_fin,?) < 0 ');
$req->execute(array($_POST['date_fin'],$_POST['date_debut']));
$donnee=$req->fetch();
if (empty($donnee)) 
{
	echo "Aucune salle nest dispo en cette periode";
}
else
{
while ($donnee=$req->fetch()) 
{
	echo $donnee['salle'].' <br>';
	
	
}

$req->CloseCursor();
}

?>
