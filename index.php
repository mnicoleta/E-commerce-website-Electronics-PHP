<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
 include('partials-front/nav-bar.php');

 ?>`
<!-- categorii -->
                <?php
                        if(isset($_SESSION['confirmare'])){
                            echo $_SESSION['confirmare'];
                            unset($_SESSION['confirmare']);
                        }


                ?>

<section class="categories">
        <div class="container">
            <?php   
            if(isset($_SESSION['message']))
            {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hei!</strong> <?php echo  $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
              unset($_SESSION['message']);
            }

            ?>

            <h2 class="text-center title-size">Principalele Categorii </h2>
          
        <?php
                        $sql = "SELECT *FROM categorii WHERE activ='Activ' LIMIT 6";
                       $res = mysqli_query($conn,$sql);

                        if($res==TRUE)
    {


          $count = mysqli_num_rows($res);
           if($count>0)
        {
             while($row=mysqli_fetch_assoc($res))
            {
                 $idCategorie=$row['idCategorie'];
                $numeCategorie=$row['numeCategorie'];
                $activ=$row['activ'];
                $numeImagine=$row['numeImagine'];
                                    ?>

                            <a href="">
                                <div class="box-3 float-continer">


                                <?php 
                                if($numeImagine==""){
                                echo "<div class='error'>Image not Available </div>";
                                }else{
                                    ?>
                                <a href="<?php echo SITEURL;  ?>categorii-produse.php?idCategorie=<?php echo $idCategorie;?>">
                                <img src=" <?php echo SITEURL;  ?>Images/categorii/<?php echo $numeImagine;  ?>"  alt="#" style="width:15em; height:16em; " class="img-responsive categ-img "/>
                                 
                            
                            </a>
                           
                            
                            <?php
                           
                                }

                                ?>
                                 <a href="<?php echo SITEURL;  ?>categorii-produse.php?idCategorie=<?php echo $idCategorie;?>">
                                    <h3 class="float-text text-center  title-size1"><?php echo $numeCategorie; ?></h3>
                                </a>
                                  </div>
                
          
          
            </a>
            
          <?php
    }
}else{
    echo "<div class='error'>Category not Added </div>";
}
}
?>     
 
       
         <div class="clearfix"></div> 
         
</div>
       
    </section>
         <p>
            <a  href=" <?php echo SITEURL;?>categorii.php" class="btn btn-light mb-4"  style="color:black; font-wheight:bold; border: 3px solid rgb(100,150,47, 0.5); border-radius:10px;margin-left:42%">Vezi toate Categoriile <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
        </p>



<hr>


       
       

   

<!-- Produse -->
<div class="container">
    <div class="row text-center py-5">
        <?php
     $sql = "SELECT *FROM produse WHERE activ='Activ' LIMIT 8";
      $res = mysqli_query($conn,$sql);
  if($res==TRUE)
    {
 $count = mysqli_num_rows($res);
  if($count>0)
        {
              while($rows=mysqli_fetch_assoc($res))
            {

                 $idProdus=$rows['idProdus'];
                $numeProdus=$rows['numeProdus'];
                 $pretVanzare=$rows['pretVanzare'];
                   $imgProd=$rows['imgProd'];

?>
   
            <div class="col-md-3 col-sm-6 my-md-0">
            <form action="index.php" method="post">
                <div class="card shadow mb-4 bg-light">
                    <div class="prod-img">
                        <?php 
                                                if($imgProd==""){
                                                    echo "<div class='error'>Not image aviable </div>";
                                                }else{
                                                    ?>
                                                <img src="<?php echo SITEURL; ?>Images/produse/<?php echo $imgProd; ?>" width="100px"  height="100px" />
                 </div>
                 <div class="card-body">
                     <h4><?php echo $numeProdus; ?></h4>
                     
                     <h5 class="prod-preice">Pret:<?php echo $pretVanzare; ?> lei</h5>
                    <br>
                    <a href="<?php echo SITEURL;  ?>detail-prod.php?idProdus=<?php echo $idProdus; ?>" class="btn btn-warning my-3">Detalii</a>
                </div>
                                       <?php

                                    }
                                     ?>

            </div>
            
        </div>
 <?php

     }
        }
    }


            ?>
            
            </form>
           
        </div>
    </div>
     
</div>
      <p>
            <a  href=" <?php echo SITEURL;?>produse.php" class="btn btn-light mb-4"  style="color:black; font-wheight:bold; border: 3px solid rgb(100,150,47, 0.5); border-radius:10px;margin-left:42%">Vezi toate Produsele <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
        </p>
<!-- Footer -->
    <?php include('partials-front/footer.php') ?>




</body>
</html>



