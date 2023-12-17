<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3> gestion des utilisateurs </h3>       
        <h5> Formulaire de mise à jour d'un article :</h5> 
    <form action= "updateArticle.php" method="post" enctype=
"application/x-www-form-urlencoded">
<fieldset>
<legend><b>Saisissez le code de l'artcile à modifier</b></legend>
<table><tbody>
<tr>
<td>Code article : </td>
<td><input type="text" name="code" size="20" maxlength="10"/></td> 
</tr>
<tr>
<td>Modifier : </td>
<td><input type="submit" value="Modifier"/></td>
</tr>
</tbody></table>
</fieldset>
</form>
</body>
</html>
