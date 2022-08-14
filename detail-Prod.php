<?php
 include('partials-front/nav-bar.php');
 
$idProdus= "";
 
if(isset($_GET["idProdus"])){


    $idProdus=$_GET["idProdus"];


    

}else{
    header('location:'.SITEURL);
}
$idClient="";
if(isset($_POST['idClient'])){
    $idClient=$_POST["idClient"];
}

$idComanda="";
if(isset($_POST['idComanda'])){
    $idComanda=$_POST["idComanda"];
}
$idAngajat="";
if(isset($_POST['idAngajat'])){
    $idAngajat=$_POST["idAngajat"];
}
// $sql="SELECT c.numeCategorie FROM produse p JOIN categorii c ON p.idCategorie=c.idCategorie where idProdus=$idProdus ";
 
//  $result = mysqli_query($conn,$sql);
//     $count = mysqli_num_rows($result);
//   if($count > 0)
//                 {

//                    while($row1=mysqli_fetch_assoc($result))
//                     {
                        
//                         $numeCategorie=$row1['numeCategorie'];

       
//                     }
//                 
 
                   
//                 }
                
// 
$sqlAng="SELECT * FROM angajati ";
$resAng=mysqli_query($conn,$sqlAng);
$countAng = mysqli_num_rows($resAng);
        if($count>0){
            while($row=mysqli_fetch_assoc($resAng)){
  $idAngajat=$row['idAngajat'];
  $numeAngajat=$row['numeAngajat'];
  $prenumeAngajat=$row['prenumeAngajat'];

            }}

?>


<div class="containter">
        <h2 class="mx-5 mt-3">Detalii produs </h2>
  
       <?php
                        if(isset($_SESSION['cant'])){
                            echo $_SESSION['cant'];
                            unset($_SESSION['cant']);
                        }


                ?>

 <?php

        $sql1="SELECT * from produse WHERE idProdus=$idProdus";
        $result1 = mysqli_query($conn,$sql1);
        $count = mysqli_num_rows($result1);
        if($count>0){
            while($row=mysqli_fetch_assoc($result1)){
                        $idProdus=$row['idProdus'];
                        $imgProd = $row['imgProd'];
                        $numeProdus=$row['numeProdus']; 
                        $pretVanzare=$row['pretVanzare'];
                        $cantitateStoc=$row['cantitateStoc'];
                        $specificatiiProdus=$row['specificatiiProdus'];
            }
        }

?>


       <?php   
               
           
                                if($imgProd==""){
                                echo "<div class='error'>Imaginea nu este disponibila </div>";
                                }else{
                       ?>
                            <div class="row mb-5 mx-5">
                                <div class="col-md-5 ">
                            <img src="<?php echo SITEURL; ?>Images/produse/<?php echo $imgProd; ?>" style ="width:500px; height:400px"/>
 
                        <?php

                                    }
                                     ?>
                                </div>
                               
            <div class="col-md-7  p-3" style=" border: 1px dotted #bbb; box-shadow: 10px 20px 10px 10px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                <form action="" method="POST">
                                        
                        <h4 style=color:#222f3e; width:80%;><?php echo $numeProdus; ?> <span style=" color:green; " class="font-weight-light">( <?php echo   $cantitateStoc; ?> produse disponibile )</span>  </h4>
                    <h4 class="prod-preice text-warning" style="color:#ee5253; width:80%;">Pret: <?php echo $pretVanzare; ?>  lei</h4>
                    
                    <?php


?>
                                          <?php
                                                if( $cantitateStoc==0)
                                                {

                                                        echo '<h6 style="color:red">Stoc Indisponibil</h6>';

                                                }else
                                                {
                                                        echo '<h4 style="color:green">Stoc Disponibil</h4>';
                                                        echo '<h4 class="py-3 text-secondary">Introduceti cantitatea:</h4>';
                                                        echo '<input type="number" class="form-control"  style=" padding:1% 0%;" name="cantitate" min="1" max="'. $cantitateStoc.'" aria-describedby="helpId" required>';
                                            
                                                }?>
                                          <?php

                                          
                                            ?>
                                        <h4 class="py-3 text-secondary">Specificatii: <span class="px-2 font-weight-light "><?php echo $specificatiiProdus; ?></span>  </h4>
                                              <hr>
                                        <h3 class="text-center pt-3" style="color:#222f3e;">Completati formularul pentru a plasa o comanda</h3>
