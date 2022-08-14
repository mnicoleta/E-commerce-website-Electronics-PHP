<?php
include('../config/constants.php');

if(isset($_POST['register_btn']))
{
 $numeComplet = mysqli_real_escape_string($conn,$_POST['numeComplet']); 
 $phone = mysqli_real_escape_string($conn,$_POST['phone']);  
 $email = mysqli_real_escape_string($conn,$_POST['email']);  
 $password = mysqli_real_escape_string($conn,sha1($_POST['password']));  
 $password2 = mysqli_real_escape_string($conn,sha1($_POST['password2']));
$user_type = mysqli_real_escape_string($conn,$_POST['user_type']); 
 
 //verific daca email ul exista deja 
 $check_email_query="SELECT email FROM users WHERE email='$email'";
 $check_email_query_run=mysqli_query($conn,$check_email_query);
 if(mysqli_num_rows($check_email_query_run) > 0)
 {
     $_SESSION['message'] = "<div class='error'>Emai ul exista deja, logheaza-te!</div>";
        //redirect page
        if( ! headers_sent() ){
             header('location:'.SITEURL.'Login.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/Login.php";</script>';
        }
 }
 else if($password == $password2)
    {
        $insert_query="INSERT INTO users (numeComplet,phone,email,password) VALUES ('$numeComplet','$phone','$email','$password','$user_type')";
        $insert_query_run=mysqli_query($conn,$insert_query);

                if($insert_query_run)
                {
                    $_SESSION['message'] = "Registered Succesfull";
                    if( ! headers_sent() ){
                    
                        header('location:'.SITEURL.'Login.php');
                    }else{
                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/Login.php";</script>';
                    }
                    
                    
                }
                else
                {
                    $_SESSION['message'] = "<div class='error'>Registered not success</div>";
                    //redirect page
                    if( ! headers_sent() )
                    {
                        header('location:'.SITEURL.'registration.php');
                    }else
                    {
                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/registration.php";</script>';
                    }

                }
                    
        }else
        {
                    $_SESSION['message'] = "<div class='error'>Pass not match</div>";
                        //redirect page
                        if( ! headers_sent() ){
                            header('location:'.SITEURL.'registration.php');
                        }else{
                            echo '<script type="text/javascript">window.location.href="http://localhost/Management/registration.php";</script>';
                        }
        }
}

else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $login_query = "SELECT * from users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] =true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['numeComplet'];
        $useremail = $userdata['email'];
        
        $_SESSION['auth_user'] = [
            'numeComplet' => $username,
            'email' => $useremail
        ];
         $_SESSION['message'] = "Login Succesfully";
                    if( ! headers_sent() )
                    {
                    
                        header('location:'.SITEURL.'index.php');
                    }else
                    {
                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/index.php";</script>';
                    }
    }else
    {
         $_SESSION['message'] = "<div class='error'>Invalid Credentials</div>";
        //redirect page
        if( ! headers_sent() )
        {
             header('location:'.SITEURL.'Login.php');
        }else
        {
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/Login.php";</script>';
        }
    }
}

?>