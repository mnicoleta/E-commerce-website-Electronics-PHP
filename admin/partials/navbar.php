 <?php
 include('../config/constants.php');
include('verificLogin.php');
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="../CSS/admin.css">
     
 </head>
  <?php

 $sql1 = "SELECT *FROM angajati";
      
      $res1 = mysqli_query($conn,$sql1);

    
    if($res1==TRUE)
    {

     
        $count1 = mysqli_num_rows($res1);
       

        if($count1>0)
        {
       
            while($row=mysqli_fetch_assoc($res1))
            {
                $idAngajat=$row['idAngajat'];
                $usernameAngajat=$row['usernameAngajat'];
               
             
               
            }
            }

        }        
           


?>
 <body>
<!-- Navbar -->

<nav class="navbar navbar-expand-lg  navbar-light bg-nav menu-nav">
        <a class="navbar-brand n-brand" href="#" >  <img src="../Images/categ/logo6.jpg" class="rounded-circle size-circle" alt="" width="100" height="100" ></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse menu-nav" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>   
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="manage-admin.php">Admin</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="manage-angajati.php">Angajati</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage-furnizor.php">Furnziori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage-client.php">Clienti</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage-categorii.php">Categorii de produse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage-produse.php">Produse</a>
                </li>
              
                <li class="nav-item">
                    <a class="nav-link" href="manage-comenzi.php">Comenzi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Rapoarte.php">Rapoarte</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="Deconectare.php">Deconectare</a>
                </li>
        </ul>
</div>
            <span>
                <nav class="navbar-expand-lg navbar-light bg-nav ">
                    <ul class="navbar-nav mr-auto float-right">
                        
                        <li class="nav-item">
                    <a class="nav-link" href="manage-angajati.php">   <?php  echo $usernameAngajat;  ?></a>
                </li>
                     
                   
                    </ul>
                </nav>
            </span>
        
  </div>
</nav> 


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
 </html>