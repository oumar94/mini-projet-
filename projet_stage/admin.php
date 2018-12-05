<?php
session_start();
if (empty($_SESSION['pseudo'])) 
{
  header('Location:connexion.php');
  exit();
}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>admin</title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="styl_admin2.css">
 	<link rel="stylesheet" type="text/css" href="stysal2.css">
 </head>
 <body>
 <a href="#Messages">Messages</a>
 <button id="deconect"><a href="deconnexion.php">Deconnexion</a></button>
 <br><br>
 <?php
try
 { 
	
	
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
	$bdd=new PDO('mysql:host=localhost;dbname=reservation','root','',$pdo_options);
	
	
	$reponse=$bdd->query('SELECT nom,prenom,titre,message,DATE_FORMAT(date_envoie, "%d/%m/%Y à %Hh%i ") AS
     date_envoie from contact LIMIT 0,9');
      
     ?>
	<table>
       	<tr>
       		<td>Nom et Prenom</td>
       		<td>Titre_Message</td>
       		<td>Date d'envoie</td>
          <td>Message</td>
       	</tr>
       </table>
	
    <?php  
    while($donnees=$reponse->fetch()) 
	{ ?>
       <table>
       	<tr>
       		<td><?php echo $donnees['nom'].' '.$donnees['prenom'];?></td>
       		<td><?php echo $donnees['titre'];?></td>
       		<td><?php echo $donnees['date_envoie'];?></td>
          <td><?php echo $donnees['message'];?></td>
       	</tr>
       </table>
       <?php
       
       
	
		}
	
	echo '<br><br>';
	
   $reponse->CloseCursor();
   }
   
catch (Exception $e)
 { 
	die('Erreur '.$e->getMessage());
}


?>



 
 <a href="#Liste des Reservation">Liste des Reservations</a>
 
 <?php 
try
 { 
	$list_salle=array('salle1','salle2','salle3','salle4','salle5','salle6','salle7');
	for ($i=0; $i <=6 ; $i++) 
	{ 
		
	
	echo '<h1>'.$list_salle[$i].'</h1>';
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
	$bdd=new PDO('mysql:host=localhost;dbname=reservation','root','',$pdo_options);
	
	
	$reponse=$bdd->prepare('SELECT id,DATE_FORMAT(date_debut, "%d/%m/%Y ") AS
     date_debut,DATE_FORMAT(date_fin, "%d/%m/%Y ") AS date_fin from client  where salle=? ORDER by TO_DAYS(date_debut) DESC LIMIT 0,9');
      $reponse->execute(array($list_salle[$i]));
     ?>
	<table>
       	<tr>
       		<td>Location N°x</td>
       		<td>Date_Debut</td>
       		<td>Date_Fin</td>
       	</tr>
       </table>
	
    <?php  
    while($donnees=$reponse->fetch()) 
	{ ?>
       <table>
       	<tr>
       		<td><?php echo 'Location N°'.$donnees['id'];?></td>
       		<td><?php echo $donnees['date_debut'];?></td>
       		<td><?php echo $donnees['date_fin'];?></td>
       	</tr>
       </table>
       <?php
       
       
	
		}
	
	echo '<br><br><br>';
	
   $reponse->CloseCursor();
   }
   } 
catch (Exception $e)
 { 
	die('Erreur '.$e->getMessage());
}


?>



 </body>
 </html>