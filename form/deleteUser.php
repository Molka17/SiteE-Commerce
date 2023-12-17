<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post"
        enctype="application/x-www-form-urlencoded">
<fieldset>
<legend><b>Saisissez le code de l'utilisateur à supprimer</b></legend>
<table><tbody>
<tr>
<td>Code user : </td>
<td><input type="text" name="code" size="20" maxlength="10"/></td> ←
</tr>
<tr>
<td>supprimer : </td>
<td><input type="submit" value="Supprimer"/></td>
</tr>
</tbody></table>
</fieldset>
</form>

<!-- ****************************************************************************************-->



<?php

include('connection.php');
$idcom=connexpdo('magasin','myparam');
echo "baad l connexion";
if(!isset($_POST['supp'])) 
{
    echo "+++++++++++++++++++++++++";
     $code=(integer)$_POST['code'];
  //  $code = 8;
echo "moi code ***********************" ;
// Requête SQL preparé

$stmt=$idcom->prepare("DELETE FROM user WHERE idUser=:code "); 
$stmt->bindParam(':code', $code);
    echo $code;
$stmt->execute();


$idcom=null;
}


else
{
echo "supprimer user !";
}
?> 
</body>
</html>