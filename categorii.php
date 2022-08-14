

<?php
 include('partials-front/nav-bar.php');
include('partials-front/search.php');
 ?>

<!-- categorii -->
<div class="py-3  bg-light ">
    <div class="container">
        <h6>
            <a href="index.php" style="text-decoration:none;color: rgba(136, 10, 80, 0.9); font-weight:bold;">
                Home/
            </a>
            <a href="categorii.php" style="text-decoration:none;color: rgba(136, 10, 80, 0.9); font-weight:bold; ">
                Categorii 
            </a>
        </h6>
    </div>
</div>
   <section class="categories">
        <div class="container">
          
        <?php
                     $sql = "SELECT *FROM categorii WHERE activ='Activ' ";
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
                                <a href="<?php echo SITEURL;  ?>categorii-produse.php?idCategorie=<?php echo $idCategorie;?>" >
                                <img src=" <?php echo SITEURL;  ?>Images/categorii/<?php echo $numeImagine;  ?>"  alt="#" style="width:15em; height:16em; "  class="img-responsive categ-img"/>
                                 
                            
                            </a>
                           
                            
                            <?php
                           
                                }

                                             
                                    
                                ?>
                                 <a href="<?php echo SITEURL;  ?>categorii-produse.php?idCategorie=<?php echo $idCategorie;?>">
                                    <h3 class="float-text text-center title-size1" style=" margin-bottom: 3rem;"><?php echo $numeCategorie; ?> </h3> <br>
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
            <a  href=" <?php echo SITEURL;?>index.php" class="btn btn-light mb-4"  style="color:black; font-wheight:bold; border: 3px solid rgb(100,150,47, 0.5); border-radius:10px;margin-left:42%"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Prima Pagina</a>
        </p>


<!-- Footer -->
    <?php include('partials-front/footer.php') ?>