<br><br>
                                        
                                        
                                        <label>Nume Companie</label>
                                        <input type="text" name="numeFirmaCl" class="form-control my-2" placeholder="Introduceti numele Companiei" autocomplete="off" required>
                                         <label>CUI</label>
                                        <input type="text" name="CUI" class="form-control my-2" placeholder="Introduceti numele Companiei" autocomplete="off" required>
                                        <label>Nume Contact</label>
                                        <input type="text" name="numeCl" class="form-control my-2" placeholder="Introduceti numele de contact" autocomplete="off" required>
                                        <label>Telefon:</label>
                                        <input type="tel" name="telefonCl" class="form-control my-2" placeholder="0784551245" autocomplete="off" required>
                                        <label>Email</label>
                                          <input type="email" name="emailCl" class="form-control my-2" placeholder="popescu@yahoo.com" autocomplete="off" required>
                                        <label>Oras</label>
                                        <input type="text" name="orasCl" class="form-control my-2" placeholder="Oras" autocomplete="off"  required>
                                        <label>Strada</label>
                                        <input type="text" name="stradaCl" class="form-control my-2" placeholder="Strada" autocomplete="off"  required>
                                        <label>Numar Strada</label>
                                        <input type="text" name="numarStradaCl" class="form-control my-2" placeholder="Numar strada" autocomplete="off"  required>
                                        <label>Cod Postal</label>
                                        <input type="text" name="codPostalCl" class="form-control my-2" placeholder="Cod Postal" autocomplete="off"  required>
                                        <input type="submit" name="submit" class="btn btn-outline-success mt-4" value="Trimite Comanda">
                                       <input type="hidden" name="idComanda" value="<?php echo $idComanda; ?> " class="form-control my-2" placeholder="Numar strada" autocomplete="off"  required>
                                       <input type="hidden" name="idProdus" value="<?php echo $idProdus; ?> " class="form-control my-2" placeholder="Numar strada" autocomplete="off"  required> 
                                       <input type="hidden" name="idClient" vlaue= "<?php echo $idClient;?>">
                                          <input type="hidden" name="idAngajat" vlaue= "<?php echo $idAngajat;?>">       
                                        <input type="hidden" name="pretVanzare" vlaue= "<?php echo $pretVanzare;?>">
                                        <input type="hidden" name="dataFact" >
                                      
                                       
                                          
  
                                            <!-- <button onclick="displayResult()" class="btn btn-light btn-specif px-3 "  style='color:black;width; float:left; border: 3px solid rgb(100,150,47, 0.5); border-radius:10px;' >Vezi mai multe informatii <i class="fa fa-hand-o-left" aria-hidden="true"></i></button>
                                            <h1 id="myHeader"></h1>               

                                                <script>
                                                function displayResult() {
                                                document.getElementById("myHeader").innerHTML = "<p class='prod-spef'  style='color:black;width:80%;  '><?php  ?></p>";
                                                }
                                                </script> -->

                                            </form>
     
                                            
                
<?php


