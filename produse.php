

<?php include('partials-front/nav-bar.php');
include('partials-front/search.php');
 ?>






<!-- PRODUSSE -->
<div class="py-3  bg-light ">
    <div class="container">
        <h6>
            <a href="index.php" style="text-decoration:none;color: rgba(136, 10, 80, 0.9); font-weight:bold;">
                Home/
            </a>
            <a href="categorii.php" style="text-decoration:none;color: rgba(136, 10, 80, 0.9); font-weight:bold; ">
                Categorii /
            </a>
              <a href="produse.php" style="text-decoration:none;color: rgba(136, 10, 80, 0.9); font-weight:bold; ">
                Produse
            </a>
        </h6>
    </div>
</div>
<div class="container">
    <div class="row text-center py-5">
        <?php
     $sql = "SELECT *FROM produse";
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
            <form action="" method="post">
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
                    <a href="<?php echo SITEURL;  ?>detail-Prod.php?idProdus=<?php echo $idProdus; ?>" class="btn btn-warning my-3">Detalii</a>
                </div>
                                       <?php

                                    }
                                     ?>

            </div>
      
        </div>
              

            </form>
             <?php

     }
        }
    }
 
            ?>
           
           
        </div>
          
    </div>
     
</div>
   <div class="clearfix"></div>
  <p>
            <a  href=" <?php echo SITEURL;?>index.php" class="btn btn-light mb-4"  style="color:black; font-wheight:bold; border: 3px solid rgb(100,150,47, 0.5); border-radius:10px;margin-left:42%"> Prima Pagina <i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
        </p>
    <?php include('partials-front/footer.php') ?>