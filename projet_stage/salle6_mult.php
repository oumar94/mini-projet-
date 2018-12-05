<!DOCTYPE html>
<html>
<head>
	<title>Salle6</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stysal5.css">
</head>
<body>
<header>
<?php include("menu.php");?>
<h2>Espace de reservation </h2>
<div>
	<h3>Listes des reservations</h3>

	<a href="#Nouvelle reservation">Faire une reservation</a>
<br><br>
<?php 
try {
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
	$bdd=new PDO('mysql:host=localhost;dbname=reservation','root','',$pdo_options);
	
	
	$reponse=$bdd->query('SELECT id,DATE_FORMAT(date_debut, "%d/%m/%Y ") AS
     date_debut,DATE_FORMAT(date_fin, "%d/%m/%Y ") AS
     date_fin from client  where salle="salle6" ORDER by TO_DAYS(date_debut) DESC LIMIT 0,15');?>
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
catch (Exception $e)
 { 
	die('Erreur '.$e->getMessage());
}


?>




	<h3 id="Nouvelle reservation">Nouvelle reservation</h3>
  <br>
  <form action="salle1_sem.php#Nouvelle reservation" method="post" class="formee">
  <label for="pseudo" class="nom1">Nom   </label>
  <input type="text" name="nom" placeholder="votre nom" class="text" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>">
    <?php
    if (isset($_POST['valider']) && empty($_POST['nom']))
     {
       echo '<font color="red" >entrez votre nom svp</font>';
    }

    ?>
  <br><br>
  <label for="prenom" class="prenom1" >Prenom </label>
  <input type="text" name="prenom" class="text" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">

<?php
    if (isset($_POST['valider']) && empty($_POST['prenom']))
     {
       echo '<font color="red" >entrez votre prenom svp</font>';
    }

    ?>
  <br><br>
  <label for="Adresse" class="adresse1">Adresse</label>
  <input type="text" name="adresse" placeholder="votre adresse" class="text" value="<?php if (isset($_POST['adresse'])){echo $_POST['adresse'];} ?>"><br><br>
  
  <label for="date_debut" class="date1">Reserver du </label>
  <input type="date" name="date_debutt"  placeholder="15-07-2017" class="dateeee" value="<?php if (isset($_POST['date_debutt'])){echo $_POST['date_debutt'];} ?>">
  <label for="date_fin">Au</label>
  <input type="date" name="date_finn" placeholder="15-07-2017" class="dateeee" value="<?php if (isset($_POST['date_finn'])){echo $_POST['date_finn'];} ?>">
  <?php
       
    if (isset($_POST['valider']))
     {
      
     
    if ( (empty($_POST['date_debutt'])||(empty($_POST['date_finn']))))
     {
       echo '<font color="red" >veuillez entrez la date</font>';
     }
    
    
    else
    {  $date_deb=new DateTime($_POST['date_debutt']);
      $date_f=new DateTime($_POST['date_finn']);
      if ($date_deb>$date_f)
      {
        echo '<font color="red" >vos dates sont inversées</font>';
         }
         else
      {include("datess1.php");}
    }
  
  
}?>
<br><br>
<label for="email" class="email1">Email </label>
  <input type="text" name="email"  placeholder="Ex:alphasow398@gmail.com" class="text" value="<?php if (isset($_POST['email'])){echo $_POST['email'];} ?>">
<?php
    if (isset($_POST['valider']) && empty($_POST['email']))
     {
       echo '<font color="red" >entrez votre email svp</font>';
    }

    ?>
  <br><br>

  <label for="tel" class="tel1">Tel  </label>
  <input type="text" name="tel"  class="text" value="<?php if (isset($_POST['tel'])){echo $_POST['tel'];} ?>">
<?php
    if (isset($_POST['valider']) && empty($_POST['tel']))
     {
       echo '<font color="red" >entrez votre N°Telephone svp</font>';
    }
    ?>
  <br><br>
  <label for="salle" class="salle1">Salle</label>
  
<select name="salle" id="salle" class="text"> 
<optgroup label="Salles seminaires">
<option value="salle6">salle6</option>


<!--</optgroup>
<optgroup label="Salles Multimedias">
<option value="salle1_multimedia">Salle4</option>
<option value="salle2_multimedias">Salle5</option>
<option value="salle3_multimedias">salle6</option>
<option value="salle4_multimedias">salle7</option> 

</optgroup> -->

</select><br><br>
<label> Commentaire</label><br>

<textarea type="textarea" name="commentaire" rows="5" cols="60" value="<?php if (isset($_POST['commentaire'])){echo $_POST['commentaire'];} ?>"></textarea> <br><br><br>
<input type="submit" name="valider" value="Valider" id="butt">
    
</form>
<?php 
if (isset($_POST['valider'])) 
 {
  


if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['email']) &&!empty($_POST['tel'])&&!!empty($_POST['date_debut'])
  &&!empty($_POST['date_fin']))
  {
$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$bdd=new PDO('mysql:host=localhost;dbname=reservation','root','',$pdo_options);
$req=$bdd->prepare('INSERT INTO client(nom,prenom,adresse,date_debut,date_fin,email,tel,salle,commentaire)values(?,?,?,?,?,?,?,?,?)');
$req->execute(array($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['date_debut'],$_POST['date_fin'],$_POST['email'],$_POST['tel'],$_POST['salle'],$_POST['commentaire']));
  }

else
{
  echo '<font color="red" ><h4><strong>veuillez remplir tous les champs</strong></h4></font>';
}
}
?>
</div>
</header>
<footer>
	<?php include("pied_de_page.php");?>
</footer>
</body>
</html>
		