<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stysal2.css">
</head>
<body>

<br><br>
<form action="contact.php" method="post" class="formee">
	<label for="nom" class="nom1">Nom <font color="red">*</font>  </label>
	<input type="text" name="nom" placeholder="votre nom" class="text"  value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>">
    <?php
    if (isset($_POST['valider']) && empty($_POST['nom']))
     {
    	 echo '<font color="red" >entrez votre nom svp</font>';
    }

    ?>
	<br><br>
	<label for="prenom" class="prenom1">Prenom<font color="red">*</font> </label>
	<input type="text" name="prenom" class="text" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">

<?php
    if (isset($_POST['valider']) && empty($_POST['prenom']))
     {
    	 echo '<font color="red" >entrez votre prenom svp</font>';
    }

    ?>
	
	
	
   
	<br><br>
	<label for="email" class="email1">Email<font color="red">*</font> </label>
	<input type="text" name="email"  placeholder="Ex:alphasow398@gmail.com" class="text"  value="<?php if (isset($_POST['email'])){echo $_POST['email'];} ?>">
<?php
    if (isset($_POST['valider']) && empty($_POST['email']))
     {
    	
        echo '<font color="red" >entrez votre email svp</font>';
    }
    elseif (isset($_POST['valider']) && !empty($_POST['email'])) 

      {
        if (substr ( $_POST['email'] , -10,10)!="@gmail.com") 
        {   
            echo "email non valide";
        }
       }
   else 
     {

    }


    ?>
	<br><br>

    <label for="titre" class="titre1" >Titre du Message<font color="red">*</font> </label>
    <input type="text" name="titre"  placeholder="titre de votre message" class="text"  value="<?php if (isset($_POST['titre'])){echo $_POST['titre'];} ?>">
<?php
    if (isset($_POST['valider']) && empty($_POST['titre']))
     {
         echo '<font color="red" >entrez le titre de votre message</font>';
    }

    ?>
	

<!--</optgroup>
<optgroup label="Salles Multimedias">
<option value="salle1_multimedia">Salle4</option>
<option value="salle2_multimedias">Salle5</option>
<option value="salle3_multimedias">salle6</option>
<option value="salle4_multimedias">salle7</option> 

</optgroup> -->

<br><br>
<label class="message1"> Message<font color="red">*</font></label><br>

<textarea type="textarea" name="message" rows="5" cols="60" value="<?php if (isset($_POST['message'])){echo $_POST['message'];} ?>"></textarea> <br><br><br>
<input type="submit" name="valider" value="Envoyer" id="butt">
		
</form>
<?php 
if (isset($_POST['valider'])) 
 {
	


if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['email'])&&!empty($_POST['titre'])&&!empty($_POST['message']))
  {
$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$bdd=new PDO('mysql:host=localhost;dbname=reservation','root','',$pdo_options);
$bdd->exec('SET NAMES UTF8');
$req=$bdd->prepare('INSERT INTO contact(nom,prenom,email,titre,message,date_envoie)values(?,?,?,?,?,NOW())');
$req->execute(array($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['titre'],$_POST['message']));
  echo '<font color="red">votre message a bien été envoyé</font>';
  }

else
{
	echo '<font color="red" ><h4><strong>veuillez remplir tous les champs</strong></h4></font>';
}
}
?>

</body>
</html>