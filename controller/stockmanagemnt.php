<?php 
use Mpdf\Mpdf;

require_once 'C:\xampp\htdocs\fodmang\vendor\autoload.php';
require_once 'C:\xampp\htdocs\fodmang\vendor\phpqrcode\qrlib.php';
class stock {
    public function show($con, $table) {
        $res = mysqli_query($con, "SELECT * FROM $table ORDER BY AN ASC");
        while ($row = mysqli_fetch_array($res)) {
           ?>
    <tr>
      <td><?php echo substr($table, 0, 1).$row['AN'];?></td>
      <td><?php echo substr($table, 0, 1).$row['DN'];?></td>
      <td><?php echo substr($table, 0, 1).$row['LN']."-".$row['FN'];?></td>
      <td><?php echo $row['date'];?></td>
      <td><?php echo $row['Nom'];?></td>
      <td><?php echo $row['fournisseur'];?></td>
      <td><?php echo $row['quantity'];?></td>
      <td><?php echo $row['OP'];?></td>
      <?php if($table == "fourniture"){

    echo" <td>  ".$row['type']."</td>";   }?>
      <td>
        <?php if($table == "books"){

echo" <td>  ".$row['etat']."</td>";   }?>
  <td>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal<?php echo $row['id'];?>">
          Edit
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModaldelete<?php echo $row['id'];?>">
              delete</button>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModalprint<?php echo $row['id'];?>">
          print
        </button>
      </td>
      
    </tr>

    <!-- Modal -->
    <div class="modal fade" id="basicModal<?php echo $row['id'];?>" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit stock <?php echo substr($table, 0, 1).$row['AN'] ."-".$row['DN']. ' ' . $row['Nom'];?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
            <form method="POST" action="">
              <div class="mb-3">
                <label for="nom" class="form-label">debut d'inventaire
                </label>
                <input type="text" class="form-control" id="AN" name="AN" value="<?php echo $row['AN'];?>">
              </div>
              <div class="mb-3">
                <label for="nom" class="form-label">arret d'inventaire
                </label>
                <input type="text" class="form-control" id="DN" name="DN" value="<?php echo $row['DN'];?>">
              </div>
              <div class="mb-3">
                <label for="Nom" class="form-label">Nom d'article</label>
                <input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $row['Nom'];?>">
              </div>
              <div class="mb-3">
                <label for="fournisseur" class="form-label">FOURNiSSUER</label>
                <input type="text" class="form-control" id="fournisseur" name="fournisseur" value="<?php echo $row['fournisseur'];?>">
              </div>
                <div class="mb-3">
                <label for="OP" class="form-label">N°OP</label>
                <input type="text" class="form-control" id="OP" name="OP" value="<?php echo $row['OP'];?>">
              </div><?php
              if ($table == 'forniture') {
    echo "<div class='mb-3'>
                <label for='type' class='form-label'>type</label>
                 
<div>
            <input type='text' class='form-control' id='type' name='type' value='".$row['type']."'>
          </div>";
}
?>  <?php 
if ($table == 'books') {
    echo "<div class='mb-3'>
    <label for='type' class='form-label'>etat</label>
     
<div>
            <input type='text' class='form-control' id='etat' name='type' value='".$row['etat']."'>
          </div>";
}
?>

              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              <button type="submit" class="btn btn-primary" id='saveChangesBtn' name='update'>modifier</button>
              <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="basicModaldelete<?php echo $row['id'];?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supprimer le stock</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          Êtes-vous sûr de vouloir supprimer le stock <?php echo $row['AN'] . ' ' . $row['Nom'];?> ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" name="delete">Supprimer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="basicModalprint<?php echo $row['id'];?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">l'impression des livres</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          Êtes-vous sûr de vouloir imprimer le stock <?php echo $row['AN'] . '-' .$row['LN'].' '. $row['Nom'];?> ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" name="print">imprimer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
}
}
  public function insertmodel($table) {
    echo "
        <a href='#' data-bs-toggle='modal' data-bs-target='#largeModal' class='btn btn-primary'>
            <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' fill='currentColor' class='bi bi-plus-circle float-right' viewBox='0 0 16 16'>
                <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
            </svg>
        </a>

        <div class='modal fade' id='largeModal' tabindex='-1'>
            <div class='modal-dialog modal-lg'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Ajouter au stock</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <form action='#' method='POST'>
                            <div class='row mb-3'>
                                <label for='inputText' class='col-sm-2 col-form-label'>debut d'inventire</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputText' name='LN'>
                                </div>
                            </div>
                            <div class='row mb-3'>
                                <label for='inputText' class='col-sm-2 col-form-label'>fin d'inventire</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputText' name='FN'>
                                </div>
                            </div>
                            <div class='row mb-3'>
                                <label for='inputText' class='col-sm-2 col-form-label'>Nom d'article</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputText' name='Nom'>
                                </div>
                            </div>
                            <div class='row mb-3'>
                                <label for='inputText' class='col-sm-2 col-form-label'>Fournisseur</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputText' name='fournisseur'>
                                </div>
                            </div>
                            <div class='row mb-3'>
                                <label for='inputText' class='col-sm-2 col-form-label'>N°OP</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='inputEmail' name='OP'>
                                </div>
                            </div>
                            ";
                            if ($table == "forniture") {
                              echo '<div class="mb-3">
                                      <label for="type" class="form-label">Type</label>
                                      <select class="form-select" id="type" name="type">
                                        <option value=""></option>
                                        <option value="informatique">Informatique</option>
                                        <option value="bureautique">Bureautique</option>
                                      </select>
                                    </div>';
                          } elseif ($table == "books") {
                              echo '<div class="mb-3">
                                      <label for="etat" class="form-label">État</label>
                                      <select class="form-select" id="etat" name="etat">
                                        <option value=""></option>
                                        <option value="neuf">Neuf</option>
                                        <option value="occasion">Occasion</option>
                                      </select>
                                    </div>';
                          }
                          echo "
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary' name='insert' id='btn_add'>Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
}
 
public function insert($con, $table,$table2) {
      $LN = mysqli_real_escape_string($con, $_POST['LN']);
        $FN = mysqli_real_escape_string($con, $_POST['FN']);
        $AN = $LN;
        $DN =$FN;
        $Nom = mysqli_real_escape_string($con, $_POST['Nom']);
        $forn = mysqli_real_escape_string($con, $_POST['fournisseur']);
        $qty = ($FN-$LN)+1;
        $OP = mysqli_real_escape_string($con, $_POST['OP']);

        $qry = "INSERT INTO $table (AN, DN, LN, FN, date,Nom, fournisseur, quantity, OP) VALUES ('$AN','$DN','$LN','$FN',Now(),'$Nom','$forn','$qty','$OP')";
        $res = mysqli_query($con, $qry);

        if ($res) {
            echo "<script>alert('Record added successfully')</script>";
            for($i=$LN;$i<= $FN; $i++){
              $ins="INSERT INTO $table2 (N,date,Nom,quantity,OP,status) VALUES ('$i',Now(),'$Nom',1,'$OP',1)";
              $resins= mysqli_query($con,$ins);

            }

            ?>
<script type="text/javascript">
    window.location.href = "<?php echo $table ?>.php";
</script>
<?php
        } else {
            echo "<script>alert('Error adding record')</script>";
        }
    
}
public function insertL($con, $table,$table2) {
  $LN = mysqli_real_escape_string($con, $_POST['LN']);
    $FN = mysqli_real_escape_string($con, $_POST['FN']);
    $AN = $LN;
    $DN =$FN;
    $Nom = mysqli_real_escape_string($con, $_POST['Nom']);
    $forn = mysqli_real_escape_string($con, $_POST['fournisseur']);
    $qty = ($FN-$LN)+1;
    $OP = mysqli_real_escape_string($con, $_POST['OP']);
    $etat = mysqli_real_escape_string($con, $_POST['etat']);

    $qry = "INSERT INTO $table (AN, DN, LN, FN, date,Nom, fournisseur, quantity, OP,etat) VALUES ('$AN','$DN','$LN','$FN',Now(),'$Nom','$forn','$qty','$OP','$etat')";
    $res = mysqli_query($con, $qry);

    if ($res) {
        echo "<script>alert('Record added successfully')</script>";
        for($i=$LN;$i<= $FN; $i++){
          $ins="INSERT INTO $table2 (N,date,Nom,quantity,OP,status) VALUES ('$i',Now(),'$Nom',1,'$OP',1)";
          $resins= mysqli_query($con,$ins);

        }

        ?>
<script type="text/javascript">
window.location.href = "<?php echo $table ?>.php";
</script>
<?php
    } else {
        echo "<script>alert('Error adding record')</script>";
    }

}
public function insertF($con, $table,$table2) {
  $LN = mysqli_real_escape_string($con, $_POST['LN']);
    $FN = mysqli_real_escape_string($con, $_POST['FN']);
    $AN = $LN;
    $DN =$FN;
    $Nom = mysqli_real_escape_string($con, $_POST['Nom']);
    $forn = mysqli_real_escape_string($con, $_POST['fournisseur']);
    $qty = ($FN-$LN)+1;
    $OP = mysqli_real_escape_string($con, $_POST['OP']);
    $type = mysqli_real_escape_string($con, $_POST['type']);

    $qry = "INSERT INTO $table (AN, DN, LN, FN, date,Nom, fournisseur, quantity, OP,type) VALUES ('$AN','$DN','$LN','$FN',Now(),'$Nom','$forn','$qty','$OP','$type')";
    $res = mysqli_query($con, $qry);

    if ($res) {
        echo "<script>alert('Record added successfully')</script>";
        for($i=$LN;$i<= $FN; $i++){
          $ins="INSERT INTO $table2 (N,date,Nom,quantity,OP,status) VALUES ('$i',Now(),'$Nom',1,'$OP',1)";
          $resins= mysqli_query($con,$ins);

        }

        ?>
<script type="text/javascript">
window.location.href = "<?php echo $table ?>.php";
</script>
<?php
    } else {
        echo "<script>alert('Error adding record')</script>";
    }

}


