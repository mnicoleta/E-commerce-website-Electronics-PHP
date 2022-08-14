<?php
include('partials/navbar.php');
include('partials/navSub1.php');

?>
<div class="container-fluid main-content pb-4">

  <div class="wrapper">

       
    </div>
    <!-- <div class="btn-group btn-group-lg btn-center"  >
        <a href="adauga-comenzi.php" class="btn btn-primary" >Adauga o Comanda</a>
    </div> -->

<?php
                        if(isset($_SESSION['update-comenzi'])){
                            echo $_SESSION['update-comenzi'];
                            unset($_SESSION['update-comenzi']);
                        }


                ?>


    <br>
<div class="container mx-0 my-4 " style="">
<table class="table table-responsive-sm table-striped table-bordered  bg-light "  style=" position:relative ;left:-11%;
" >
 <thead>
    <tr>
        <th scope="col">Nr.</th>
        <th scope="col">ID Comanda</th>
        <th scope="col">ID Client</th>
        <th scope="col">ID Produs</th>
        <th scope="col">Produs</th>
        <th scope="col">Pret</th>
        <th scope="col">Cantitate</th>
        <th scope="col">Total</th>
        <th scope="col">Data Comanda</th>
        <th scope="col">Status</th>
        <th scope="col">Firma</th>
        <th scope="col">Persona Contact</th>
        <th scope="col">Telefon</th>
         <th scope="col">Email</th>
        <th scope="col">Adresa</th>
        <th scope="col">Actiuni</th> 
      
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
                   Where statusComanda='Livrata'
                ORDER BY idComanda, numeProdus 

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
                            $idClient=$row['idClient'];
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
            <tr >
            <th scope="row"><?php echo $sn++;  ?></th> 
            <td><?php echo $idComanda; ?></td> 
            <td><?php echo $idClient; ?></td> 
             <td><?php echo $idProdus; ?></td>     
            <td><?php echo $numeProdus; ?></td>
            <td><?php echo $pretVanzare; ?></td>
            <td><?php echo $cantitate; ?></td>
            <td><?php echo $pretTotalComanda; ?></td>
            <td><?php echo $dataComanda; ?></td>

            <td>
              <?php 

              if( $statusComanda=="Comanda Plasata"){
                echo "<label style=' font-weight:bold' >$statusComanda</label>";
              }elseif($statusComanda=="In curs de livrare"){
                 echo "<label style='color:orange; font-weight:bold'>$statusComanda</label>";
              }elseif($statusComanda=="Livrata"){
                 echo "<label style='color:green; font-weight:bold'>$statusComanda</label>";
              }elseif($statusComanda=="Anulata"){
                 echo "<label style='color:red; font-weight:bold'>$statusComanda</label>";
              }
              ?>
            </td>

            <td><?php echo $numeFirmaCl; ?></td>
            <td><?php echo $numeCl; ?></td>
            <td><?php echo $telefonCl; ?></td>
            <td><?php echo $emailCl; ?></td>
            <td><?php echo $orasCl.' '.$stradaCl.' '.$numarStradaCl.' '.$codPostalCl ; ?></td>

            <td>
                    <div class="button">
                        
                    <a href="<?php echo SITEURL ?>admin/update-comanda.php?idComanda=<?php echo $idComanda;?>" class="btn btn-success py-2 mb-1 px-4"><i class="fa fa-pencil-square-o"></i></a>
                    
                  
                    </div>
            </td>
            </tr>
                                    
    </tbody>

    <?php  
   }
         }
            }
    ?>

</table>
 <div class="btn-group btn-group-lg mx-5 my-4 mb-4 bg-light w-100 rounded" >
        <a href="manage-comenzi2.php" class="btn btn-success px-5 my-3" style="margin-left:35%; box-shadow: 0 4px 8px 1px rgba(5, 20, 34, 0.874), 0 6px 20px 0 rgba(37, 32, 32, 0.951);" >Vezi Toate Comenzile </a>
    </div>
  </div>
  
</div>