if(isset($_POST['submit'])){
//clienti
$numeFirmaCl=$_POST['numeFirmaCl'];
$CUI=$_POST['CUI'];
$numeCl=$_POST['numeCl'];
$telefonCl=$_POST['telefonCl'];
$emailCl=$_POST['emailCl'];
$orasCl=$_POST['orasCl'];
$stradaCl=$_POST['stradaCl'];
$numarStradaCl=$_POST['numarStradaCl'];
$codPostalCl=$_POST['codPostalCl'];
$idAngajat=$idAngajat;
//comanda

$dataComanda= date("Y-m-d H:i:s");
$statusComanda = "Comanda Plasata";

//detalii comanda
// $pretVanzare=$_POST['pretVanzare'];
$cantitate = $_POST['cantitate'];
$pretTotalComanda = ((int)$pretVanzare * (int)$cantitate);

//aviz







               
            if(isset($cantitate) >= isset($cantitateStoc)){

// inserez clientii

$sql2= "INSERT INTO clienti SET
numeFirmaCl='$numeFirmaCl',
CUI='$CUI',
numeCl='$numeCl',
telefonCl='$telefonCl',
emailCl='$emailCl',
orasCl='$orasCl',
stradaCl='$stradaCl',
numarStradaCl='$numarStradaCl',
codPostalCl='$codPostalCl'

";

// echo $sql2; die();
$res2 = mysqli_query($conn,$sql2);

// afisez codul clientului

 $sqlC="SELECT idClient from clienti";
   $result = mysqli_query($conn,$sqlC);
        $count1= mysqli_num_rows($result);
        if($count1>0){
            while($row=mysqli_fetch_assoc($result)){
                       $idClient=$row['idClient'];
            }
        }   
 
    //    inserez in comenzi

$sql3= "INSERT INTO comenzi SET
idClient='$idClient',
dataComanda='$dataComanda',
statusComanda='$statusComanda',
idAngajat='$idAngajat'

";
// echo $sql3; die();
$res3 = mysqli_query($conn,$sql3);

// inesrez in detalii comenzi

 $sqlCom="SELECT idComanda from comenzi";
   $resultCom = mysqli_query($conn,$sqlCom);
        $countCom= mysqli_num_rows($resultCom);
        if($countCom>0){
            while($row=mysqli_fetch_assoc($resultCom)){
                       $idComanda=$row['idComanda'];
            }
        }  


$sql4= "INSERT INTO detaliicomenzi SET
idProdus='$idProdus',
idComanda='$idComanda',
pretTotalComanda='$pretTotalComanda',
cantitate='$cantitate'

";
 $res4 = mysqli_query($conn,$sql4);
//  echo $sql4; die();

$sql5= "INSERT INTO avizexpeditie SET
idComanda='$idComanda'


";

 $res5 = mysqli_query($conn,$sql5);
//  echo $sql4; die();

$sql6= "INSERT INTO facturi SET
idComanda='$idComanda',
dataFact='$dataComanda' 
";

 $res6 = mysqli_query($conn,$sql6);



}else{
     $_SESSION['cant'] = "<div class='error'>Cantitatea dorita nu este disponibila in stoc</div>";
      header('location:'.SITEURL.'detail-Prod.php');
    
}

if($_POST['submit']==true){

     $_SESSION['confirmare'] = "
    <div class=' shadow border border-success px-1 mx-4 my-3 py-4 w-50 ' style=' ' > 
        <div class='card-body'> 
            <h1 class='card-title'>Comanda cu numarul $idComanda fost trimisa</h1> 
        <table class='text-light'>
                <tr>Produs: $numeProdus  </tr><br>
                <tr>Status Comanda: $statusComanda  </tr><br>
                <tr>Cantitate: $cantitate  </tr><br>
                <tr>Pret pe produs: $pretVanzare lei </tr><br>
                <tr>Total Plata: $pretTotalComanda  lei </tr><br>
                <tr>Data Comenzii: $dataComanda</tr><br>
                <tr>Veti primi co confirmare pe email-ul: $emailCl</tr><br>
               
                
        </table>
     </div>
    </div>";
       if( ! headers_sent() ){
            header('location:'.SITEURL.'index.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/index.php";</script>';
        }
}else{
 $_SESSION['confirmare'] = "<div class='error'>Comanda a esuat</div>";
  if( ! headers_sent() ){
            header('location:'.SITEURL.'index.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/index.php";</script>';
        }
}

}

?>


        </div>
        </div>
      

    

    </div>





