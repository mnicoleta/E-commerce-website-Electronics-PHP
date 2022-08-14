<?php
include('partials/navbar.php');
?>
<div class="main-content">
            <div class="wrapper">
                <br><br><br>
                <h1 style="text-align:center">Change Password</h1>
                <br><br>


             <?php
             
             if(isset($_GET['idAngajat']))
             {
                 $idAngajat=$_GET['idAngajat'];
             }
             
             ?>

<br><br>
                <form action="" method="POST" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(158, 201, 236, 0.874), 0 6px 20px 0 rgba(255, 241, 241, 0.951);" >
                    <table class="tbl-45">
                        <tr>
                            <td>Curent Password:</td>
                            <td><input type="password" name="curentPassword"  placeholder="Old Password"></td>
                        </tr>
                          <tr>
                            <td>New Password:</td>
                            <td><input type="password" name="newPassword" placeholder="New Password"></td>
                        </tr>
                          <tr>
                            <td>Confirm Password</td>
                            <td><input type="password" name="confirmPassword"  placeholder="Confirm Password"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                              <input type="hidden" name="idAngajat" value="<?php echo $idAngajat; ?>">
                            <input type="submit" name="submit" value="Change Password" class="btn-warning">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>

<?php

if(isset($_POST['submit']))
{
    $idAngajat=$_POST['idAngajat'];
    $curentPassword=md5($_POST['curentPassword']);
    $newPassword=md5($_POST['newPassword']);
    $confirmPassword=md5($_POST['confirmPassword']);

    $sql="SELECT * FROM angajati WHERE idAngajat=$idAngajat AND password= '$curentPassword'";

    $res= mysqli_query($conn,$sql);

    if($res==true){

        $count=mysqli_num_rows($res);
        if($count==1)
        {
            // echo "User not found";
            if($newPassword==$confirmPassword)
            {
                
                $sql2="UPDATE angajati SET
                password='$newPassword'
                WHERE idAngajat=$idAngajat
                ";
                $res2=mysqli_query($conn,$sql2);
                if($res2==true)
                {
                    
                     $_SESSION['pass-change'] = "<div class='success'>Password changed Susscesfully.</div>";
                    if( ! headers_sent() ){
                        header('location:'.SITEURL.'admin/manage-angajati.php');
                    }else{
                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-angajati.php";</script>';
                    }

                }else
                {
                     $_SESSION['pass-change'] = "<div class='error'>Password not changed.</div>";
                    if( ! headers_sent() ){
                        header('location:'.SITEURL.'admin/manage-angajati.php');
                    }else{
                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-angajati.php";</script>';
                    }

                }



            }else{

                 $_SESSION['pass-not-match'] = "<div class='error'>Password not match.</div>";
                    if( ! headers_sent() ){
                        header('location:'.SITEURL.'admin/manage-angajati.php');
                    }else{
                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-angajati.php";</script>';
                    }

            }



        }else{
              $_SESSION['user-not-found'] = "<div class='error'>User not found.</div>";
                    if( ! headers_sent() ){
                        header('location:'.SITEURL.'admin/manage-angajati.php');
                    }else{
                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-angajati.php";</script>';
                    }
                        }
    }

}

?>
















<?php
include('partials/footer.php');
?>