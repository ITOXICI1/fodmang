<?php
require_once 'C:\xampp\htdocs\fodmang\database\database.php';
require_once 'C:\xampp\htdocs\fodmang\controller\usercontroller.php';
$user = new user();
require_once 'C:\xampp\htdocs\fodmang\views\header.php';
require_once 'C:\xampp\htdocs\fodmang\views\sidebar.php';

?>
<main id="main" class="main">
<section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ajouter utilisateur</h5>

              <!-- Horizontal Form -->
             <form action="adduser.php" method="POST">
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">nom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="nom">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">prenom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="prenom">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail" class="col-sm-2 col-form-label">user</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail" name="user">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" name="pass">
    </div>
  </div>
  <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Role</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="role" id="gridRadios1" value="administrateur" checked>
        <label class="form-check-label" for="gridRadios1">
          administrateur
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="role" id="gridRadios2" value="utilisateur">
        <label class="form-check-label" for="gridRadios2">
          utilisateur 
        </label>
      </div>
    </div>
  </fieldset>
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
    $user->create($con);

}
require_once 'C:\xampp\htdocs\fodmang\views\footer.php';
?>