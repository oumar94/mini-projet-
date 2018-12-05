<?php 
try 

{
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$bdd=new PDO('mysql:host=localhost;dbname=reservation','root','',$pdo_options);
$ab=$_POST['date_debutt'];
$bc=$_POST['date_finn'];
$date_saisid=new DateTime($ab);
$date_saisif=new DateTime($bc);


//$date_min_salle=array($reqs1dd['date_debut'],$reqs2dd['date_debut'],$reqs3dd['date_debut'],$reqs4dd['date_debut'],        $reqs5dd['date_debut'],$reqs6dd['date_debut'],$reqs7dd['date_debut']);
switch ($_POST['salle']) {
	case 'salle1':
		$reqd_min_s1=$bdd->query('SELECT  date_debut  from client where salle="salle1" order by TO_DAYS(date_debut) ');
$reqd_max_s1=$bdd->query('SELECT  date_fin from client where salle="salle1" order by TO_DAYS(date_fin) DESC ');
$reqs1dd=$reqd_min_s1->fetch();
$reqs1df=$reqd_max_s1->fetch();
$reqs1=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle1" ORDER BY TO_DAYS(date_debut)');

  $date_min = new DateTime($reqs1dd['date_debut']);
        $date_max= new DateTime($reqs1df['date_fin']);

    	if (($date_saisid>$date_min) &&($date_saisif<$date_max) )

    	{
    		
    		$reqdd1=$reqs1->fetch();
	$reqdd2=$reqs1->fetch();
	$df1=new DateTime($reqdd1['date_fin']);
	$dd2=new DateTime($reqdd2['date_debut']);
	$counteur=0;
	while (!empty($reqdd2))
	{  

		if (($date_saisid>$df1)AND($date_saisif<$dd2))
		{  
			$counteur=1;
			$reqdd1=$reqdd2;

			$reqdd2=$reqs1->fetch();
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
   
if ($counteur==0)  
{
   	echo '<font color="red" >pas de disponibilite</font>';
   	
   }

}
	
    break;


	case 'salle2':
		$reqd_min_s2=$bdd->query('SELECT  date_debut  from client where salle="salle2" order by TO_DAYS(date_debut) ');
$reqd_max_s2=$bdd->query('SELECT  date_fin from client where salle="salle2" order by TO_DAYS(date_fin) DESC ');
$reqs2dd=$reqd_min_s2->fetch();
$reqs2df=$reqd_max_s2->fetch();
$reqs2=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle2" ORDER BY TO_DAYS(date_debut)');

$date_min = new DateTime($reqs2dd['date_debut']);
        $date_max= new DateTime($reqs2df['date_fin']);

    	if (($date_saisid>$date_min) &&($date_saisif<$date_max) )

    	{
    		
    		$reqdd1=$reqs2->fetch();
	$reqdd2=$reqs2->fetch();
	$df1=new DateTime($reqdd1['date_fin']);
	$dd2=new DateTime($reqdd2['date_debut']);
	$counteur=0;
	while (!empty($reqdd2))
	{  

		if (($date_saisid>$df1)AND($date_saisif<$dd2))
		{  
			$counteur=1;
			$reqdd1=$reqdd2;

			$reqdd2=$reqs2->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        

			
			}
	else 
		{   $reqdd1=$reqdd2;
			$reqdd2=$reqs2->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        
	
             
			}
	}
   
if ($counteur==0)  
{
   	echo '<font color="red" >pas de disponibilite</font>';
   	
   }

}




		break;
	case 'salle3':
		$reqd_min_s3=$bdd->query('SELECT  date_debut  from client where salle="salle3" order by TO_DAYS(date_debut) ');
$reqd_max_s3=$bdd->query('SELECT  date_fin from client where salle="salle3" order by TO_DAYS(date_fin) DESC ');
$reqs3dd=$reqd_min_s3->fetch();
$reqs3df=$reqd_max_s3->fetch();
$reqs3=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle3" ORDER BY TO_DAYS(date_debut)');
$date_min = new DateTime($reqs3dd['date_debut']);
        $date_max= new DateTime($reqs3df['date_fin']);

    	if (($date_saisid>$date_min) &&($date_saisif<$date_max) )

    	{
    		
    		$reqdd1=$reqs3->fetch();
	$reqdd2=$reqs3->fetch();
	$df1=new DateTime($reqdd1['date_fin']);
	$dd2=new DateTime($reqdd2['date_debut']);
	$counteur=0;
	while (!empty($reqdd2))
	{  

		if (($date_saisid>$df1)AND($date_saisif<$dd2))
		{  
			$counteur=1;
			$reqdd1=$reqdd2;

			$reqdd2=$reqs3->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        

			
			}
	else 
		{   $reqdd1=$reqdd2;
			$reqdd2=$reqs3->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        
	
             
			}
	}
   
if ($counteur==0)  
{
   	echo '<font color="red" >pas de disponibilite</font>';
   	
   }

}

		break;
	case 'salle4':
		$reqd_min_s4=$bdd->query('SELECT  date_debut  from client where salle="salle4" order by TO_DAYS(date_debut) ');
$reqd_max_s4=$bdd->query('SELECT  date_fin from client where salle="salle4" order by TO_DAYS(date_fin) DESC ');
$reqs4dd=$reqd_min_s4->fetch();
$reqs4df=$reqd_max_s4->fetch();
$reqs4=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle4" ORDER BY TO_DAYS(date_debut)');
$date_min = new DateTime($reqs4dd['date_debut']);
        $date_max= new DateTime($reqs4df['date_fin']);

    	if (($date_saisid>$date_min) &&($date_saisif<$date_max) )

    	{
    		
    		$reqdd1=$reqs4->fetch();
	$reqdd2=$reqs4->fetch();
	$df1=new DateTime($reqdd1['date_fin']);
	$dd2=new DateTime($reqdd2['date_debut']);
	$counteur=0;
	while (!empty($reqdd2))
	{  

		if (($date_saisid>$df1)AND($date_saisif<$dd2))
		{  
			$counteur=1;
			$reqdd1=$reqdd2;

			$reqdd2=$reqs4->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        

			
			}
	else 
		{   $reqdd1=$reqdd2;
			$reqdd2=$reqs4->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        
	
             
			}
	}
   
if ($counteur==0)  
{
   	echo '<font color="red" >pas de disponibilite</font>';
   	
   }

}

		break;
	case 'salle5':
		$reqd_min_s5=$bdd->query('SELECT  date_debut  from client where salle="salle5" order by TO_DAYS(date_debut) ');
$reqd_max_s5=$bdd->query('SELECT  date_fin from client where salle="salle5" order by TO_DAYS(date_fin) DESC ');
$reqs5dd=$reqd_min_s5->fetch();
$reqs5df=$reqd_max_s5->fetch();
$reqs5=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle5" ORDER BY TO_DAYS(date_debut)');
$date_min = new DateTime($reqs5dd['date_debut']);
        $date_max= new DateTime($reqs5df['date_fin']);

    	if (($date_saisid>$date_min) &&($date_saisif<$date_max) )

    	{
    		
    		$reqdd1=$reqs5->fetch();
	$reqdd2=$reqs5->fetch();
	$df1=new DateTime($reqdd1['date_fin']);
	$dd2=new DateTime($reqdd2['date_debut']);
	$counteur=0;
	while (!empty($reqdd2))
	{  

		if (($date_saisid>$df1)AND($date_saisif<$dd2))
		{  
			$counteur=1;
			$reqdd1=$reqdd2;

			$reqdd2=$reqs5->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        

			
			}
	else 
		{   $reqdd1=$reqdd2;
			$reqdd2=$reqs5->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        
	
             
			}
	}
   
if ($counteur==0)  
{
   	echo '<font color="red" >pas de disponibilite</font>';
   	
   }

}

		break;
	case 'salle6':
		$reqd_min_s6=$bdd->query('SELECT  date_debut  from client where salle="salle6" order by TO_DAYS(date_debut) ');
$reqd_max_s6=$bdd->query('SELECT  date_fin from client where salle="salle6" order by TO_DAYS(date_fin) DESC ');
$reqs6dd=$reqd_min_s6->fetch();
$reqs6df=$reqd_max_s6->fetch();
$reqs6=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle6" ORDER BY TO_DAYS(date_debut)');

$date_min = new DateTime($reqs6dd['date_debut']);
        $date_max= new DateTime($reqs6df['date_fin']);

    	if (($date_saisid>$date_min) &&($date_saisif<$date_max) )

    	{
    		
    		$reqdd1=$reqs6->fetch();
	$reqdd2=$reqs6->fetch();
	$df1=new DateTime($reqdd1['date_fin']);
	$dd2=new DateTime($reqdd2['date_debut']);
	$counteur=0;
	while (!empty($reqdd2))
	{  

		if (($date_saisid>$df1)AND($date_saisif<$dd2))
		{  
			$counteur=1;
			$reqdd1=$reqdd2;

			$reqdd2=$reqs6->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        

			
			}
	else 
		{   $reqdd1=$reqdd2;
			$reqdd2=$reqs6->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        
	
             
			}
	}
   
if ($counteur==0)  
{
   	echo '<font color="red" >pas de disponibilite</font>';
   	
   }

}

		break;

	case 'salle7':
		$reqd_min_s7=$bdd->query('SELECT  date_debut  from client where salle="salle7" order by TO_DAYS(date_debut) ');
$reqd_max_s7=$bdd->query('SELECT  date_fin from client where salle="salle7" order by TO_DAYS(date_fin) DESC ');
$reqs7dd=$reqd_min_s7->fetch();
$reqs7df=$reqd_max_s7->fetch();
$reqs7=$bdd->query('SELECT salle,date_debut,date_fin from client where salle="salle7" ORDER BY TO_DAYS(date_debut)');
$date_min = new DateTime($reqs7dd['date_debut']);
        $date_max= new DateTime($reqs7df['date_fin']);

    	if (($date_saisid>$date_min) &&($date_saisif<$date_max) )

    	{
    		
    		$reqdd1=$reqs7->fetch();
	$reqdd2=$reqs7->fetch();
	$df1=new DateTime($reqdd1['date_fin']);
	$dd2=new DateTime($reqdd2['date_debut']);
	$counteur=0;
	while (!empty($reqdd2))
	{  

		if (($date_saisid>$df1)AND($date_saisif<$dd2))
		{  
			$counteur=1;
			$reqdd1=$reqdd2;

			$reqdd2=$reqs7->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        

			
			}
	else 
		{   $reqdd1=$reqdd2;
			$reqdd2=$reqs7->fetch();
			$df1=new DateTime($reqdd1['date_fin']);
	        $dd2=new DateTime($reqdd2['date_debut']);	
	        
	
             
			}
	}
   
if ($counteur==0)  
{
   	echo '<font color="red" >pas de disponibilite</font>';
   	
   }

}

		break;
	
	default:
		echo "erreur";
		break;
}

}
catch (Exception $e)
 {
	die('Erreur '.$e->getMessage());
}
?>