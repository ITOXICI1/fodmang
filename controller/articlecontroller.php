<?php 
class article {


    public function show($con, $table) {
        $res = mysqli_query($con, "SELECT * FROM $table");
        while ($row = mysqli_fetch_array($res)) {
           ?>
    <tr>
      <td><?php echo $row['N'];?></td>
      <td><?php echo $row['Nom'];?></td>
      <td><?php echo $row['quantity'];?></td>
      <td><?php echo $row['beneficiere'];?></td>
      <td><?php echo $row['services'];?></td>
      <td>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal<?php echo $row['id'];?>">
          Edit
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModaldelete<?php echo $row['id'];?>">
              delete
      </td>
    </tr>

    <!-- Modal -->
    <div class="modal fade" id="basicModal<?php echo $row['id'];?>" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit stock <?php echo $row['N'] . ' ' . $row['Nom'];?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="mb-3">
                <label for="nom" class="form-label">N°inventraire
                </label>
                <input type="text" class="form-control" id="N" name="N" value="<?php echo $row['N'];?>">
              </div>
              <div class="mb-3">
                <label for="prenom" class="form-label">Nom d'article</label>
                <input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $row['Nom'];?>">
              </div>
              <div class="mb-3">
                <label for="user" class="form-label">quantite
                </label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity'];?>">
              </div>
              <div class="mb-3">
                <label for="nom" class="form-label">beneficiere
                </label>
                <input type="text" class="form-control" id="beneficiare" name="beneficiere" value="<?php echo $row['beneficiere'];?>">
              </div>
                <div class="mb-3">
                <label for="services" class="form-label">services</label>
                <select class="form-select" id="services" name="services">
                  <option value="ressource humain" <?php if($row['services'] =='ressource humain') echo 'selected';?>>ressource humain</option>
                  <option value="informatique" <?php if($row['services'] == 'informatique') echo 'selected';?>>informatique</option>
                  <option value="affaires étudiantes" <?php if($row['services'] =='affaires étudiantes') echo 'selected';?>>affaires étudiantes</option>
                  <option value="recherche scientifique" <?php if($row['services'] =='recherche scientifique') echo 'selected';?>>recherche scientifique</option>
                  <option value="Économie " <?php if($row['services'] =='Économie ') echo 'selected';?>>Économie </option>
                </select>
              </div>
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
        <h5 class="modal-title">Supprimer l'article</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          Êtes-vous sûr de vouloir supprimer l'aricle <?php echo $row['N'] . ' ' . $row['Nom'];?> ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" id='deleteBtn' name='delete'>Supprimer</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
<?php
}
    }
    public function sortiemodelL($con){
       echo "<a href='#' data-bs-toggle='modal' data-bs-target='#largeModal' class='btn btn-primary'>
            <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' fill='currentColor' class='bi bi-plus-circle float-right' viewBox='0 0 16 16'>
                <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
            </svg>
        </a>
            </div>
          </div>
  </div>

            </main>
             

   <div class='modal fade' id='largeModal' tabindex='-1'>
  <div class='modal-dialog modal-lg'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title'>Sortie de stock</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form action='#' method='POST'>
          <div class='mb-3'>
            <label for='Nom' class='form-label'>Nom d'article</label>
            <select class='form-select' id='Nom' name='Nom'>";
              $res = mysqli_query($con, "SELECT * FROM books");
              while ($row = mysqli_fetch_array($res)) {
                echo "<option>".$row['Nom']."</option>";
              }
             echo "
            </select>
          </div>
          <div class='row mb-3'>
            <label for='inputText' class='col-sm-2 col-form-label'>quantite</label>
            <div class='col-sm-10'>
              <input type='text' class='form-control' id='inputText' name='quantity'>
            </div>
          </div>
          <div class='row mb-3'>
            <label for='inputText' class='col-sm-2 col-form-label'>beneficiere</label>
            <div class='col-sm-10'>
              <input type='text' class='form-control' id='inputText' name='beneficiere'>
            </div>
          </div>
          <div class='mb-3'>
            <label for='services' class='form-label'>services</label>
            <select class='form-select' id='services' name='services'>
              <option value='ressource humain'>ressource humain</option>
              <option value='economie'>economie</option>
              <option value='informatique'>informatique</option>
              <option value='recherche scientifique'>recherche scientifique</option>
              <option value='affaires étudiantes'>affaires étudiantes</option>
              <option value='affaires étudiantes'>secretariat</option>
              <option value='affaires étudiantes'>bibliothèque</option>
              <option value='affaires étudiantes'>profs</option>
            </select>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
            <button type='submit' class='btn btn-primary' name='insert' id='insert'>Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>";

    }
    public function sortiemodel($con,$table){
       echo "<a href='#' data-bs-toggle='modal' data-bs-target='#largeModal' class='btn btn-primary'>
            <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' fill='currentColor' class='bi bi-plus-circle float-right' viewBox='0 0 16 16'>
                <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
            </svg>
        </a>
            </div>
          </div>
  </div>

            </main>
             

   <div class='modal fade' id='largeModal' tabindex='-1'>
  <div class='modal-dialog modal-lg'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title'>Sortie de stock</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form action='#' method='POST'>
          <div class='mb-3'>
            <label for='Nom' class='form-label'>Nom d'article</label>
            <select class='form-select' id='Nom' name='Nom'>";
              $res = mysqli_query($con, "SELECT * FROM $table");
              while ($row = mysqli_fetch_array($res)) {
                echo "<option>".$row['Nom']."</option>";
              }
             echo "
            </select>
          </div>
          <div class='row mb-3'>
            <label for='inputText' class='col-sm-2 col-form-label'>quantite</label>
            <div class='col-sm-10'>
              <input type='text' class='form-control' id='inputText' name='quantity'>
            </div>
          </div>
          <div class='row mb-3'>
            <label for='inputText' class='col-sm-2 col-form-label'>beneficiere</label>
            <div class='col-sm-10'>
              <input type='text' class='form-control' id='inputText' name='beneficiere'>
            </div>
          </div>
          <div class='mb-3'>
            <label for='services' class='form-label'>services</label>
            <select class='form-select' id='services' name='services'>
              <option value='ressource humain'>ressource humain</option>
              <option value='economie'>economie</option>
              <option value='informatique'>informatique</option>
              <option value='recherche scientifique'>recherche scientifique</option>
              <option value='affaires étudiantes'>affaires étudiantes</option>
              <option value='affaires étudiantes'>secretariat</option>
              <option value='affaires étudiantes'>bibliothèque</option>
              <option value='affaires étudiantes'>profs</option>
            </select>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
            <button type='submit' class='btn btn-primary' name='insert' id='insert'>Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>";

    }
public function sortiem($con, $table, $table2, $table3)
{
    // Get input values and sanitize them
    $article = mysqli_real_escape_string($con, $_POST['Nom']);
    $quantity = (int) mysqli_real_escape_string($con, $_POST['quantity']);
    $service = mysqli_real_escape_string($con, $_POST['services']);
    $beneficiere = mysqli_real_escape_string($con, $_POST['beneficiere']);

    // Check if there is enough quantity available
    $check_qty_query = "SELECT quantity FROM $table WHERE Nom='$article'";
    $check_qty_result = mysqli_query($con, $check_qty_query);
    $row = mysqli_fetch_assoc($check_qty_result);
    if ($row['quantity'] < $quantity) {
        echo "Not enough quantity available.";
        return;
    }

    // Select available items and get the first and last N values
    $dataq_query = "SELECT * FROM $table2 WHERE status = 1  AND Nom='$article' LIMIT $quantity";
    $dataq_result = mysqli_query($con, $dataq_query);
    $first_row = mysqli_fetch_assoc($dataq_result);
    $first_N = $first_row['N'];
   $last_row = null;
for ($i = 1; $i < $quantity; $i++) {
    $last_row = mysqli_fetch_assoc($dataq_result);
}
if($last_row){
    $last_N = $last_row['N'];
}else{
    // handle if $last_row is null
    $last_N = $first_N;
}
    // Generate the FL value and insert the new row into $table3
    $FL = substr($table,0,1) . $first_N . "-" . $last_N;
    $insert_query = "INSERT INTO $table3 (N, Nom, quantity, beneficiere, services) VALUES ('$FL','$article','$quantity','$beneficiere','$service')";
    if (!mysqli_query($con, $insert_query)) {
        // Query execution failed
        echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
        return;
    }

    // Update the $table and $table2 tables
    $decrease_stock_query = "UPDATE $table SET quantity=quantity-'$quantity' , LN =LN + '$quantity' WHERE Nom='$article'";
    mysqli_query($con, $decrease_stock_query);
    $update_table2_query = "UPDATE $table2 SET status = 0 WHERE N BETWEEN $first_N AND $last_N";
    mysqli_query($con, $update_table2_query);

   ?>
  <script type="text/javascript">
    window.location.href = "<?php echo $table3 ?>.php";
</script>
<?php
}
  



