<?php
try 
{
if (isset($_POST)) {
	

if (empty($_POST['nom'])) 
	{
		header('Location:salle1_sem.php');
	}


else
{
$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$bdd=new PDO('mysql:host=localhost;dbname=reservation','root','',$pdo_options);
$req=$bdd->prepare('INSERT INTO client(nom,prenom,adresse,date_debut,date_fin,email,tel,salle,commentaire)values(?,?,?,?,?,?,?,?,?)');
$req->execute(array($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['date_debut'],$_POST['date_fin'],$_POST['email'],$_POST['tel'],$_POST['salle'],$_POST['commentaire']));
switch ($_POST['salle']) // on indique sur quelle variable on travaille
{
case 'salle1': // dans le cas où $note vaut 0
header('Location: salle1_sem.php');
break;
case 'salle2': // dans le cas où $note vaut 5
header('Location: salle2_sem.php');
break;
case 'salle3': // dans le cas où $note vaut 7
header('Location: salle3_sem.php');
break;
case 'salle4': // etc etc
header('Location: salle4_sem.php');
break;
case 'salle5':
header('Location: salle5_mult.php');
break;
case 'salle6':
header('Location: salle6_mult.php');
break;
case 'salle7':
header('Location: salle7_mult.php');
break;
default:
echo "Désolé,veuillez choisir une salle";
}


}

} 
}
catch (Exception $e)
 {
	die('Erreur '.$e->getMessage());
}

?>