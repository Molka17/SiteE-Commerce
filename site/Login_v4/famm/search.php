<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action= "<?php echo $_SERVER['PHP_SELF']?>" method="post"
enctype="application/x-www-form-urlencoded">
<fieldset>
<legend><b></b></legend>
<table>
<tbody>
<tr> <td></td>
<td><input type="text" name="motcle" size="40" maxlength="40" /></td>
</tr>
<tr>
<td>Dans la catégorie : </td>
<td>
<select name="categorie">
<option value="tous">Tous</option>
<option value="clothes">clothes</option>
<option value="women">women</option>
<option value="dresses">dresses</option>
<option value="pants">pants</option>
</select>
</td>
</tr>
<tr>
<td>Trier par prix : </td>
<td>
<select name="tri">
<option value="prix" name="ordre" value="ASC" >croissant</option>
<option value="categorie" name="ordre" value="DESC">décroissant</option>
</select>
</td>
</tr>
<tr><td>Rechercher</td><td><input type="submit" name="" value="OK"/></td> </tr>
</tbody>
</table>
</fieldset>
</form>



<?php
if(!empty($_POST ['motcle'])) 
{
include("connection.php");
$motcle=strtolower($_POST ['motcle']); 
$categorie=($_POST ['categorie']); 
$ordre=($_POST ['ordre']); 
$tri=($_POST ['tri']); 
// Requête SQL
//$reqcategorie=($_POST['categorie']=="tous")?"":"AND categorie='$categorie'"; 

$idcom=connexpdo('magasin','myparam');
$result=$idcom->prepare("SELECT * FROM article WHERE lower(design) LIKE'%:motcle%' AND categorie=:categorie ORDER BY prix ASC");
$result->bindValue(':motcle', $motcle,PDO::PARAM_STR);
$result->bindValue(':categorie', $categorie,PDO::PARAM_STR);
//$result->bindValue(':ordre', $ordre,PDO::PARAM_STR);
$result->execute();


$ligne=$result->fetch(PDO::FETCH_ASSOC); // Tableau associatif
$titres=array_keys($ligne);
$ligne=array_values($ligne);
 print_r($titres);
//echo "<h3>Il y a $nbart articles correspondant au mot-clé : $motcle</h3>";
// Affichage des titres du tableau
echo "<table border=\"1\"> <tr>";
foreach($titres as $val)
{
    echo"******************";
echo "<th>", htmlentities($val) ,"</th>";
}
echo "</tr>";
// Affichage des valeurs du tableau
do
{
echo "<tr>";
foreach($ligne as $donnees)
{
echo "<td>",$donnees,"</td>";
}
echo "</tr>";
}
while($ligne=$result->fetch(PDO::FETCH_NUM));

echo "</table>";
$result->closeCursor();
$idcom=null;
}
?>
</body>
</html>