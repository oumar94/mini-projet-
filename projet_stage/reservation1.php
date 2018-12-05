<!DOCTYPE html>
<html>
<head>
	<title>reservation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="reserv2.css">
</head>
<body>
<header>
<?php include("menu.php");?>
<div id="rech_dispo">
<h3>Rechercher des Disponibilites</h3>
<form action="reservation.php" method="post">
<label for="date_debut">Du </label>
	<input type="date" name="date_debut" value="" placeholder="15-07-2017" class="dateeee">
	<label for="date_fin">Au</label>
	<input type="date" name="date_fin" value="" placeholder="15-07-2017" class="dateeee">
	<input type="submit" name="valider" value="Ok" id="butt">
		
</form>

<?php
if (!empty($_POST)) 
{
	

try {
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$bdd=new PDO('mysql:host=localhost;dbname=reservation','root','',$pdo_options);
$ab=$_POST['date_debut'];
$bc=$_POST['date_fin'];


//$reqd_min_s1=$bdd->query('SELECT  TO_DAYS(date_debut)  from client where salle="salle1" order by TO_DAYS(date_debut) ');

$reqdd=$bdd->query('SELECT DISTINCT date_debut from client where TO_DAYS(date_debut)=(SELECT min(TO_DAYS(date_debut) ) from client)');

$reqdf=$bdd->query('SELECT  DISTINCT date_fin from client where TO_DAYS(date_fin)=(SELECT max(TO_DAYS(date_fin) ) from client)');


$reqs1=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle1" ORDER BY TO_DAYS(date_debut)');
$reqs2=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle2" ORDER BY TO_DAYS(date_debut)');
$reqs3=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle3" ORDER BY TO_DAYS(date_debut)');
$reqs4=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle4" ORDER BY TO_DAYS(date_debut)');
$reqs5=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle5" ORDER BY TO_DAYS(date_debut)');
$reqs6=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle6" ORDER BY TO_DAYS(date_debut)');
$reqs7=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle7" ORDER BY TO_DAYS(date_debut)');
//$recupdd=$reqd_min_s1->fetch();
//echo $recupdd[0];
$liste_salle=array($reqs1,$reqs2,$reqs3,$reqs4,$reqs5,$reqs6,$reqs7);
$recupd=$reqdd->fetch();
$recupf=$reqdf->fetch();
$date_saisif = new DateTime($bc);

$date_min = new DateTime($recupd['date_debut']);
$date_saisid = new DateTime($ab);
$date_max= new DateTime($recupf['date_fin']);

    if ($date_saisif<$date_min) 
  {   
	echo 'Toutes nos  salles sont disponibles ';?>
   
	    
<?php
   }
 else if ($date_saisid>$date_max) 
    {  
	echo 'Toutes nos salles sont disponibles ';?>
	
 <?php
    }
    
else 

{  echo "les salles dispo sont: ";
	for ($i=0; $i <=6 ; $i++)
 {  
	$parcour_liste=$liste_salle[$i];

	$reqdd1=$parcour_liste->fetch();
	$reqdd2=$parcour_liste->fetch();
	$df1=new DateTime($reqdd1['date_fin']);
	$dd2=new DateTime($reqdd2['date_debut']);
	$counteur=0;
	while (!empty($reqdd2))
	{  

		if (($date_saisid>$df1)AND($date_saisif<$dd2))
		{  
			$counteur=1;
			$reqdd1=$reqdd2;

			$reqdd2=$parcour_liste->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        

			
			}
	else 
		{   $reqdd1=$reqdd2;
			$reqdd2=$reqs1->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        
	
             
			}
	}
   
if ($counteur==1)  
{
   	echo $reqdd1['salle'].' ,';
   }
   

	
    
    
     }
 }
	}



catch (Exception $e)
 {
	die('Erreur '.$e->getMessage());
}
}
?>
 </div>
<div id="seminaire">
   <h1>Salles Seminaires</h1>
	<div class="ssalle">
	   <h3>Salle1,salle2,salle3,salle4</h3>
		<div class="sdesc">
		  <ul>
			<li><strong>Capacite</strong>:15personnes</li>
			<li><strong>Superficie</strong>:40m2</li>
			<li><strong>Materiels</strong>:Ordinateurs,tables</li>
			<li><strong>Prix</strong>:1500dhs</li>
		  </ul>
		</div>
	    <div id="img1">
			<figure>
				<img src="inpt.png">
				<img src="rss.png">
			</figure>
		</div class=msbouton>
		   <button><a href="salle1_sem.php">Salle1</a></button>
		   <button><a href="salle2_sem.php">Salle2</a></button>
		   <button><a href="salle3_sem.php">Salle3</a></button>
		   <button><a href="salle4_sem.php">Salle4</a></button>
	</div>
	
    
</div>

<div id="multimedia">
<h1>Salles Multimédias</h1>
    <div class="ssalle">
	   <h3>Salle5,Salle6,Salle7</h3>
		<div class="sdesc">
		  <ul>
			<li><strong>Capacite</strong>:15personnes</li>
			<li><strong>Superficie</strong>:40m2</li>
			<li><strong>Materiels</strong>:Ordinateurs,tables</li>
			<li><strong>Prix</strong>:1500dhs</li>
		  </ul>
		</div>
	    <div id="img1">
			<figure>
				<img src="inpt.png">
				<img src="rss.png">
			</figure>
		</div>
		   <button><a href="salle5_mult.php">Salle5</a></button>
		   <button><a href="salle6_mult.php">Salle6</a></button>
		   <button><a href="salle7_mult.php">Salle7</a></button>
	</div>
	
</div>
	
</header>
<footer>
	<?php include("pied_de_page.php");?>
</footer>
</body>
</html>