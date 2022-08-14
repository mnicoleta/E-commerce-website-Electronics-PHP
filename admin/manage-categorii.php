<?php
include('partials/navbar.php');
include('partials/navSub1.php');
?>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="../CSS/Admin1.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script>
            $(document).ready(function(){
              $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
            });
</script>
     <title>Depozit- Managementul angajatilor</title>
 </head>
 <body>

<div class="container-fluid main-content pb-4">
      
        <!-- <h1 style="text-align:center" class="card-d1"> CATEGORII DE PRODUSE</h1> -->
      
       
   
 <div class="btn-group btn-group-lg btn-center1" >
        <a href="<?php echo SITEURL; ?>/admin/adauga-categorii.php" style="margin-left:100px"     class="btn btn-primary mt-0 " >Adauga Categorii de Produse</a>
    </div>
    
  <br><br><br>

<!-- SESSION -->

                <?php
                           if(isset($_SESSION['add-categorie']))
                            {
                                echo $_SESSION['add-categorie'];
                                unset($_SESSION['add-categorie']); 
                            }
                             if(isset($_SESSION['update-categorie']))
                            {
                                echo $_SESSION['update-categorie'];
                                unset($_SESSION['update-categorie']); 
                            }
                             if(isset($_SESSION['delete-categorie']))
                            {
                                echo $_SESSION['delete-categorie'];
                                unset($_SESSION['delete-categorie']); 
                            }
                            if(isset($_SESSION['failed-remove']))
                            {
                                echo $_SESSION['failed-remove'];
                                unset($_SESSION['failed-remove']); 
                            }
                             if(isset($_SESSION['upload']))
                            {
                                echo $_SESSION['upload'];
                                unset($_SESSION['upload']); 
                            }
                             if(isset($_SESSION['delete-image']))
                            {
                                echo $_SESSION['delete-image'];
                                unset($_SESSION['delete-image']); 
                            }
                ?>
<br><br>
    <div class="container mx-4 mb-4  ">
        <table class="table  table-responsive-lg table-striped table-bordered my-0 table-positionCateg bg-light " >
                    <thead >
                        <tr>
                            <th  scope="col">S.N.</th>
                            <th  scope="col">ID Categorie</th>
                            <th  scope="col">Nume Categorie </th>
                            <th  scope="col">Imagine</th>
                            <th  scope="col">Status</th>
                            <th  scope="col">Actiuni</th>
                        </tr>
                    </thead>
<?php

      
      $sql = "SELECT *FROM categorii";
      
      $res = mysqli_query($conn,$sql);

    
    if($res==TRUE)
    {

     
        $count = mysqli_num_rows($res);
        $sn=1; 

        if($count>0)
        {
       
            while($row=mysqli_fetch_assoc($res))
            {
                $idCategorie=$row['idCategorie'];
                $numeCategorie=$row['numeCategorie'];
                $activ=$row['activ'];
                $numeImagine=$row['numeImagine'];
               
                
               

?>

                    <tbody id="myTable">
                        <tr >
                            <th scope="row"> <?php echo $sn++;?></th>
                            <th><?php echo $idCategorie;?></th>
                            <th><?php echo $numeCategorie;?></th>
                            <th>
                             <?php 
                                    if($numeImagine!=""){
                                        //display image
                                        ?>
                                       <img src="<?php echo SITEURL; ?>Images/categorii/<?php echo $numeImagine; ?>" width="100px"  height="100px" style="border:1px solid;border-radius:3px"/>

                                       <?php
                                    }else{
                                        //message not image aviable
                                        echo "<div class='error'>Not image aviable </div>";
                                    }
                                     ?>
                                     </th>
                                     <th><?php echo $activ;?></th>

                                      <th> 
                                        <div class="btn-group btn-group-sm">
                                                <a href="<?php echo SITEURL ?>admin/update-categorii.php?idCategorie=<?php echo $idCategorie; ?>" class="btn btn-success py-3  px-4"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="<?php echo SITEURL ?>admin/delete-categorii.php?idCategorie=<?php echo $idCategorie; ?>&numeImagine=<?php echo $numeImagine;  ?>"  class="btn btn-danger py-3 mx-1 px-4" ><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </th>
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
</body>
</html>






<?php
include('partials/footer.php');
?>