    public function edit($con, $table, $id) {
        $AN = mysqli_real_escape_string($con, $_POST['AN']);
        $DN = mysqli_real_escape_string($con, $_POST['DN']);
        $LN=$AN;
        $FN=$DN;
        $nom = mysqli_real_escape_string($con, $_POST['Nom']);
        $forn = mysqli_real_escape_string($con, $_POST['fournisseur']);
        $OP=mysqli_real_escape_string($con, $_POST['OP']);
        $type=mysqli_real_escape_string($con, $_POST['type']);
        $etat=mysqli_real_escape_string($con, $_POST['etat']);

        // Update the material table
        $query = "UPDATE  $table SET AN='$AN',DN='$DN',LN='$LN',FN='$FN', Nom='$nom', fournisseur='$forn' ,OP='$OP',type='$type','$etat' WHERE id='$id'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            die("Error: Update query failed." . mysqli_error($con));
        } else {
            echo "Update success";
        }
        ?>
<script type="text/javascript">
    window.location.href = "<?php echo $table ?>.php";
</script>
<?php
    }

    public function delete($con, $table, $id,$table2) {
     $result= mysqli_query($con,"SELECT Nom FROM $table WHERE id ='$id'");
    $row = mysqli_fetch_assoc($result);
    $Nom = $row['Nom'];
        mysqli_query($con, "DELETE FROM $table WHERE id='$id'");
        mysqli_query($con,"DELETE FROM $table2 WHERE Nom='$Nom'");
          ?>
<script type="text/javascript">
    window.location.href = "<?php echo $table ?>.php";
</script>
<?php
    }

    /**
     */
    public function __construct() {
    }
   public function base_url($url = '') {
        return "http://localhost/fodmang/" . $url; // replace "myproject" with the name of your project
    }
    public function pichart($con){
        $material = mysqli_query($con, "SELECT COUNT(*) as count FROM material");
        $fornitures = mysqli_query($con, "SELECT COUNT(*) as count FROM forniture");
        $books = mysqli_query($con, "SELECT COUNT(*) as count FROM books");
        
        $counts = [
            "material" => mysqli_fetch_assoc($material)["count"],
            "fornitures" => mysqli_fetch_assoc($fornitures)["count"],
            "books" => mysqli_fetch_assoc($books)["count"]
        ];
        
        return $counts;

    }
}
function printLivre( $article) {


  if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM bkarchive WHERE Nom = '$article'";
  $result = mysqli_query($con, $sql);
  $html = "";
  $mpdf = new Mpdf(['autoLangToFont' => true]);

  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
          $uniqueID = $row['N']." ".$row['Nom'];
          $save_path = 'C:\xampp\htdocs\fodmang\controller\qrcodes';
          
          $html .= "<tr>";
          $html .= "<td style='font-family: DejaVu Sans'>" . $row['N'] . "</td>";
          $html .= "<td>";
          QRcode::png($uniqueID, $save_path . $uniqueID . '.png');
          $html .= "<img src='$save_path$uniqueID.png' alt='QRCode'>";
          $html .= "</td>";
          $html .= "</tr>";
      } 
      $mpdf->WriteHTML("<table border='1' style='width:100%'><tr><th>N° inventaire</th><th>QR Code</th></tr>$html</table>");
      $mpdf->Output();
  } else {
      echo "0 results";
  }

  mysqli_close($con);
}


