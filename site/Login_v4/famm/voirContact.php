<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms </title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
      <script src="jquery-3.4.1.min.js"> </script>
    <style>
      .box0{
box-sizing: border-box;
position: center;
width: 218px;
height: 30px;
font-weight: normal;
background: #EFCECB;
border: 1px solid #E7311E;
border-radius: 4px;

}
.box1{
box-sizing: border-box;
position: relative;
width: 380px;
height: 30px;
font-weight: bolder;
background: #EFCECB;
border: 1px solid #E7311E;
border-radius: 4px;

}

      </style>
</head>
<body>
<section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Contacts </h3>
                  </div>
               </div>
            </div>
         </div>
      </section>

    <?php
    include('connection.php');
    $idcom=connexpdo('magasin','myparam');
    $res=$idcom->prepare("select * from message_contact ");
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $res->execute();
    $tab=$res->fetchAll();
    $afficher="oui";
    ?>
    <?php  if ($afficher=="oui") { ?>
        <div id="resultat">
            <div id="nbr">
            <?php count($tab)?>
            </div>
         <table>
          <div >
          <tr> <th> NOM</th> <th> PRENOM</th> <th> EMAIL</th> <th> TELEPHONE</th>  <th> SUJET </th> <th> MESSAGE</th></tr>
    </div>
            <?php for ($i=0;$i<count($tab);$i++){?>
               
         
        <tr> <th>
                  <div class="box0">
                      <?php echo $tab[$i]["nom"] ?> 
            </div>
            </th>
            <th>
            <div class="box0">
                   <?php echo $tab[$i]["prenom"] ?>
                   </div>
            </th>
            <th>
                   <div class="box0">
                     <?php echo $tab[$i]["email"] ?> 
                     </div>
            </th>
            <th>
                     <div class="box0">
                  <?php echo $tab[$i]["tele"] ?>  
                  </div>
            </th>
            <th>
                  <div class="box0"> 
                    <?php echo $tab[$i]["sujet"] ?> 
                    </div>
            </th>
                 
            </div>
           <th>
                   <div class="box1">
                   <?php echo $tab[$i]["message"] ?>
                      </div>
                     
            </th>
                <?php }?>
            </tr>
            </table>
                </div>

<?php }?>
   <script>
    $(document).ready(function(){
     
   
       $( ".box1" ).click(function() {
            $( this ).css({"font-weight": "normal"}); ;
          });
    });
    </script>
    <h2>Ajout d'images</h2>

</body>
</html>