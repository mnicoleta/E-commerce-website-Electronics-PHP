<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vezi Cosul</title>
</head>
<body>
    <?php

 include('partials-front/nav-bar.php');

// session_start();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center bg-light mb-5 rounded ">
            <h1 class="text-warning">My Cart</h1>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-9">
            <table class="table table-bordered text-center ">
                <thead class="bg-success text-white fs-5">
                    <th>Numar</th>
                
                    <th>Nume Produs</th>
                     <th>UM</th>
                    <th>Cantitate</th>
                    <th>Pret Produs</th>
                    <th>Total Pret</th>
                    <th>Sterge</th>
                    <th>Actualizeaza</th>
                   
                </thead>
                <tbody>
                    <?php
//  $i=1;
$total=0;
  if(isset($_POST['addCart']))
{
   
 $idProdus= $_POST['idProdus'];
     $numeProdus=  $_POST['numeProdus'];
    $cantitate=$_POST['p_cantitate'];
    $pretVanzare= $_POST['pretVanzare'];
    $UM= $_POST['UM'];    }


                        if(isset($_SESSION['cart'])){
  
                            foreach($_SESSION['cart'] as $key => $value){
                                $total = $value['pretVanzare'] * $value['p_cantitate'];
                                echo "
                                <form action ='insertCart.php' method ='POST'>
                                <tr>
                                <td>$key</td>
                                <td>$value[numeProdus]</td>
                                <td>$value[UM]</td>
                                <td>$value[p_cantitate]</td>
                                <td>$value[pretVanzare]</td>
                                <td>$total</td>
                              
                                
                                <td><button class='btn btn-danger' name = 'remove'>Sterge</td> 
                                <td><input type = 'text' name ='item' value = '$value[numeProdus]'></td>
                                </tr>
                                </form>
                                ";
                                // $i++;
                            }
                        }
// <td><button class='btn btn-warning'>Actualizaeaza</td>
                
                    ?>  
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>