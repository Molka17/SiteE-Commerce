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
<tr><td>Nom : </td><td><input type="text" name="nom" size="40" maxlength="30"/>
</td></tr>
<tr><td>Prenom : </td><td><input type="text" name="prenom" size="40" maxlength="30"
/></td></tr>
<tr><td>email : </td><td><input type="text" name="email" size="40" maxlength="2"/>
</td></tr>
<tr><td>tel : </td><td><input type="text" name="tel" size="40"
maxlength="60"/></td></tr>
<tr><td>sujet : </td><td><input type="text" name="sujet" size="40" maxlength="40"
/></td></tr>
<tr><td>message : </td><td><input type="text" name="message" size="40" maxlength="50"
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
if(!empty($_POST['nom'])&& !empty($_POST['prenom'])&& !empty($_POST['email'])) 
{
$idContact="\N"; 
$nom=$idcom->quote($_POST['nom']); 
$prenom=$idcom->quote($_POST['prenom']); 
$email=$idcom->quote($_POST['email']); //521
$tel=$idcom->quote($_POST['tel']); 
$sujet=$idcom->quote($_POST['sujet']); 
$message=$idcom->quote($_POST['message']); 

// Requête SQL préparees
$stmt = $idcom->prepare("INSERT INTO message_contact  VALUES ($idContact,$nom,$prenom,$email,$tel,$sujet,$message)");
$stmt->bindParam(':idContact', $idContact);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':tel', $tel);
$stmt->bindParam(':sujet', $sujet);
$stmt->bindParam(':message', $message);
$stmt->execute();


/*$requete="INSERT INTO client
VALUES($id_client,$nom,$prenom,$mail,$age,$ville,$adresse)"; */
/*pas de guillemets
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
