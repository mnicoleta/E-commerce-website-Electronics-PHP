<?php
include('partials/navbar.php');
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




 <div class="main-content">
            <div class="wrapper">
              
                
<br><br>
                <form action="" method="POST"  class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(5, 20, 34, 0.874), 0 6px 20px 0 rgba(37, 32, 32, 0.951);" >
                    <table class="tbl-45 rounded">
                              <h1 style="text-align:center">Adauga Comenzi</h1>
                              <hr>
                        <tr>
                            <td> Denumire Proodus:</td>
                            <td><input type="text" name="numeFirmaCl" placeholder="Nume Produs"></td>
                        </tr>
                          <tr>
                            <td>Detalii Produs:</td>
                            <td><input type="text" name="CUI" placeholder="Descriere"></td>
                        </tr>
                          <tr>
                            <td>UM:</td>
                            <td><input type="text" name="numeCl" placeholder="UM"></td>
                        </tr>
                        <tr>
                             <tr>
                            <td>Introduceti Cantitatea:</td>
                            <td><input type="text" name="telefonCl" ></td>
                        </tr>
                          <tr>
                            <td>Pret Achizitie(lei):</td>
                            <td><input type="text" name="emailCl" placeholder=""></td>
                        </tr>
                        <tr>
                             <tr>
                            <td>Data Achizitie:</td>
                            <td><input type="date" name="orasCl" ></td>
                        </tr>
                        <tr>
                        
                            <td>Pret Vanzare:</td>
                            <td><input type="number" name="stradaCl" placeholder=""></td>
                        </tr>
        
                        <tr>
                            <td>Status:</td>
                            <td>
                                <input type="radio" name="activ" value="Activ">Activ
                                <input type="radio" name="activ" value="Inactiv">Inactiv
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" name="submit" value="Adauga Produs" class="btn-primary">
                            </td>
                        </tr>
                            <a href="manage-admin.php" class="btn btn-primary  px-4 py-2 mx-5" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
                </form>
            </div>
        </div>


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
idComanda='$idComanda' 
";

 $res6 = mysqli_query($conn,$sql6);



// }else{
//      $_SESSION['cant'] = "<div class='error'>Cantitatea dorita nu este disponibila in stoc</div>";
//       header('location:'.SITEURL.'detail-Prod.php');
    
// }

// if($_POST['submit']==true){

//      $_SESSION['confirmare'] = "
//     <div class=' shadow border border-success px-1 mx-4 my-3 py-4 w-50 ' style=' ' > 
//         <div class='card-body'> 
//             <h1 class='card-title'>Comanda cu numarul $idComanda fost trimisa</h1> 
//         <table class='text-light'>
//                 <tr>Produs: $numeProdus  </tr><br>
//                 <tr>Status Comanda: $statusComanda  </tr><br>
//                 <tr>Cantitate: $cantitate  </tr><br>
//                 <tr>Pret pe produs: $pretVanzare lei </tr><br>
//                 <tr>Total Plata: $pretTotalComanda  lei </tr><br>
//                 <tr>Data Comenzii: $dataComanda</tr><br>
//                 <tr>Veti primi co confirmare pe email-ul: $emailCl</tr><br>
               
                
//         </table>
//      </div>
//     </div>";
//        if( ! headers_sent() ){
//             header('location:'.SITEURL.'index.php');
//         }else{
//             echo '<script type="text/javascript">window.location.href="http://localhost/Management/index.php";</script>';
//         }
// }else{
//  $_SESSION['confirmare'] = "<div class='error'>Comanda a esuat</div>";
//   if( ! headers_sent() ){
//             header('location:'.SITEURL.'index.php');
//         }else{
//             echo '<script type="text/javascript">window.location.href="http://localhost/Management/index.php";</script>';
//         }
}

}








include('partials/footer.php');
?>


