<?php
include('partials/navbar.php');
?>
 <div class="main-content">
            <div class="wrapper">
              
             
           

                    <?php
                    

 if(isset($_GET['idComanda'])){
                    $idComanda=$_GET['idComanda'];


                $sql = "SELECT cl.idClient, com.idComanda, com.idAngajat, p.idProdus, cl.numeFirmaCl, cl.numeCl, p.cantitateStoc,
                cl.stradaCl, cl.numarStradaCl, cl.orasCl, cl.codPostalCl, cl.telefonCl, cl.emailCl,
                 com.dataComanda, com.statusComanda, cl.CUI,
                dc.pretTotalComanda, dc.cantitate, dc.idDetaliiComanda,
                 p.numeProdus, p.pretVanzare
                FROM clienti cl
                left JOIN comenzi com ON cl.idClient=com.idClient
                 left JOIN detaliicomenzi dc ON dc.idComanda = com.idComanda
                 left JOIN produse p ON p.idProdus = dc.idProdus
                 

                where dc.idComanda=$idComanda
                  AND cl.idCLient=com.idClient
                  AND  p.idProdus=dc.idProdus
                  

                 ";
           
             
                    $res = mysqli_query($conn,$sql);
   
           if($res==true){
                        $count=mysqli_num_rows($res);
                           
                         $sn=1;
                           if($count==1)
                           {
                            while($row=mysqli_fetch_assoc($res))
                {
              
                            
                            $idDetaliiComanda= $row['idDetaliiComanda'];
                            $idClient=$row['idClient'];
                            $idComanda=$row['idComanda'];
                           $idProdus=$row['idProdus'];
                           $numeProdus= $row['numeProdus'];
              
                          
                            $pretVanzare=$row['pretVanzare'];
                                  $cantitateCurenta=$row['cantitate'];
                            $pretTotalComanda=$row['pretTotalComanda'];
                              $dataComanda=$row['dataComanda'];
                            $statusComanda=$row['statusComanda'];
                              $numeFirmaCl=$row['numeFirmaCl'];
                            $numeCl=$row['numeCl'];
                             $telefonCl=$row['telefonCl'];
                                $emailCl=$row['emailCl'];
                             $cantitateStoc=$row['cantitateStoc'];
                             $orasCl=$row['orasCl'];
                             $stradaCl=$row['stradaCl'];
                            $numarStradaCl=$row['numarStradaCl'];
                              $codPostalCl=$row['codPostalCl'];

                              $idAngajatCurent=$row['idAngajat'];



                }

                   

                            }



                            }





     }
         
                        ?>  


<br><br>
                <form action="" method="POST" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(158, 201, 236, 0.874), 0 6px 20px 0 rgba(255, 241, 241, 0.951);" >
   
                    <table class="tbl-45 mx-4 rounded">

                    <h1 style="text-align:center;">Modificați Comanda</h1>
                  <hr>
                        <tr>
                            <td>IdComanda:</td>
                            <td>
                              <?php echo $idComanda;  ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Id Angajat:</td>
                            <td>
                              <?php echo $idAngajat;  ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Id Produs:</td>
                            <td>
                              <?php echo $idProdus;  ?>
                            </td>
                        </tr>
                          <tr>
                            <td>Nume Produs:</td>
                            
                            <td><?php echo   $numeProdus; ?></td>
                        </tr>
                          <tr>
                            <td>Pret:</td>
                            <td><?php echo $pretVanzare;   ?></td>
                        </tr>
                          <tr>
                            <td>Cantitate Curenta:</td>
                            <td><?php echo $cantitateCurenta;  ?></td>
                        </tr>
                        <tr>
                            <td>Modificati Cantitatea:</td>
                          
                            <td><input  class="py-1 my-1  " type="number" name="cantitate" max="<?php echo $cantitateStoc; ?> " min="1" placeholder="Cantaitate disponibila in stoc  <?php echo $cantitateStoc; ?> "></td>
                         
                        </tr>
                        <tr>
                            <td>Pret Total:</td>
                           <td><?php echo $pretTotalComanda; ?></td>
                        </tr>
                        <tr>
                            <td>Data Comanda:</td>
                            <td><?php echo $dataComanda;  ?></td>
                        </tr>
                        
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select name="statusComanda">
                                    <option <?php if($statusComanda=="Comanda Plasata"){ echo "selected";}  ?> value="Comanda Plasata">Comanda Plasata</option>
                                    <option <?php if($statusComanda=="In curs de livrare"){ echo "selected";}  ?> value="In curs de livrare">In curs de livrare</option>
                                    <option <?php if($statusComanda=="Livrata"){ echo "selected";}  ?> value="Livrata">Livrata</option>
                                    <option <?php if($statusComanda=="Anulata"){ echo "selected";}  ?> value="Anulata">Anulata</option>
                                </select>

                            </td>
                                
                        </tr>
                         <tr>
                            <td>Angajat:</td>
                            <td>
                                <select name="numeAngajat">
                                
                  <?php

                      //se iau datele din tabela category
                      $sqlAng="SELECT a.idAngajat, a.numeAngajat, a.prenumeAngajat, a.rol FROM angajati a
