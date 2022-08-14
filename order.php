<?php include('partials-front/nav-bar.php') ?>

<?php
if(isset($_GET['idProdus'])){

        $idProdus=$_GET['idProdus'];
        $sql="SELECT * FROM produse WHERE idProdus=$idProdus";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
    if($count==1){
            $row=mysqli_fetch_assoc($res);
            $numeProdus=$row['numeProdus'];
            $pretVanzare=$row['pretVanzare'];
            $imgProd=$row['imgProd'];


    }else{
         if( ! headers_sent() ){
             header('location:'.SITEURL);
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/";</script>';
        }
    }

}else{
     if( ! headers_sent() ){
             header('location:'.SITEURL);
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/";</script>';
        }
}

?>



<section class="electrocasnice-search">
 <h5 class="text-center ">Completează formularul pentru a plasa comanda</h5>
        <form action="#" class="order center">
           
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                     <h4 class="text-center">Produse Selectate</h4>
                     <hr>
                    <div class="col-md-4">
                        <?php
                                if($imgProd==""){
                                    echo "<div class='error'>Not image aviable </div>";
                                }else{
                                    ?>
                                    <img src="<?php echo SITEURL; ?>Images/categorii/<?php echo $imgProd; ?>" width="100"  height="100" />
                            <?php
                                }


                        ?>
                   
                    </div>
                    <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $numeProdus;  ?></h5>
                            <p class="card-text"><?php echo $pretVanzare;  ?></p>
                            <p class="card-text">
                                <label  class="form-label">Cantitate</label>
                                <input type="number" class="form-control" placeholder="1">
                          </p>
                    </div>
                    </div>
                </div>
            </div>
        <div class="card mb-3" style="max-width: 540px;">
        <h4 class="text-center">Detalii Comanda</h4>
        <hr>
            <label  class="form-label">Nume Companie</label>
            <input type="text" class="form-control" placeholder="Altex SRL">
            <label  class="form-label">Nume Persoana</label>
            <input type="text" class="form-control" placeholder="Popescu">
            <label  class="form-label">Numar telefon</label>
            <input type="tel" class="form-control" placeholder="0784551245">
            <label  class="form-label">Email address</label>
            <input type="number" class="form-control" placeholder="popescu@yahoo.com">
            <label  class="form-label">Adresa</label>
            <textarea class="form-control"  rows="3"  placeholder="Strada, numar, apartament, scara, cod postal, oras"></textarea>
            <div>
                <input type="submit" name="submit" value="Confirma Comanda" class="btn btn-primary btn-conf">
             </div>
        </div>
         
    </form>
   <?php
        if(isset($_POST['submit'])){

        }else{
            
        }


    ?>
</section>
   













<?php include('partials-front/footer.php') ?>