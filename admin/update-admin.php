<?php
include('partials/navbar.php');
?>
 <div class="main-content">
            <div class="wrapper">
                <br><br><br>
                <h1 style="text-align:center">Update Admin</h1>
                <br><br>

                    <?php
                    //1. get the id of selected admin 
                    $idUser=$_GET['idUser'];

                    //2.create sql query 
                    $sql="SELECT * FROM users WHERE idUser=$idUser";
                    $res=mysqli_query($conn,$sql);

                    //check if the query is executed or not
                    if($res==true){
                        $count= mysqli_num_rows($res);
                        if($count==1)
                        {
                            //echo "admin aviable";
                            $row=mysqli_fetch_assoc($res);

                            $numeComplet=$row['numeComplet'];
                            $username=$row['username'];
                            $rol=$row['rol'];

                        }else
                        {
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }

                    }

                                
                    ?>
<br><br>
                <form action="" method="POST" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(158, 201, 236, 0.874), 0 6px 20px 0 rgba(255, 241, 241, 0.951);" >>
                    <table class="tbl-45">
                        <tr>
                            <td>Nume:</td>
                            <td><input type="text" name="numeComplet" value="<?php echo $numeComplet;?> " placeholder="Introduceti numele..."></td>
                        </tr>
                          <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username" value="<?php echo $username;?>" placeholder="Introduceti prenumele.."></td>
                        </tr>
                          <tr>
                            <td>Rol:</td>
                            <td><input type="number" name="rol" value="<?php echo $rol;?>" placeholder="Rolul"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="idUser" value="<?php echo $idUser;  ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-primary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
<?php

//check if submit button is clicked or not
if(isset($_POST['submit']))
{
    // echo "clicked";
    $idUser=$_POST['idUser'];
    $numeComplet=$_POST['numeComplet'];
    $username=$_POST['username'];
    $rol=$_POST['rol'];

    $sql="UPDATE users SET
    numeComplet='$numeComplet',
    username='$username',
    rol='$rol'
    WHERE idUser='$idUser'
    ";

    $res= mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['update'] = "<div class='success'>Admin Updated Succesfully.</div>";

        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-admin.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-admin";</script>';
        }

    }else
    {
         $_SESSION['update'] = "<div class='error'>Admin not Updated Succesfully.</div>";

        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/adauga-admin.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-admin";</script>';
        }
}
}
?>





<?php
include('partials/footer.php');
?>