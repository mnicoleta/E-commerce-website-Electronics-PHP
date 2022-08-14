<?php
include('../config/constants.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                $numeAngajat=$row['numeAngajat'];
                $prenumeAngajat=$row['prenumeAngajat'];
                $rol=$row['rol'];
             
               
            }
            }

        }        
           

?>



<body style=" background-color: rgba(63, 2, 104, 1) !important;">
    <div class="containter">
        <div class="row" style="margin-top:5%">
            <div class="col-md-4 shadow m-auto border font-monospace bg-white p-3 border-primary mt-5 rounded" >
                <form action="" method="POST"  style="margin-top:10px">
                    <div class="mb-3">
                        <p class="text-center fw-bold fs-3 text-warning">
                            Login
                        </p>
                            <?php
                                if(isset($_SESSION['login'])){
                                    echo $_SESSION['login'];
                                    unset($_SESSION['login']);
                                    
                                }
                                if(isset($_SESSION['no-login-message']))
                                {
                                    echo $_SESSION['no-login-message'];
                                    unset($_SESSION['no-login-message']);
                                }


                            ?>




                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Username:</label>
                        <input type="text" class="form-control" name="usernameAngajat" placeholder="Introduceti usernameul:">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label fw-bold">Parola</label>
                        <input type="password" name="password" class="form-control" placeholder="Introduceti parola" >
                    </div>
                     <input type="hidden" class="form-control" value="<?php echo $prenumeAngajat; ?>" >
                      <input type="hidden" class="form-control" value="<?php echo  $numeAngajat ?>">
                    <input type="submit" name="submit" class=" btn btn-outline-success  fs-4 fw-bold my-3 form-control"  value="Login">
                </form>

<?php

if(isset($_POST['submit']))
{

$usernameAngajat=$_POST['usernameAngajat'];
$password=md5($_POST['password']);

$sql="SELECT * FROM angajati where usernameAngajat='$usernameAngajat' and password='$password'";

$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
if($count==1){

     $_SESSION['login'] = "<div class='alert alert-success' style='width:30%' role='alert'> Hello, $numeAngajat $prenumeAngajat , <br>
                                           V-ati conectat cu success </div>";
           
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/";</script>';
                }

    $_SESSION['user']=$usernameAngajat;
    $_SESSION['angajat']=$rol;

}else{


    $_SESSION['login'] = "<div class='error'>Emailul sau parola nu sunt corecte </div>";
                
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/Autentificare.php');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/Autentificare.php";</script>';
                }



}



}


?>




            </div>
        </div>
    </div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

