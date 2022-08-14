

<?php
include('partials/navbar.php');
?>
<!-- aprovizionare si la produse o sa spun stocuri existente -->
<form action="" method="POST">
    <table class="tbl-45 rounded">
         <h1 style="text-align:center">Adauga produse</h1>
         <hr>
         <?php
          if(isset($_GET['idProdus'])){
                    $idComanda=$_GET['idProdus'];
 $sql3 =" SELECT p.idProdus, p.cantitateStoc, s.numarAdProd, p.cantitateStoc + s.numarAdProd as CantitateTotala
FROM produse p 
 JOIN stocuri s on p.idProdus=s.idProdus";
                                $res3=mysqli_query($conn,$sql3);
                                $count3=mysqli_num_rows($res3);

                                if($count3>0){
                                    while($row=mysqli_fetch_assoc($res3))
                                    {
                                        
                                        $idProdus= $row['idProdus'];
                                        $cantitateStoc=$row['cantitateStoc'];
                                         $numarAdProd =$row['numarAdProd'];
                                         $CantitateTotala=$row['CantitateTotala'];
                                      
                                    }
   }
}                           
?>

                <td>Selecteaza un produs:</td>
                <td>
                    <select name="prod" >
                                <?php
                                $sql= "SELECT * FROM produse";
                                $res=mysqli_query($conn,$sql);
                                $count=mysqli_num_rows($res);

                                if($count>0){
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $idProdus= $row['idProdus'];
                                        $numeProdus=$row['numeProdus'];
                                        $cantitateStoc=$row['cantitateStoc'];
                                        ?>
                                        <option value="<?php echo $idProdus; ?> "><?php echo  $numeProdus;  ?></option>

                                        <?php
                                    }
                                }else
                                {
                                    ?>

                                    <option value="0">Produsul nu a fost gasit</option>

                                    <?php
                                }

                                ?>
                    
                            </select>
                    </td>
                    </tr>
                    <tr>
                         <td>Adauga numarul de produse:</td>
                        <td><input type="number" name="numarAdProd" placeholder=""></td>       
                    </tr>
                    <tr>
                        <td>Data Aprovizionare:</td>
                        <td><input type="date" name="dataIntStoc" ></td>
                    </tr>
                  
                               <input type="hidden" name="CantitateTotala" >
                        <input type="hidden" name="cantitateStoc" vlaue= "<?php echo $cantitateStoc;?>">
                        <!-- <input type="hidden" name="numarAdProd" vlaue= ""> -->
                        <input type="hidden" name="idProdus" vlaue= "<?php echo $idProdus;?>">
                <tr>
                            <td colspan="2">
                            <input type="submit" name="submit" value="Adauga Produs" class="btn-primary">
                            </td>
                        </tr>

 <td><input type="hidden" name="idStoc" ></td>

    </table>
</form>
<?php
//  $sql3 =" SELECT p.idProdus, p.cantitateStoc, s.numarAdProd, p.cantitateStoc + s.numarAdProd as CantitateTotala
// FROM produse p 
//  JOIN stocuri s on p.idProdus=s.idProdus";
 


if(isset($_POST['submit']))
{
    $st="STOC";
  $prod =$_POST['prod'];
  $numarAdProd =$_POST['numarAdProd'];
    $idStoc =$_POST['idStoc'];
  $dataIntStoc = date("Y-m-d H:i:s");
//    $idStoc =$st;
while($idStoc==1){
$idStoc =1000;
 $idStoc++;
}
 
 
       $cantitateStoc = ((int)$numarAdProd + (int)$cantitateStoc);
  
  

  //insert in prod


 $sql2 = "INSERT INTO stocuri SET
 idStoc='$idStoc',
 idProdus='$prod',
 numarAdProd='$numarAdProd',
 dataIntStoc='$dataIntStoc'
 ";
 $res2 = mysqli_query($conn,$sql2);

$cantitateStoc = ((int)$cantitateStoc + (int)$numarAdProd);
        
        


 $sql4="UPDATE produse set 
 cantitateStoc = '$cantitateStoc'
 where idProdus='$idProdus'
 
 ";



 $res4 = mysqli_query($conn,$sql4);



                                // $sql= "SELECT * FROM produse where $cantitateStoc+";
                                // $res=mysqli_query($conn,$sql);
                                // $count=mysqli_num_rows($res);

                                // if($count>0){
                                //     while($row=mysqli_fetch_assoc($res))
                                //     {
                                //         $idProdus= $row['idProdus'];
                                //         $numeProdus=$row['numeProdus'];
                                //         $cantitateStoc=$row['cantitateStoc'];
                                     
                                    // }
                                // }


// if($res2==TRUE)
//         {

//         $_SESSION['add-produs'] = "<div class='success'>Produsul a fost adaugat cu success</div>";
//             //     //redirect page 
//                 if( ! headers_sent() ){
//                     header('location:'.SITEURL.'admin/manage-produse.php');
//                 }else{
//                     echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse";</script>';
//                 }
                
                
//             }else{
//                 $_SESSION['add-produs'] = "<div class='error'>Produsul nu a fost adaugat cu success</div>";
//                 //redirect page
//                 if( ! headers_sent() ){
//                     header('location:'.SITEURL.'admin/adauga-produse.php');
//                 }else{
//                     echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-produse";</script>';
//                 }

//             }


}

    ?>