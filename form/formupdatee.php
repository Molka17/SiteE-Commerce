<?php
if(empty($_POST['code'])){header("Location:connection.php");} 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Modifiez vos coordonnées</title>
</head>
<body>
<?php
include('connexion1.php');
$idcom=connexpdo('magasin','myparam');
if(!isset($_POST['modif'])) 
{
$code=(integer)$_POST['code']; 
// Requête SQL
$requete="SELECT * FROM user WHERE iduser='$code' "; 
$result=$idcom->query($requete);
$coord=$result->fetch(PDO::FETCH_NUM); 
// Création du formulaire complété avec les données existantes 
echo "<form action= \"". $_SERVER['PHP_SELF']."\" method=\"post\"enctype=
\"application/x-www-form-urlencoded\">";
echo "<fieldset>";
echo "<legend><b>Modifiez vos coordonnees</b></legend>";
echo "<table>";
echo "<tr><td>Nom : </td><td><input type=\"text\" name=\"login\" size=\"40\"
maxlength=\"30\" value=\"$coord[1]\"/> </td></tr>";
echo "<tr><td>pass : </td><td><input type=\"text\" name=\"pass\" size=\"40\"
maxlength=\"30\" value=\"$coord[2]\"/></td></tr>";
echo "<tr><td>role : </td><td><input type=\"text\" name=\"role\" size=\"40\"
maxlength=\"30\" value=\"$coord[3]\"/></td></tr>";

echo "<tr><td><input type=\"reset\" value=\"Effacer\"></td> <td><input type=
\"submit\" name=\"modif\" value=\"Enregistrer\"></td></tr></table>";
echo "</fieldset>";
echo "<input type=\"hidden\" name=\"code\" value=\"$code\"/>"; 
echo "</form>";
$result->closeCursor();
$idcom=null;
}
elseif(isset($_POST['login'])&& isset($_POST['pass'])&& isset($_POST['role'])) 
{
// ENREGISTREMENT
$login=$idcom->quote($_POST['login']);
$pass=$idcom->quote($_POST['pass']);
$role=$idcom->quote($_POST['role']);
$code=(integer)$_POST['code'];

// Requête SQL
$requete="UPDATE user SET login=$login,pass=$pass,role=$role WHERE iduser=$code"; 
$result=$idcom->exec($requete);
if($result!=1) 
{
echo "<script type=\"text/javascript\">
alert('Erreur : ".$idcom->errorCode()."')</script>"; 
}
else
{
echo "<script type=\"text/javascript\"> alert('Vos modifications sont
enregistrées');window.location='update.php';</script>"; 
}
$idcom=null;
}
else
{
echo "Modifiez vos coordonnées !";
}
?>
</body>
</html>