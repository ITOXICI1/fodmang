<?php
 session_start();

require_once 'C:\xampp\htdocs\fodmang\database\database.php';
require_once 'C:\xampp\htdocs\fodmang\controller\stockmanagemnt.php';
$stock = new stock();
require_once 'C:\xampp\htdocs\fodmang\views\header.php';
require_once 'C:\xampp\htdocs\fodmang\views\sidebar.php';
 
$table = $_SESSION['table'];
?>
<main id="main" class="main">
  <section class="section">
    <div class="row" bis_skin_checked="1">
      <div class="col-lg-12" bis_skin_checked="1">
        <div class="card" bis_skin_checked="1">
          <div class="card-body" bis_skin_checked="1">
              <h5 class="card-title">Ajouter au stock <?php echo $table;?></h5>

              <!-- Horizontal Form -->
             <form action="addstock.php" method="POST">
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">N°invrentaire</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="N">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Nom d'article</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="Nom">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">quantite</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail" name="quantity">
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary" name='add'>ajoute</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </div>
</form>
<!-- End Horizontal Form -->

            </div>
          </div>
</main>

<?php 
  $user->check_session();
if(isset($_POST['add'])){
    $stock->insert($con,$table);
}
require_once 'C:\xampp\htdocs\fodmang\views\footer.php';
?>