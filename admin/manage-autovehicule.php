<?php
require_once('partials/navbar.php');
require_once('partials/navSub1.php');

?>
 <div class="btn-group btn-group-lg btn-center">
        <a href="adauga-autovehicul.php" class="btn btn-primary">Adaugă Autovehicul</a>
    </div>

  <?php
                if(isset($_SESSION['add-autovehicul'])){
                    echo $_SESSION['add-autovehicul'];// afiseaza mesajul
                    unset($_SESSION['add-autovehicul']);//sterge mesajul la reactualizare pagina 
                }
                 

    
     ?>




<div class="container mx-6 my-4 pt-4">
<table class="table table-responsive-sm table-striped table-bordered">
 <thead>
    <tr>
      <th scope="col">ID Autovehicul</th>
      <th scope="col">Marcă</th>
      <th scope="col">Număr înmatriculare</th>
      <th scope="col">Șofer</th>
    </tr>
  </thead>
            <?php
                $sql="SELECT autovehicul.idAutovehicul, autovehicul.marca, autovehicul.numar, angajati.numeAngajat, angajati.prenumeAngajat 
                FROM autovehicul 
                INNER JOIN angajati 
                ON autovehicul.idAngajat=angajati.idAngajat 
                 ";
                $res=mysqli_query($conn,$sql);
                if($res==TRUE){
                    $count=mysqli_num_rows($res);
                    $sn=1;

                    if($count>0){
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $idAutovehicul=$row['idAutovehicul'];
                            $marca=$row['marca'];
                            $numar=$row['numar'];
                            $numeAngajat=$row['numeAngajat'];
                            $prenumeAngajat=$row['prenumeAngajat'];
                            
?>
                                <tbody>
                                    <tr>
                                    <th scope="row"><?php echo $sn++;  ?></th>
                                    <td><?php echo $marca;  ?></td>
                                    <td><?=  $numar ?></td>
                                    <td><?= $numeAngajat.' '.$prenumeAngajat;?></td>
                                    <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?php echo SITEURL ?>admin/update-autovehicul.php?idAutovehicul=<?php echo $idAutovehicul;?>" class="btn btn-success">Modifica</a>
                                                <a href="<?php echo SITEURL ?>admin/delete-autovehicul.php?idAutovehicul=<?php echo $idAutovehicul;?>" class="btn btn-danger">Sterge</a>
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
</div>
















<?php
require_once('partials/footer.php');
?>