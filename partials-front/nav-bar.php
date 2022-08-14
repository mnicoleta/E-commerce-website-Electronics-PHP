<?php
include('config/constants.php');

?>
<?php
$idProdus= "";
if(isset($_GET["idProdus"])){
    $idProdus=$_GET["idProdus"];

     $sql="SELECT * from produse WHERE idProdus=$idProdus";
 $result = mysqli_query($conn,$sql);
   $count = mysqli_num_rows($result);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHris Exim Group </title>
    <link rel="stylesheet" href="CSS/styleFront.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;900&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<!--  -->
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
       <img src="Images/categ/logo6.jpg" class="rounded-circle size-circle" alt="" width="100" height="100" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active"  href="<?php echo SITEURL; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITEURL;  ?>categorii.php">Categorii</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="<?php echo SITEURL;?>produse.php">Produse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
      </ul>
      <form class="d-flex " action=" <?php echo SITEURL; ?>produse-search.php" method="POST">
        <input class="form-control me-2" type="search" name="search" placeholder="Caută produse" aria-label="Search">
        <button class="btn bg-success text-light"   name="submit" value="Cauta" type="submit">Caută</button>
      </form>

      
      <!-- <li class="nav-item d-flex">
          <a class="btn btn-success py-1" href="myCart.php">
            
            <i class="fa fa-shopping-cart" style="font-size:2rem;"aria-hidden="true"></i>  MyCart( 0)
          
          </a>
        </li> -->
    </div>
  </div>
</nav>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="index.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>