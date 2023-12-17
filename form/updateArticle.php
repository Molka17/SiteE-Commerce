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
include('connection.php');
$idcom=connexpdo('magasin','myparam');
if(!isset($_POST['modif'])) 
{
$code=(integer)$_POST['code']; 
// Requête SQL
$requete="SELECT * FROM article WHERE id_article='$code' "; 
$result=$idcom->query($requete);
$coord=$result->fetch(PDO::FETCH_NUM); 
// Création du formulaire complété avec les données existantes 
echo "<form action= \"". $_SERVER['PHP_SELF']."\" method=\"post\"enctype=
\"application/x-www-form-urlencoded\">";
echo "<fieldset>";
echo "<legend><b>Modifiez vos coordonnees</b></legend>";
echo "<table>";
echo "<tr><td>design : </td><td><input type=\"text\" name=\"design\" size=\"40\"
maxlength=\"30\" value=\"$coord[1]\"/> </td></tr>";
echo "<tr><td>prix : </td><td><input type=\"text\" name=\"prix\" size=\"40\"
maxlength=\"30\" value=\"$coord[2]\"/></td></tr>";
echo "<tr><td>categorie : </td><td><input type=\"text\" name=\"categorie\" size=\"40\"
maxlength=\"30\" value=\"$coord[3]\"/></td></tr>";
echo "<tr><td>image : </td><td><input type=\"text\" name=\"img\" size=\"40\"
maxlength=\"30\" value=\"$coord[4]\"/></td></tr>";
echo "<tr><td><input type=\"reset\" value=\"Effacer\"></td> <td><input type=
\"submit\" name=\"modif\" value=\"Enregistrer\"></td></tr></table>";
echo "</fieldset>";
echo "<input type=\"hidden\" name=\"code\" value=\"$code\"/>"; 
echo "</form>";
$result->closeCursor();
$idcom=null;
}
elseif(isset($_POST['design'])&& isset($_POST['prix'])&& isset($_POST['categorie']) && isset($_POST['img'])) 
{
// ENREGISTREMENT
$design=$idcom->quote($_POST['design']);
$prix=$idcom->quote($_POST['prix']);
$categorie=$idcom->quote($_POST['categorie']);
$img=$idcom->quote($_POST['img']);
$code=(integer)$_POST['code'];

// Requête SQL
$requete="UPDATE article SET design=$design,prix=$prix,categorie=$categorie, img=$img WHERE id_article=$code"; 
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