<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Saisissez vos coordonnees</title>
</head>
<body>


<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post"
enctype="application/x-www-form-urlencoded">
<fieldset>
<legend><b>Vos coordonnees</b></legend>
<table>
<tr><td>login : </td><td><input type="text" name="login" size="40" maxlength="30"/>
</td></tr>
<tr><td>Password : </td><td><input type="text" name="pass" size="40" maxlength="30"
/></td></tr>
<tr><td>role : </td><td><input type="text" name="role" size="40" maxlength="30"
/></td></tr>
<tr>
<td><input type="reset" value="Effacer"></td>
<td><input type="submit" value="Envoyer"></td>
</tr>
</table>
</fieldset>
</form> 
<?php
include("connection.php");
$idcom=connexpdo('magasin','myparam');
if(!empty($_POST['login'])&& !empty($_POST['pass'])&& !empty($_POST['role'])) 
{
$iduser="\N"; 
$login=$idcom->quote($_POST['login']); 
$pass=$idcom->quote($_POST['pass']); 
$role=$idcom->quote($_POST['role']); 


// Requête SQL préparees
$stmt = $idcom->prepare("INSERT INTO user  VALUES (:idUser,:login,:pass,:role)");
$stmt->bindParam(':idUser', $idUser);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':pass', $pass);
$stmt->bindParam(':role', $role);
$stmt->execute();


/*$requete="INSERT INTO message_contact  VALUES ($idContact,$nom,$prenom,$email,$tele,$sujet,$message)"; 
//pas de guillemets
//si on applique la methode quote aux variables*/
/*$nblignes=$idcom->exec($requete); 
if($nblignes!=1) 
{
$mess_erreur=$idcom->errorInfo();
echo "Insertion impossible, code", $idcom->errorCode(),$mess_erreur[2];
echo "<script type=\"text/javascript\">
alert('Erreur : ".$idcom->errorCode()."')</script>";
}
else
{
echo "<script type=\"text/javascript\">
alert('Vous êtes enregistré. Votre numéro de client est :
". $idcom->lastInsertId()."')</script>"; 
$idcom=null;
}*/
}
else {echo "<h3>Formulaire à compléter !</h3>";}
?>
</body>
</html>
