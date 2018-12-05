$reqs1=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle1" ORDER BY TO_DAYS(date_debut)');
$reqs2=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle2" ORDER BY TO_DAYS(date_debut)');
$reqs3=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle3" ORDER BY TO_DAYS(date_debut)');
$reqs4=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle4" ORDER BY TO_DAYS(date_debut)');
$reqs5=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle5" ORDER BY TO_DAYS(date_debut)');
$reqs6=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle6" ORDER BY TO_DAYS(date_debut)');
$reqs7=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle7" ORDER BY TO_DAYS(date_debut)');
$list_salle=array($reqs1,$reqs2,$reqs3,$reqs4,$reqs5,$reqs6,$reqs7);




    if ($date_saisif<$date_min) 
  {   
	echo 'Toutes nos  salles sont disponibles ';?>
   
	    
<?php
   }
 else if ($date_saisid>$date_max) 
    {  
	echo 'Toutes nos  salles sont disponibles ';?>
	
 <?php
    }
else 
{

	$nbr=0;
	$recup_salle=array();
for($nombre=0;$nombre<=6;$nombre++)
{ 
 $affect=$list_salle[$nombre];

 $reqdd1=$affect->fetch();

 $reqdd2=$affect->fetch();
 

//$dd1= new DateTime($reqdd1['date_debut']);

$df1= new DateTime($reqdd1['date_fin']);
$dd2= new DateTime($reqdd2['date_debut']);

//$df2= new DateTime($reqdd2['date_fin']);

while ((($date_saisid<$df1)OR ($date_saisif >$dd2))AND($reqdd2=$affect->fetch()) ) 
  {
	$reqdd1=$reqdd2;
    //$reqdd2=$affect->fetch();
    $df1= new DateTime($reqdd1['date_fin']);
    $dd2= new DateTime($reqdd2['date_debut']);

  }
 
 if (!empty($reqdd1) AND empty($reqdd2)) 

 {
   $nbr=$nbr+1; 


   
   //$recup_salle[]=$affect['salle'];

   array_push($recup_salle, $reqdd1['salle']);

 } 

	}

	
     if  ( $nbr!=0)
     {
     	echo "les salles dispo sont:";
     	for ($a=0;$a<count($recup_salle);$a++)
     	{
     		echo $recup_salle[$a].' ';
     	}
     }
     else
	{
		echo "aucune salle n'est disponible";
	} 
     }
	}





while ($reqdd2=$affect->fetch()) {
  

if((($date_saisid>$df1)AND($date_saisif <$dd2)) ) 
  {
  array_push($recup_salle, $reqdd1['salle']);
  $nbr=$nbr+1;
  }
  else
  {
    $reqdd1=$reqdd2;
    //$reqdd2=$affect->fetch();
    $df1= new DateTime($reqdd1['date_fin']);
    $dd2= new DateTime($reqdd2['date_debut']);