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
<div class="container-fluid main-content">
  <div class="wrapper">
        
        <h1 style="text-align:center" class="card-d1">Management Administratori</h1>
        <br><br>
       
    </div>
 <div class="btn-group btn-group-lg ">
        <a href="adauga-admin.php" class="btn btn-primary">Adauga Admin</a>
    </div>

<!-- Date angajati -->
<!-- SESSION -->

                <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];// afiseaza mesajul
                    unset($_SESSION['add']);//sterge mesajul la reactualizare pagina 
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];// afiseaza mesajul
                    unset($_SESSION['delete']);//sterge mesajul la reactualizare pagina 
                }
                if(isset($_SESSION['update'])){
                  echo $_SESSION['update'];
                  unset($_SESSION['update']);
                }
                  if(isset($_SESSION['user-not-found'])){
                  echo $_SESSION['user-not-found'];
                  unset($_SESSION['user-not-found']);
                }
                 if(isset($_SESSION['pass-not-match'])){
                  echo $_SESSION['pass-not-match'];
                  unset($_SESSION['pass-not-match']);
                }
                 if(isset($_SESSION['pass-change'])){
                  echo $_SESSION['pass-change'];
                  unset($_SESSION['pass-change']);
                }
                ?>
<br><br>
    
<div class="table-responsive">
    <table class="table table-bordered">
      <thead class="tbl">
        <tr>
          <th>S.N.</th>
          <th>Nume Utilizator</th>
          <th>email</th>
          <th>Telefon</th>
          <th>Data</th>
          <th>Actiuni</th>
        </tr>
      </thead>

      <?php

      //query to get all admin
      $sql = "SELECT *FROM users";
      //execute the query
      $res = mysqli_query($conn,$sql);

      //check query  is executed or not
      if($res==TRUE){

        //count rows to check if we have data in database
        $count = mysqli_num_rows($res);
        $sn=1; //create a variable and asign value

        if($count>0){
            //we have data in database
            while($rows=mysqli_fetch_assoc($res)){

                $idUser=$rows['idUser'];
                $numeComplet=$rows['numeComplet'];
                $email=$rows['email'];
                $phone=$rows['phone'];
                $create_at=$rows['create_at'];
           

                //display the value in our table
                ?>
                    <tbody class="tbl" id="myTable">
                                <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $numeComplet;?></td>
                                <td><?php echo $email;?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $create_at; ?></td>
                                <td> 
                                  <div class="btn-group btn-group-sm">
                                    <a href="<?php echo SITEURL ?>admin/update-password.php?idUser=<?php echo $idUser;?>" class="btn btn-warning">Change Password</a>
                                    <a href="<?php echo SITEURL ?>admin/update-admin.php?idUser=<?php echo $idUser;?>" class="btn btn-success">Update</a>
                                    <a href="<?php echo SITEURL ?>admin/delete-admin.php?idUser=<?php echo $idUser;?>" class="btn btn-danger">Delete</a>
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
</div>
</div>
</body>
</html>






<?php
include('partials/footer.php');
?>