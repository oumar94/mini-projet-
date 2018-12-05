<!DOCTYPE html>
<html>
<head>
	<title>reservation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="reserv.css">
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


$reqd_min_s1=$bdd->query('SELECT  date_debut  from client where salle="salle1" order by TO_DAYS(date_debut) ');
$reqd_max_s1=$bdd->query('SELECT  date_fin from client where salle="salle1" order by TO_DAYS(date_fin) DESC ');
$reqs1dd=$reqd_min_s1->fetch();
$reqs1df=$reqd_max_s1->fetch();
$reqd_min_s2=$bdd->query('SELECT  date_debut  from client where salle="salle2" order by TO_DAYS(date_debut) ');
$reqd_max_s2=$bdd->query('SELECT  date_fin from client where salle="salle2" order by TO_DAYS(date_fin) DESC ');
$reqs2dd=$reqd_min_s2->fetch();
$reqs2df=$reqd_max_s2->fetch();
$reqd_min_s3=$bdd->query('SELECT  date_debut  from client where salle="salle3" order by TO_DAYS(date_debut) ');
$reqd_max_s3=$bdd->query('SELECT  date_fin from client where salle="salle3" order by TO_DAYS(date_fin) DESC ');
$reqs3dd=$reqd_min_s3->fetch();
$reqs3df=$reqd_max_s3->fetch();
$reqd_min_s4=$bdd->query('SELECT  date_debut  from client where salle="salle4" order by TO_DAYS(date_debut) ');
$reqd_max_s4=$bdd->query('SELECT  date_fin from client where salle="salle4" order by TO_DAYS(date_fin) DESC ');
$reqs4dd=$reqd_min_s4->fetch();
$reqs4df=$reqd_max_s4->fetch();
$reqd_min_s5=$bdd->query('SELECT  date_debut  from client where salle="salle5" order by TO_DAYS(date_debut) ');
$reqd_max_s5=$bdd->query('SELECT  date_fin from client where salle="salle5" order by TO_DAYS(date_fin) DESC ');
$reqs5dd=$reqd_min_s5->fetch();
$reqs5df=$reqd_max_s5->fetch();
$reqd_min_s6=$bdd->query('SELECT  date_debut  from client where salle="salle6" order by TO_DAYS(date_debut) ');
$reqd_max_s6=$bdd->query('SELECT  date_fin from client where salle="salle6" order by TO_DAYS(date_fin) DESC ');
$reqs6dd=$reqd_min_s6->fetch();
$reqs6df=$reqd_max_s6->fetch();
$reqd_min_s7=$bdd->query('SELECT  date_debut  from client where salle="salle7" order by TO_DAYS(date_debut) ');
$reqd_max_s7=$bdd->query('SELECT  date_fin from client where salle="salle7" order by TO_DAYS(date_fin) DESC ');
$reqs7dd=$reqd_min_s7->fetch();
$reqs7df=$reqd_max_s7->fetch();

$date_min_salle=array($reqs1dd['date_debut'],$reqs2dd['date_debut'],$reqs3dd['date_debut'],$reqs4dd['date_debut'],        $reqs5dd['date_debut'],$reqs6dd['date_debut'],$reqs7dd['date_debut']);
$date_max_salle=array($reqs1df['date_fin'],$reqs2df['date_fin'],$reqs3df['date_fin'],$reqs4df['date_fin'],$reqs5df['date_fin'],  $reqs6df['date_fin'],$reqs7df['date_fin']);




//$reqdd=$bdd->query('SELECT DISTINCT date_debut from client where TO_DAYS(date_debut)=(SELECT min(TO_DAYS(date_debut) ) from client)');

//$reqdf=$bdd->query('SELECT  DISTINCT date_fin from client where TO_DAYS(date_fin)=(SELECT max(TO_DAYS(date_fin) ) from client)');


$reqs1=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle1" ORDER BY TO_DAYS(date_debut)');
$reqs2=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle2" ORDER BY TO_DAYS(date_debut)');
$reqs3=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle3" ORDER BY TO_DAYS(date_debut)');
$reqs4=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle4" ORDER BY TO_DAYS(date_debut)');
$reqs5=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle5" ORDER BY TO_DAYS(date_debut)');
$reqs6=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle6" ORDER BY TO_DAYS(date_debut)');
$reqs7=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle7" ORDER BY TO_DAYS(date_debut)');


