<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
$keywords=$_POST["motcle"];
$valider=$_POST["valider"];
if(isset($valider) && !empty($keywords))
{
    include("connection.php");
    $idcom=connexpdo('magasin','myparam');
    $res=$idcom->prepare("select design,img,prix from article where design like '%$keywords%'");
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $res->execute();
    $tab=$res->fetchAll();
    $afficher="oui";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
 <!--   <form namee="fo" method="get" action= "<//?php echo $_SERVER['PHP_SELF']?>"  enctype="application/x-www-form-urlencoded">
<input type="text" name="motcle" value="<//?php echo $keywords?>" placeholders="key words"/>
<input type="submit" name="valider" value="rechercher"/>  -->

<?php  if ($afficher=="oui") { ?>
    <div id="resultat">
        <div id="nbr">
        <?php count($tab)?>
        </div>
        <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
        <?php for ($i=0;$i<count($tab);$i++){?>
            <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/<?=$tab[$i]["img"]?>" alt="">
                     </div>
                     <h6>
                     <?=$tab[$i]["prix"]?>$
                        </h6>



     
            <?php }?>
            </div>
         </div>
      </section>

        


         
           



</div>
<?php }?>
</form>
</body>
</html>