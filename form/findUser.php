<?php error_reporting(0); ?> 

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
<legend><b>Saisissez le code de l'utilisateur à checher</b></legend>
<table><tbody>
<tr>
<td>login user : </td>
<td><input type="text" name="user1" size="20" maxlength="10"/></td> 
</tr>
<tr>
<td>password user : </td>
<td><input type="text" name="pass1" size="20" maxlength="10"/></td> 
</tr>
<tr>
<td>rechercher : </td>
<td><input type="submit" value="rechercher"/></td>
</tr>
</tbody></table>
</fieldset>
</form>
<?php

include('connection.php');
$idcom=connexpdo('magasin','myparam');

if(!isset($_POST['rech'])) 
{
   
     $user=$_POST['user1'];
     $pass=$_POST['pass1'];


$stmt=$idcom->prepare("DELETE idUser , login FROM user WHERE login=:user AND pass:=pass "); 
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':pass',$pass, PDO::PARAM_STR);

$stmt->execute();
$stmt->bindColumn('user', $user); 
$stmt->bindColumn('pass', $pass); 

while($result=$stmt->fetch(PDO::FETCH_BOUND)) 
{
echo "<h3> $user $pass</h3>";
}
$idcom=null;
}
else
{
echo "rechercher user !";
}
?> 
</body>
</html>