<?php
include('partials/navbar.php');
include('partials/navSub1.php');
?>



<div class="container-fluid main-content pb-4">
  <div class="wrapper">
        
        <!-- <h1 style="text-align:center" class="card-d1">PRODUSE</h1> -->
     
       
    </div>
 <div class="btn-group btn-group-lg btn-center"  >
        <a href="adauga-produse.php" class="btn btn-primary" >Adauga Produse</a>
    </div>

<!-- Date angajati -->
<!-- SESSION -->

                <?php
                          if(isset($_SESSION['add-produs']))
                            {
                                echo $_SESSION['add-produs'];
                                unset($_SESSION['add-produs']);
                            } 
                             if(isset($_SESSION['delete-produs']))
                            {
                                echo $_SESSION['delete-produs'];
                                unset($_SESSION['delete-produs']);
                            } 

                             if(isset($_SESSION['update-produs']))
                            {
                                echo $_SESSION['update-produs'];
                                unset($_SESSION['update-produs']);
                            }
                            if(isset($_SESSION['delete-image'])){
                                echo $_SESSION['delete-image'];
                                unset($_SESSION['delete-image']);
                            }    
                               if(isset($_SESSION['upload']))
                            {
                                echo $_SESSION['upload'];
                                unset($_SESSION['upload']);
                            }   
                                 if(isset($_SESSION['remove-failed']))
                            {
                                echo $_SESSION['remove-failed'];
                                unset($_SESSION['remove-failed']);
                            }  
                ?>
<br><br>
    
<div class="container mx-4 mb-4 ">
<table class="table table-responsive-sm table-striped table-bordered  bg-light px-4" style="position:relative; margin-left:6%" >
                    <thead class="tbl">
                        <tr>
                            <th>S.N.</th>
                             <th>ID Produs.</th>
                            <th>Denumire Produs </th>
                            <th>Detalii Produs</th>
                            <th>UM</th>
                            <th>Cantitate Introdusa in Stoc</th>
                            <th>Pret Unitar Achizitie</th>
                            <th>Data Achizitie</th>
                            <th>Pret Unitar Vanzare</th>
                            <th>Status</th>
                            <th>Imagine</th>
                            <th>Actiuni</th>
                            
                        </tr>
                    </thead>
<?php

      
      $sql = "SELECT *FROM produse";
      //execute the query
      $res = mysqli_query($conn,$sql);

      //check query  is executed or not
    if($res==TRUE)
    {

        //count rows to check if we have data in database
        $count = mysqli_num_rows($res);
        $sn=1; //create a variable and asign value

        if($count>0)
        {
            //we have data in database
            while($rows=mysqli_fetch_assoc($res))
            {
                $idProdus=$rows['idProdus'];
                $numeProdus=$rows['numeProdus'];
                $specificatiiProdus=$rows['specificatiiProdus'];
                $UM=$rows['UM'];
                $cantitateStoc=$rows['cantitateStoc'];
                $dataAchizitie=$rows['dataAchizitie'];
                $pretAchizitie=$rows['pretAchizitie'];
                $pretVanzare=$rows['pretVanzare'];
                $activ=$rows['activ'];
                $imgProd=$rows['imgProd'];

?>

                    <tbody class="tbl" id="myTable">
                        <tr>
                            <th><?php echo $sn++;?></th>
                             <td><?php echo $idProdus;?></td>
                            <td><?php echo $numeProdus;?></td>
                            <td><?php echo $specificatiiProdus;?></td>
                            <td><?php echo $UM;?></td>
                            <td><?php echo $cantitateStoc;?></td>
                            <td><?php echo $pretAchizitie;?></td>
                            <td><?php echo $dataAchizitie;?></td>
                            <td><?php echo $pretVanzare;?></td>
                            <td><?php echo $activ;?></td>
                            <td>
                             <?php 
                                    if($imgProd!=""){
                                        //afiseaza imaginea imagine
                                        ?>
                                       <img src="<?php echo SITEURL; ?>Images/produse/<?php echo $imgProd; ?>" width="100px" height="100px" style="border:1px solid;border-radius:3px"/>

                                       <?php
                                    }else{
                                        //message not image aviable
                                        echo "<div class='error'>Not image aviable </div>";
                                    }
                                     ?>
                            </td>
                                      <td> 
                                        <div class="btn-group btn-group-sm">
                                                <a href="<?php echo SITEURL ?>admin/update-produse.php?idProdus=<?php echo $idProdus;?>" class="btn btn-success py-3  px-4"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="<?php echo SITEURL ?>admin/delete-produse.php?idProdus=<?php echo $idProdus; ?>&imgProd=<?php echo $imgProd; ?> "  class="btn btn-danger py-3 mx-1 px-4" ><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </td>
                        </tr>
                    </tbody>


<?php


            }
        }
    }


      ?>
        </table>
        
    </div>
</div>







<?php
include('partials/footer.php');
?>