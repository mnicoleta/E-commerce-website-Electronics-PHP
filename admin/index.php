
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depozit</title>
</head>
<body>
    

<?php include('partials/navbar.php'); ?>
<?php include('partials/navbarSub.php'); ?>

<div class="container  my-3">
<div class="row  mx-4 my-5">
       
      <div class="col-4 text-center border rounded" >
                <?php
                $sql="SELECT * FROM categorii";
                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);   
                 ?>
            <h1  class=" pb-5  pt-3">Categorii de produse</h1>   
                    
            <h1  ><?php echo $count;  ?></h1>
        </div>

        <div class="col-4 text-center border rounded" >
            <?php
                $sql1="SELECT * FROM produse";
                $res1=mysqli_query($conn,$sql1);
                $count1=mysqli_num_rows($res1);
            ?>
             <h1  class=" pb-5 pt-3">Stoc de produse</h1>
               
            <h1><?php echo $count1; ?></h1>
        </div>
</div>
<div class="row mx-4 my-5 ">
        <div class="col-4 text-center border rounded " >
             
            <?php
                    $sql2="SELECT * FROM comenzi";
                    $res2=mysqli_query($conn,$sql2);
                    $count2=mysqli_num_rows($res2);

            ?>  
             <h1  class=" pb-5 pt-3 ">Total Comenzi</h1>
            
            <h1><?php echo $count2; ?></h1>
          
           
        </div>
     
        <div class="col-4 text-center border rounded " >
            <?php
                $sql3="SELECT c.idComanda, c.statusComanda,dc.pretTotalComanda, SUM(dc.pretTotalComanda) AS Total FROM comenzi c
                 LEFT JOIN detaliicomenzi dc ON c.idComanda=dc.idComanda 
                 where c.statusComanda='Livrata' ";
                $res3=mysqli_query($conn,$sql3);

                $row3=mysqli_fetch_assoc($res3);
                $totalIncasari =$row3['Total'];
            ?>
            <h1 class=" pb-5  pt-3">Total incasari</h1>
            
            
            <h1><?php echo $totalIncasari;  ?> lei</h1>
        </div>
        <div class="clearfix"></div>
       
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>

<?php include('partials/footer.php');  ?>