left JOIN comenzi com ON com.idAngajat=a.idAngajat
WHere com.idAngajat=a.idAngajat";
                    $resAng=mysqli_query($conn,$sqlAng);

 if($resAng==true){
                        $countAng=mysqli_num_rows($resAng);
                           
                         
                           if($countAng>0)
                           {
                            while($row=mysqli_fetch_assoc($resAng))
                {


              
  $idAngajat=$row['idAngajat'];
  $numeAngajat=$row['numeAngajat'];
  $prenumeAngajat=$row['prenumeAngajat'];





                }
            }
        }
                        
                        

                    ?>
                         <option <?php if($idAngajatCurent==$idAngajat){echo "selected";}?> value="<?php echo $idAngajat;  ?>"><?php echo $numeAngajat.''.$prenumeAngajat; ?></option>

                   
                       
              
                              </select>
                        

                            </td>
                                
                        </tr>
                        <tr>
                            <td>Nume Firma:</td>
                            <td><input type="text" name="numeFirmaCl" value="<?php echo $numeFirmaCl;?>" placeholder="Nume Firma."></td>
                        </tr>
                        <tr>
                            <td>Persoana Contact:</td>
                            <td><input type="text" name="numeCl" value="<?php echo $numeCl;?>" placeholder="Nume Contact.."></td>
                        </tr>
                        <tr>
                            <td>Numar de Telefon:</td>
                            <td><input type="text" name="telefonCl" value="<?php echo $telefonCl;?>" placeholder="telefon.."></td>
                        </tr>
                         <tr>
                            <td>Numar de Telefon:</td>
                            <td><input type="email" name="emailCl" value="<?php echo $emailCl;?>" placeholder="email.."></td>
                        </tr>
                        <tr>
                            <td>Oras:</td>
                            <td>
                                <input type="text" name="orasCl" value="<?php echo $orasCl;?>"  placeholder="Oras.." >
                            </td>    
                        </tr>
                        <tr>
                            <td>Strada</td>
                            <td>
                                <input type="text" name="stradaCl" value="<?php echo $stradaCl;?>" placeholder="Strada">
                            </td>
                        </tr>
                        <tr>
                            <td>Numar Strada</td>
                            <td>
                                <input type="text" name="numarStradaCl" value="<?php echo $numarStradaCl;?>" placeholder="numar">
                            </td>
                        </tr>
                        <tr>
                            <td>Cod Postal</td>
                            <td>
                                <input type="text" name="codPostalCl" value="<?php echo $codPostalCl;?>" placeholder="cod postal...">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="hidden" name="idComanda" value="<?php echo $idComanda;  ?> ">
                            <input type="hidden" name="idClient" value="<?php echo $idClient;  ?> ">
                             <input type="hidden" name="idDetaliiComanda" value="<?php echo $idDetaliiComanda;  ?> ">
                             <input type="hidden" name="pretVanzare" value="<?php echo $pretVanzare;  ?> " class="btn-primary">  <br> 
                            <input type="submit" name="submit" value="Modifică Comanda " class="btn-primary" style="cursor: pointer;">
                            <input type="hidden" name="pretTotalComanda" >  <br> 
                            <input type="hidden" name="idAngajat" value="<?php echo $idAngajat;  ?>"><br>
                        </td>
                        </tr>
                         <a href="manage-comenzi.php" class="btn btn-primary px-4 py-1 mx-4 my-4" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
                    <?php


