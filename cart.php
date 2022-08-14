<?php
 include('partials-front/nav-bar.php');
 ?>
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
            $cantitateStoc=$row['cantitateStoc'];


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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body class="bg-light">
<div class="py-3  bg-light">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" style="text-decoration:none;color: rgba(136, 10, 80, 0.9); font-weight:bold;">
                Home/
            </a>
             <a href="produse.php" style="text-decoration:none;color: rgba(136, 10, 80, 0.9); font-weight:bold;">
                Produse/
            </a>
              <a href="<?php echo SITEURL;  ?>cart.php?idProdus=<?php echo $idProdus; ?>" style="text-decoration:none;color: rgba(136, 10, 80, 0.9); font-weight:bold; ">
                Cart
            </a>
        </h6>
    </div>
</div>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <form action="cart.php" method="get" class="cart-item">
                    <div class="border round">
                        <div class="row bg-white">
                            <div class="col-md-3 pl-0">
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
                            <div class="col-md-6">
                                <h5 class="pt-2"><?php echo $numeProdus;  ?></h5>
                                <h5 class="pt-2"><?php echo $pretVanzare;  ?></h5>
                                <?php
                                            if($cantitateStoc==0){
                                                echo '<h6 style="color:red">Stoc Indisponibil</h6>';

                                            }else{
                                                   echo '<h4 style="color:green">Stoc Disponibil</h4>';
                                                    echo '<h4 style="color:#222f3e">Introduceti cantitatea: </h4>';
                                                     echo '<input type="number" class="form-control"  style="width:80%; padding:1% 0%;" name="" min="1" max="'.$cantitateStoc.'" aria-describedby="helpId" >';
                                            }

                                ?>
                                <br><br>
                                <button type="submit" class="btn btn-warning">Save</button>
                                <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
                            </div>
                            <div class="col-md3">
                                
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5">

        </div>
    </div>
</div>


</body>
</html>







