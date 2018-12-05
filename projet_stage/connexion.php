<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>connexion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styl_admin.css">
</head>
<body>

<h1>Bienvenue Sur l'Espace d'Administration</h1>   

<?php
try 
{
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
} 
catch (Exception $e)
 {
	die('Erreur '.$e->getMessage());
 }
     if (!empty($_POST['valider']) ) 
     {
     
	
		if ((strtoLower($_POST['pseudo'])=="inpt")&& (strtoLower($_POST['mdp'])=="cfc"))


		{   
			$_SESSION['pseudo']=$_POST['pseudo'];
			header('Location: admin.php');
		}

	     else
	     {
	     	echo '<font color="red">Remplissez bien les champs</font>';
	     }
    

    }
       

    
?>
<div  id="formul">


<form action="connexion.php" method="post">
<br><br>

<label>Votre pseudo</label>
<input type="text" name="pseudo" value="" id="pseudo">
<label>Votre mot de passe</label>
<input type="password" name="mdp" value="" id="mdp"><br><br><br><br>
<input type="submit" name="valider" value="Se connecter" id="connection">
</form>
</div>

</body>
</html>