$liste_salle=array($reqs1,$reqs2,$reqs3,$reqs4,$reqs5,$reqs6,$reqs7);
$nom_salle=array('salle1','salle2','salle3','salle4','salle5','salle6','salle7');
//$recupd=$reqdd->fetch();
//$recupf=$reqdf->fetch();
$date_saisif = new DateTime($bc);
$date_saisid = new DateTime($ab);
//$dmin=new DateTime($recupd['date_debut']);
//$dmax=new DateTime($recupf['date_fin']);
if ($date_saisif<$date_saisid) {
	echo "erreur,verifiez bien vos dates saisies";
}

/*elseif ($date_saisif<$dmin) 
{
   echo "toutes nos salles sont dispo";
	
}
elseif ($date_saisid>$dmax)
 {
	echo "toutes nos salles sont dispo";
}*/
else{
    $liste=array();
    for ($j=0; $j <=6 ; $j++)
    {  $date_min = new DateTime($date_min_salle[$j]);
        $date_max= new DateTime($date_max_salle[$j]);

    	if (($date_saisif<$date_min) ||($date_saisid>$date_max) )

    	{
    		
    		array_push($liste,$nom_salle[$j]);
    	}
    }

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
   	
   	array_push($liste,$reqdd1['salle']);
   }
   

	
    
    }
     
     

if(empty($liste))
{
	echo "aucune salle n'est disponible";
}
 elseif (count($liste)==7) 
 {
 	echo "toutes nos salles sont disponibles";
 }
else
{  echo "les salles disponibles sont: ";
	for ($k=0; $k <count($liste) ; $k++) 
	{ 
		echo $liste[$k].' , ';
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
	  
		<div class="sdesc">

		  <ul>
		    <li><font color="blue" size="5px"><strong>Salle1,Salle2,Salle3,Salle4</strong></font></li><br><br>
			<li><strong>Capacite</strong>:24personnes</li><br><br>
			<li><strong>Superficie</strong>:40m2</li><br><br>
			<li><strong>Materiels</strong>:12 Ordinateurs bureautiques,des climatiseurs,<br><span id="parag"> un projecteur,un tableau ,connexion WIFI.</span>
			</li><br><br>
			<li><strong>Prix</strong>:1500dhs</li><br>
		  </ul>
		  <button><a href="salle1_sem.php">Salle1</a></button>
		   <button><a href="salle2_sem.php">Salle2</a></button>
		   <button><a href="salle3_sem.php">Salle3</a></button>
		   <button><a href="salle4_sem.php">Salle4</a></button>
	    </div>
	    
        <div id="img_slid" >
		    <figure>
			
			
			
			<img src="ss1.jpg">
			<img src="ss2.jpg">
			<img src="ss3.jpg">
			<img src="ss4.jpg">
			<img src="ss5.jpg">
			<img src="ss6.jpg">
			<img src="ss7.jpg">
			
          </figure>
        </div>

		
	
	
</div>    
</div>

<div id="mult">
   <h1>Salles Multimedias</h1>
	<div class="ssalle">
	  
		<div class="sdesc">

		  <ul>
		    <li><font color="blue" size="5px"><strong>Salle5,Salle6,Salle7</strong></font></li><br><br>
			<li><strong>Capacite</strong>:24personnes</li><br><br>
			<li><strong>Superficie</strong>:40m2</li><br><br>
			<li><strong>Materiels</strong>:12 Ordinateurs bureautiques,des climatiseurs,<br><span id="parag"> un projecteur,un tableau ,connexion WIFI.</span>
			</li><br><br>
			<li><strong>Prix</strong>:1500dhs</li><br>
		  </ul>
		  <button><a href="salle5_mult.php">Salle5</a></button>
		   <button><a href="salle6_mult.php">Salle6</a></button>
		   <button><a href="salle7_mult.php">Salle7</a></button>
		   <!--<button><a href="salle4_sem.php">Salle4</a></button>-->
	    </div>
	    
        <div id="img_slid" >
		    <figure>
			
			
			
			<img src="sm2.jpg">
			<img src="sm3.jpg">
			<img src="sm4.jpg">
			<img src="sm5.jpg">
			<img src="sm6.jpg">
			<img src="sm7.jpg">
			<img src="sm8.jpg">
			
          </figure>
        </div>

		
	
	
</div>    
</div>

	
</header>
<footer>
	<?php include("pied_de_page.php");?>
</footer>
</body>
</html>