<?php
include('partials/navbar.php');
?>
 <div class="main-content">
            <div class="wrapper">
                <br><br><br>
                <h1 style="text-align:center">Update Furnizor</h1>
                <br><br>
                    <?php
                        if(isset($_SESSION['update-produs']))
                            {
                                echo $_SESSION['update-produs'];
                                unset($_SESSION['update-produs']);
                            }     


                    ?>
                    <?php
                    //1. get the id of selected admin 
                    $idProdus=$_GET['idProdus'];

                    //2.create sql query 
                    $sql="SELECT * FROM produse WHERE idProdus=$idProdus";
                    $res=mysqli_query($conn,$sql);

                    //check if the query is executed or not
                    if($res==true){
                        $count= mysqli_num_rows($res);
                        if($count==1)
                        {
                            //echo "admin aviable";
                            $row=mysqli_fetch_assoc($res);

                          
                           
                            $cantitateStoc=$row['cantitateStoc'];


                        }else
                        {
                             if( ! headers_sent() ){
                                        header('location:'.SITEURL.'admin/manage-produse.php');
                                    }else{
                                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse";</script>';
                                    }
                        }

                    }

                                
                    ?>
<br><br>
                <form action="" method="POST">
                    <table class="tbl-45">
                          
                        <tr>
                             <tr>
                            <td>Introduceti Cantitatea:</td>
                            <td><input type="text" name="cantitateStoc" value="<?php echo $cantitateStoc; ?>" ></td>
                        </tr>
                       
                        
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="idProdus" value="<?php echo $idProdus;  ?>">
                            <input type="submit" name="submit" value="Update Produs" class="btn-primary">
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
                $idProdus=$_POST['idProdus'];
        
                $cantitateStoc=$_POST['SUM(cantitateStoc)'];


    $sql3="INSERT INTO produse SET 
    cantitateStoc ='$cantitateStoc'
    WHERE idProdus='$idProdus'

    ";

    $res3= mysqli_query($conn,$sql3);
    if($res3==true)
    {
        $_SESSION['update-produs'] = "<div class='success'>Produs Updated Succesfully.</div>";

        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-produse.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse";</script>';
        }

    }else
    {
         $_SESSION['update-produs'] = "<div class='error'>Produs not Updated Succesfully.</div>";

        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/adauga-produse.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-produse";</script>';
        }
}
}
?>





<?php
include('partials/footer.php');
?>