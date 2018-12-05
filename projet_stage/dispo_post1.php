
<html>
<head>
	<title>Rech Dispo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="reserv.css">
<!DOCTYPE html>
</head>
<body>
<?php
try {
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$bdd=new PDO('mysql:host=localhost;dbname=reservation','root','',$pdo_options);
$ab=$_POST['date_debut'];
$bc=$_POST['date_fin'];

$reqdd=$bdd->query('SELECT DISTINCT date_debut from client where TO_DAYS(date_debut)=(SELECT min(TO_DAYS(date_debut) ) from client) GROUP BY  salle ');

$reqdf=$bdd->query('SELECT  DISTINCT date_fin from client where TO_DAYS(date_fin)=(SELECT max(TO_DAYS(date_fin) ) from client)');
$recupd=$reqdd->fetch();
$date_saisif = new DateTime($bc);
$date_min = new DateTime($recupd['date_debut']);
$date_saisid = new DateTime($ab);
$date_max= new DateTime($recupf['date_fin']);
$interval = $date_saisif->diff($date_min);


if ($date_saisif<$date_min ) 
{   
		
	 echo $recupd['salle'].', ';
	 $recupd=$reqdd->fetch();
	 echo $recupd['salle'].', ';
	 $recupd=$reqdd->fetch();
	 echo $recupd['salle'].', ';
	 $recupd=$reqdd->fetch();
	 echo $recupd['salle'].', ';?>
	 
	
		
<?php
}
else if ($date_saisid>$date_max) 
{   
	while (!empty($recupf))
	 {
		echo $recupf['salle'].', ';//$interval->format('%a');
		$recupf=$reqdf->fetch();?>
	    
	}
	
	
<?php
}
else {
	echo "Aucune salle n'est dispo";
}

} 
catch (Exception $e)
 {
	die('Erreur '.$e->getMessage());
}

?>

</body>
</html>