    public function edit($con,$table,$id){
        $nom = mysqli_real_escape_string($con, $_POST['Nom']);
        $qty = mysqli_real_escape_string($con, $_POST['quantity']);
        $beneficiere = mysqli_real_escape_string($con, $_POST['beneficiere']);
        $service = mysqli_real_escape_string($con, $_POST['services']);
        // Update the article table
        $query = "UPDATE $table SET `Nom`='$nom',`quantity`='$qty', `beneficiere`='$beneficiere',`services`='$service' WHERE `id`='$id'";
        $result = mysqli_query($con, $query);
        if (!$result) {
            die("Error: Update query failed." . mysqli_error($con));
        }else{
            echo "Update success";
        }
    }
    public function showedit($con,$table){
$res = mysqli_query($con, "SELECT * FROM $table");
        while ($row = mysqli_fetch_array($res)) {
           ?>
    <tr>
      <td><?php echo $row['N'];?></td>
      <td><?php echo $row['Nom'];?></td>
      <td><?php echo $row['quantity'];?></td>
      <td><?php echo $row['beneficiere'];?></td>
      <td><?php echo $row['services'];?></td>
      <td>
      <tr>

<?php
            }
    }
   public function deletearticle($con, $table, $id, $table2,$table3) {
    $result = mysqli_query($con, "SELECT Nom, quantity FROM $table WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);

    if ($row != null) {
        $article = $row['Nom'];
        $quantity = $row['quantity'];

        $delete = mysqli_query($con, "DELETE FROM $table WHERE id='$id'");
            mysqli_query($con, "UPDATE $table2 SET quantity = quantity+'$quantity', LN = LN-'$quantity' WHERE Nom = '$article'");
            mysqli_query($con, "UPDATE $table3 SET status = 1 WHERE Nom = '$article'");
        }
    }
}



 