?>
                </form>

     
        <?php
                    if(isset($_POST['submit']))
                    {
                        $numeFirmaCl=$_POST['numeFirmaCl'];
                        $CUI=$_POST['CUI'];
                        $numeCl=$_POST['numeCl'];
                        $telefonCl=$_POST['telefonCl'];
                        $emailCl=$_POST['emailCl'];
                        $orasCl=$_POST['orasCl'];
                        $stradaCl=$_POST['stradaCl'];
                        $numarStradaCl=$_POST['numarStradaCl'];
                        $codPostalCl=$_POST['codPostalCl'];
                        $idClient=$_POST['idClient'];
                         $idDetaliiComanda=$_POST['idDetaliiComanda'];
                        //comanda

                        
                        $statusComanda = $_POST['statusComanda'];

                        //detalii comanda
                        // $pretVanzare=$_POST['pretVanzare'];
                        $cantitate = $_POST['cantitate'];
                        $cantitate = $_POST['cantitate'];
                         $pretTotalComanda = ((int)$pretVanzare * (int)$cantitateCurenta);

                            if($cantitate < $cantitateStoc){

                        $cantitate= ((int)$cantitateCurenta + (int)$cantitate );
                        
                  
                        }else{
                            echo "Introduceti cantitatea disponibila in stoc";
                        }
                        

                         $pretTotalComanda = ((int)$pretVanzare * (int)$cantitate);



                    $sqlUpdate = "UPDATE clienti cl
                                JOIN comenzi com ON com.idClient = cl.idClient
                                set 
                                numeFirmaCl='$numeFirmaCl',
                                CUI='$CUI',
                                numeCl='$numeCl',
                                telefonCl='$telefonCl',
                                emailCl='$emailCl',
                                orasCl='$orasCl',
                                stradaCl='$stradaCl',
                                numarStradaCl='$numarStradaCl',
                                codPostalCl='$codPostalCl'
                                where
                               idComanda=$idComanda";
                                $resUpdate = mysqli_query($conn,$sqlUpdate);

                    $sqlUpdate1 = "UPDATE comenzi                        
                                    SET 
                                        statusComanda='$statusComanda',
                                        dataComanda='$dataComanda'
                                    WHERE
                                        idComanda=$idComanda";

                            $resUpdate1 = mysqli_query($conn,$sqlUpdate1);


                    $sqlUpdate3="UPDATE detaliicomenzi SET 
                    cantitate='$cantitate',
                    pretTotalComanda='$pretTotalComanda'
                     where idDetaliiComanda=$idDetaliiComanda ";

                    $resUpdate3 = mysqli_query($conn,$sqlUpdate3);



   
    if($resUpdate==true ){
        if($sqlUpdate1==true){
            if($sqlUpdate3==true){
               $_SESSION['update-comenzi'] = "<div class='success'>Comanda a fost modificata cu succes</div>";

                    if( ! headers_sent() )
                    {
                        header('location:'.SITEURL.'admin/manage-comenzi.php');
                    }else{
                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-comenzi";</script>';
                    } 
                    
                   
            
        }
    }
   
   }else{
     $_SESSION['update-comenzi'] = "<div class='error'>Comanda nu a fost modificata</div>";

                    if( ! headers_sent() ){
                        header('location:'.SITEURL.'admin/manage-comenzi.php');
                    }else{
                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-comenzi";</script>';
                    } 
   }
                   
}
        ?>


            </div>
        </div>






<?php
include('partials/footer.php');
?>