  <?php
 include('partials-front/nav-bar.php');
 ?>  
<?php
$output = "";
if(isset($_POST['register']))

{
    $nume= $_POST['nume'];
    $prenume= $_POST['prenume'];
    $username= $_POST['username'];
    $rol= $_POST['rol'];
    $pass= $_POST['pass'];
    $conf_pass= $_POST['conf_pass'];


    $error = array();

    if(empty($nume))
    {
        $error['error'] =  "Introduceti Numele!";
    }else if(empty($prenume)){
        $error['error'] =  "Introduceti Prenumele!";
    }else if(empty($username)){
        $error['error'] =  "Introduceti username!";
    }else if(empty($rol)){
        $error['error'] =  "Selectati rolul!";
    }else if(empty($pass)){
        $error['error'] =  "Introduceti parola!";
    }else if(empty($conf_pass)){
        $error['error'] =  "Confiramti parola!";
    }else if($pass != $conf_pass){
        $error['error']= "Parolele nu se potrivesc";
    }



    if(isset($error['error']))
    {
        $output .= $error['error'];

    }else{
        $output .= "";
    }

    if(count($error) < 1){
        $queryRegister = "INSERT INTO utilizatoriconect(numeUtilizator,prenumeUtilizator,userName,password,role) VALUES('$nume','$prenume','$username','$pass','$rol') ";
        
        $queryRegister_run = mysqli_query($conn,$queryRegister);

        if($queryRegister_run){
            $output .= "You Have success registered";
            header("Location:Log.php");
        }else{
            $output .= "Failed to register";
        }
    }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body class="bg-secondary bg-opacity-25">

<!-- <div class="container">
     <div class="col-md-12">
         <div class="row d-flex justify-content-center">
            <div class="col-md-6 shadow-sm shadow-md bg-light rounded " style="margin-top:100px; margin-bottom:100px; ">
                <form action="#" method="POST" >
                    <h3 class="text-center my-5">Register</h3>
                     <div class="text-center text-warning ">
                         <?php echo  $output;
                          ?>
                    </div>
                   
                    <label>Nume</label>
                    <input type="text" name="nume" class="form-control my-2" placeholder="Introduceti Numele" autocomplete="off">
                     <label>Prenume</label>
                    <input type="text" name="prenume" class="form-control my-2" placeholder="Introduceti Prenumele" autocomplete="off">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control my-2" placeholder="Introduceti username" autocomplete="off">
                    <label>Selecteaza Rolul</label>
                    <select name="rol" class="form-control my-2">
                        <option value="">Selecteaza Rolul</option>
                        <option value="Admin">Administrator</option>
                        <option value="User">User</option>
                    </select>
                    <label >Parola</label>
                    <input type="password" name="pass" class="form-control my-2" placeholder="Introduceti parola">
                    <label >Confirma Parola</label>
                    <input type="password" name="conf_pass" class="form-control" placeholder="Confirma Parola">
                    <input type="submit" name="register" class="btn btn-success my-3 " vlaue="Register">
                </form>
            </div>
         </div>
     </div>
 </div>
<div class="" style="margin-top:30px;"></div> -->




<?php include('partials-front/footer.php') ?>
</body>
</html>