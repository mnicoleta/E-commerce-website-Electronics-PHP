

<?php
 include('partials-front/nav-bar.php');

 ?>

<?php
    if(isset($_GET['idCategorie']))
    {
        $idCategorie=$_GET['idCategorie'];
        $sql2="SELECT numeCategorie FROM categorii WHERE idCategorie=$idCategorie";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        $numeCategorie=$row2['numeCategorie'];
    }else
    {
          if( ! headers_sent() ){
             header('location:'.SITEURL);
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/";</script>';
        }
    }
?>

<section class="electrocasnice-search text-center">
        <div class="container">
            
            <h2>Categoria/ <?php echo $numeCategorie; ?></h2>
        </div>
</section>

<div class="container">
    <div class="row text-center py-5">
            <h2 class="text-center title-size"> PRODUSE</h2>
             <?php
           

                        $sql="SELECT *FROM produse WHERE idCategorie=$idCategorie";
                    
                        $res1= mysqli_query($conn,$sql);

                        $count = mysqli_num_rows($res1);
                        

                        if($count>0)
                        {
                            //we have data in database
                            while($row=mysqli_fetch_assoc($res1))
                            {
                                $idProdus=$row['idProdus'];
                                $numeProdus=$row['numeProdus'];
                                $pretVanzare=$row['pretVanzare'];
                                $imgProd=$row['imgProd'];

             ?>

            <div class="col-md-3 col-sm-6 my-md-0">
            <form action="" method="post">
                <div class="card shadow mb-4 bg-light">
                    <div class="prod-img">
                                    <?php 
                                    if($imgProd==""){
                                        echo "<div class='error'>Not image aviable </div>";
                                    }else{
                                        ?>
                                       <img src="<?php echo SITEURL; ?>Images/produse/<?php echo $imgProd; ?>" width="100px" height="100px" />
                                </div>
                                  <div class="card-body">
                                      
                                        
                                                    <h4><?php echo $numeProdus; ?></h4>
                                                    <p class="prod-preice">Pret:<?php echo $pretVanzare; ?> lei</p>
                                                    <br>
                                                    <a href="<?php echo SITEURL;  ?>detail-Prod.php?idProdus=<?php echo $idProdus; ?>" class="btn  btn-warning my-3">Vezi Detalii</a>
                                        </div>

                                         <?php

                                    }
                                     ?>
                                                
                              </div>
            <div class="clearfix"></div>
        </div>
                           
     


                            

                                    <?php


            }
        }else
        {
     if( ! headers_sent() ){
             header('location:'.SITEURL);
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/";</script>';
        }
}
    
      ?>
    </form>
           
        </div>
    </div>
     
</div>
           
       <div class="clearfix"></div>
    

 <a   href=" <?php echo SITEURL;?>categorii.php" ><button class="btn  btn-primary btn-categ "> Inapoi</button></a>   
   
 
 <?php include('partials-front/footer.php') ?>