<?php
require_once('partials/navbar.php');
require_once('partials/navSub1.php');

?>
<div class="container-fluid main-content pb-4">
  <div class="wrapper">
        
     <div class="btn-group btn-group-lg btn-center1 " >
        <h2 class="text-success  px-5" >Toate comenzile </h2>
    </div>
       
    </div>

<?php
                        if(isset($_SESSION['update-comenzi'])){
                            echo $_SESSION['update-comenzi'];
                            unset($_SESSION['update-comenzi']);
                        }


                ?>


    <br>
<div class="container mx-1 my-4 px-3">
<table class="table table-sm table-striped table-bordered rounded bg-light " style=" position:relative ;left:-50px;" >
 <thead>
    <tr  class="w-100">
        <th scope="col">Nr.</th>
        <th scope="col">Actiuni</th> 
        <th scope="col">ID Comanda</th>
        <th scope="col">ID Produs</th>
        <th scope="col">Produs</th>
        <th scope="col">Pret</th>
        <th scope="col">Cantitate</th>
        <th scope="col">Total</th>
        <th scope="col">Firma</th>
        <th scope="col">Status</th>
          <th scope="col">Data Comanda</th>
        <th scope="col">Telefon</th>
        <th scope="col">Persona Contact</th>
         <th scope="col">Email</th>
        <th scope="col">Adresa</th>
        
      
        
      
    </tr>
  </thead>
            <?php
                $sql = "SELECT cl.idClient, com.idComanda,p.idProdus, cl.numeFirmaCl, cl.numeCl, cl.stradaCl, cl.numarStradaCl, cl.orasCl, cl.codPostalCl, cl.telefonCl, cl.emailCl,
                 com.dataComanda, com.statusComanda, cl.CUI,
                  dc.pretTotalComanda, dc.cantitate, 
                  p.numeProdus, p.pretVanzare 
                  FROM clienti cl 
                  JOIN comenzi com ON cl.idClient=com.idClient
                   JOIN detaliicomenzi dc ON dc.idComanda = com.idComanda 
                   JOIN produse p ON p.idProdus = dc.idProdus 
                ORDER BY idComanda, numeProdus ASC 

                 ";
                    $res = mysqli_query($conn,$sql);
        if($res==TRUE)
             {
                        $count=mysqli_num_rows($res);
                         $sn=1;
                           if($count>0){
                while($row=mysqli_fetch_assoc($res))
                {
                            $idComanda=$row['idComanda'];
                            $idProdus=$row['idProdus'];
                            $numeProdus=$row['numeProdus'];
                            $pretVanzare=$row['pretVanzare'];
                              $cantitate=$row['cantitate'];
                            $pretTotalComanda=$row['pretTotalComanda'];
                              $dataComanda=$row['dataComanda'];
                            $statusComanda=$row['statusComanda'];
                              $numeFirmaCl=$row['numeFirmaCl'];
                            $numeCl=$row['numeCl'];
                             $telefonCl=$row['telefonCl'];
                             $emailCl=$row['emailCl'];
                             $orasCl=$row['orasCl'];
                             $stradaCl=$row['stradaCl'];
                            $numarStradaCl=$row['numarStradaCl'];
                              $codPostalCl=$row['codPostalCl'];
                     
            ?>
    <tbody id="myTable">
            <tr class="w-100" >
            <th scope="row"><?php echo $sn++;  ?></th> 
            <th>
                    <div class="button">
                        
                    <a href="<?php echo SITEURL ?>admin/update-comanda.php?idComanda=<?php echo $idComanda;?>" class="btn btn-success py-2 mb-1 px-4"><i class="fa fa-pencil-square-o"></i></a>
                    
                  
                    </div>
            </th>
            <th><?php echo $idComanda; ?></th> 
            <th><?php echo $idProdus; ?></th>     
            <th><?php echo $numeProdus; ?></th>
            <th><?php echo $pretVanzare; ?></th>
            <th><?php echo $cantitate; ?></th>
            <th><?php echo $pretTotalComanda; ?></th>
            <th><?php echo $numeFirmaCl; ?></th>
            

            <th>
              <?php 

              if( $statusComanda=="Comanda Plasata"){
                echo "<label>$statusComanda</label>";
              }elseif($statusComanda=="In curs de livrare"){
                 echo "<label style='color:orange'>$statusComanda</label>";
              }elseif($statusComanda=="Livrata"){
                 echo "<label style='color:green'>$statusComanda</label>";
              }elseif($statusComanda=="Anulata"){
                 echo "<label style='color:red'>$statusComanda</label>";
              }
              ?>
            </th>
             <th><?php echo $dataComanda; ?></th>

            <th><?php echo $telefonCl; ?></th>
              <th><?php echo $numeCl; ?></th>
            <th><?php echo $emailCl; ?></th>
            <th><?php echo $orasCl.' '.$stradaCl.' '.$numarStradaCl.' '.$codPostalCl ; ?></td>
           

          
            </tr>
                                    
    </tbody>

    <?php  
   }
         }
            }
    ?>

</table>

  </div>
</div>




