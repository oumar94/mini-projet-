<!DOCTYPE html>
<html>
<head>
	<title>Disponibilite</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stysale2.css">
</head>
<body>
<h2>Rechercher des disponiblite</h2>
<br><br>

<form action="dispo_post.php" method="post" class="formee">
	<label for="date_debut"> Du </label>
	<input type="date" name="date_debut" value="" placeholder="15-07-2017" class="dateeee">
	<label for="date_fin">Au</label>
	<input type="date" name="date_fin" value="" placeholder="15-07-2017" class="dateeee">
	<input type="submit" name="valider" value="Recherche" id="butt">
</form>
</body>
</html>