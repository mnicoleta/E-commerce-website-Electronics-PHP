
<?php include('partials-front/nav-bar.php');

 ?>


<section class="allProd">
    <section class="electrocasnice-search text-center">
        <div class="container">
            <?php
            if(isset($_POST['search']))
{
                 $search=$_POST['search'];

}
            ?>
            
        </div>
          
<div class="container">
    <div class="row text-center py-5">
        <?php
    $sql="SELECT *FROM produse WHERE numeProdus LIKE '%$search%' OR specificatiiProdus LIKE '%$search%' ";
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
            <a  href=" <?php echo SITEURL;?>index.php" class="btn btn-light mb-4"  style="color:black; font-wheight:bold; border: 3px solid rgb(100,150,47, 0.5); border-radius:10px;margin-left:42%"> Prima Pagina <i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
        </p>
  
    <?php include('partials-front/footer.php') ?>