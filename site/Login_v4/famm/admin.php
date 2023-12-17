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
       .button {
        background-color: #ff424d;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
        
      }
      .col{
box-sizing: border-box;
position: relative;
width: 200px;
height: 30px;
font-weight: bolder;
border: 1px solid #ff424d;
border-radius: 0px;
background-color : #747474
}
.col2{
        box-sizing: border-box;
position: relative;
width: 200px;
height: 30px;
font-weight: bolder;

border: 1px solid #ff424d;
border-radius: 0px;

}
.box0{  
    box-sizing: border-box;
position: relative;
width: 200px;
height: 30px;
font-weight: normal;

border: 1px solid #ff424d;
border-radius: 0px;

}
.box1{
    box-sizing: border-box;
position: relative;
width: 320px;
height: 30px;
font-weight: bolder;
border: 1px solid #ff424d;
border-radius: 0px;
}  

.box12{
    box-sizing: border-box;
position: relative;
width: 320px;
height: 30px;
font-weight: bolder;
border: 1px solid #ff424d;
border-radius: 0px;
background-color : #747474
}  


      </style>
</head>
<body>
<section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Welcome Admin </h3>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section>
      <details>
                <summary>
                   <h5> show All client</h5>
                </summary>
                <table>
             <tr>
              
                <th>  <div class="col"> PRENOM </div</th>
   
    
                <th> <div class="col"> PRENOM </div></th>
   
    
                <th> <div  class="col"> MAIL </div></th>
    
  
                <th>   <div  class="col"> AGE </div></th>
    
    
                <th> <div  class="col"> VILLE </div> </th>
    
   
                <th>  <div  class="col"> ADRESSE  </div></th>
   
   
                <th>  <a href="" class="button">Delete</a></th>
                <th>  <a href="" class="button">    Update</a></th>

            </tr>
</table>
</details>    
<details>
                <summary>
                  <h5> Show ALL Articls</h5>
                </summary>
                <table>
             <tr>
                <th>  <div class="col"> DESIGHATION </div</th>
                <th> <div class="col">PRIX</div></th>
                <th> <div  class="col">CATEGORIE</div></th>
                <th>   <div  class="col"> IMAGE </div></th>
                <th>  <a href="" class="button">Add</a></th>
                <th>  <a href="" class="button">Delete</a></th>
                <th>  <a href="" class="button">    Update</a></th>

            </tr>
</table>
</details>
<details>
                <summary>
                   <h5> Show All categories </h5>
                </summary>
                <table>
             <tr>
                <th>  <div class="col">DESIGNATION </div</th>
                <th> <div class="col">HAJA</div></th>
                
                <th>  <a href="" class="button">Add</a></th>
                <th>  <a href="" class="button">Delete</a></th>
                <th>  <a href="" class="button">    Update</a></th>

            </tr>
</table>
</details> 
<details>
                <summary>
                   <h5> Show All commands </h5>
                </summary>
                <table>
             <tr>
                <th>  <div class="col">ID-CLIENT </div</th>
                <th> <div class="col">DATE</div></th>
                
              
                <th>  <a href="" class="button">Delete</a></th>
                <th>  <a href="" class="button">    Update</a></th>

            </tr>
           
</table>
</details>   
<details>
                <summary>
                   <h5> Show All Contact </h5>
                </summary>
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
          <tr> <th><div  class="col"> NOM </div> </th> <th> <div  class="col"> PRENOM </div></th> <th> <div  class="col"> EMAIL</div></th> <th> <div  class="col"> TELEPHONE </div></th>  <th> <div  class="col"> SUJET</div></th> <th> <div  class="box12"> MESSAGE </div></th></tr>
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

</details>  
</section>

<script>
    $(document).ready(function(){
     
   
       $( ".box1" ).click(function() {
            $( this ).css({"font-weight": "normal"}); ;
          });
    });
    </script>
      </body>
</html>