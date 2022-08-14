<?php
include('partials/navbar.php');
?>

 <div class="main-content">
            <div class="wrapper">
              

<?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];// afiseaza mesajul
                    unset($_SESSION['add']);//refresh page and delete mesage 
                }
?>
<br><br>
                <form action="" method="POST" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(5, 20, 34, 0.874), 0 6px 20px 0 rgba(37, 32, 32, 0.951);" >
                    <table class="tbl-45">
                            <h1 style="text-align:center">Adauga Admin</h1>
                            <hr>
                       
                          <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username" placeholder="Introduceti prenumele.."></td>
                        </tr>
                          <tr>
                            <td>Parola:</td>
                            <td><input type="password" name="password" placeholder="parola"></td>
                        </tr>
                          <tr>
                            <td>Rol:</td>
                            <td><input type="number" name="rol" placeholder="Rolul"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" name="submit" value="Adauga" class="btn-primary">
                            </td>
                        </tr>
                        <a href="manage-admin.php" class="btn btn-primary  px-4 py-2 mx-5" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
                </form>
            </div>
        </div>



<?php
include('partials/footer.php');
?>

<?php
if(isset($_POST['submit'])){
// echo "Button clicked";
//1Preiau datele din Form 

$username = $_POST['username'];
$password = md5($_POST['password']);
$rol = $_POST['rol'];

//Sql Query pentru a salva in baza de date
$sql = "INSERT INTO angajati SET
  
    username='$username',
    password='$password',
    rol='$rol'
";
//Execut Query and save in Datebase

$res = mysqli_query($conn,$sql) 
if($res==TRUE)
{

 $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
    //     //redirect page 
        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-admin.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-admin";</script>';
        }
        
        
    }else{
        $_SESSION['add'] = "<div class='error'>Admin not added successfully</div>";
        //redirect page
        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/adauga-admin.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-admin";</script>';
        }

    }
}