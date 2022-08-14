<?php
include('partials/navbar.php');
?>
    <div class="main-content">
        <div class="wrapper">         
                
            <br><br><br>
            <h1 style="text-align:center">Adauga Autovehicule</h1>
            <br><br><br>

              <form action="" method="POST" >
                    <table class="tbl-45">
                        <tr>
                            <td> Marca Masinii: </td>
                            <td><input type="text" name="marca" placeholder="Marca"></td>
                        </tr>
                          <tr>
                            <td>Numar Inmatriculare:</td>
                            <td><input type="text" name="numar" placeholder="Numar"></td>
                        </tr>
                        <tr>
                            <td>Alege Numele Soferului: </td>
                            <td>

                                <select name="angajat">
                                    <?php
                                    $sql="SELECT *FROM angajati";
                                    $res=mysqli_query($conn,$sql);
                                    $count=mysqli_num_rows($res);
                                    if($count>0){
                                        while($row=mysqli_fetch_assoc($res)){
                                            $idAngajat=$row['idAngajat'];
                                            $numeAngajat=$row['numeAngajat'];
                                            $prenumeAngajat=$row['prenumeAngajat'];

                                            ?>
                                                 <option value="<?php echo $idAngajat; ?> "><?php echo  $numeAngajat.' '.$prenumeAngajat ;  ?></option>
                                            <?php
                                        }
                                    }else{
                                        echo "Angajatii nu exista";
                                    }

                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" name="submit" value="Adauga Autovehicul" class="btn-primary">
                            </td>
                        </tr>
                    </table>
                </form>

</div>
</div>

<?php

if(isset($_POST['submit'])){

$marca =$_POST['marca'];
$numar = $_POST['numar'];
$angajat=$_POST['angajat'];


$sql1="INSERT INTO autovehicul SET
marca='$marca',
numar='$numar',
idAngajat='$angajat'
";
$res1=mysqli_query($conn,$sql1);
if($res1==TRUE)
{
    
        $_SESSION['add-autovehicul'] = "<div class='success mx-4'>Autovehicul added successfully</div>";
            //redirect 
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/manage-autovehicule.php');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-autovehicule";</script>';
                }
                
                
            }else{
                $_SESSION['add-autovehicul'] = "<div class='error'>Autovehicul not added successfully</div>";
                //redirect page
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/manage-autovehicule.php');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-autovehicule";</script>';
                }
}



}





?>








<?php
include('partials/footer.php');
?>