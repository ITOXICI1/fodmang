
<?php
 session_start();
 require_once 'C:\xampp\htdocs\fodmang\database\database.php';
 require_once 'C:\xampp\htdocs\fodmang\controller\usercontroller.php';
 $user = new user();


require_once 'C:\xampp\htdocs\fodmang\controller\stockmanagemnt.php';
$stock = new stock();
require_once 'C:\xampp\htdocs\fodmang\views\header.php';
require_once 'C:\xampp\htdocs\fodmang\views\sidebar.php';
// $_SESSION['table']=$_GET['name'];
$table=$_SESSION['table'];
$table2='matsarchive';
?>
<!--main-container-part-->
 <main id="main" class="main">
   <body>
  <section class="section">
    <div class="row" bis_skin_checked="1">
      <div class="col-lg-12" bis_skin_checked="1">
        <div class="card" bis_skin_checked="1">
          <div class="card-body" bis_skin_checked="1">
              <h5 class="card-title">stock de materiels</h5>
    
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">debut d'inventaire</th>
                    <th scope="col">arret d'inventaire</th>
                    <th scope="col">plage current</th>
                    <th scope="col">date</th>
                    <th scope="col">Name</th>
                    <th scope="col">fournisseur</th>
                    <th scope="col">quantite</th>
                    <th scope="col">OP</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php
                  $table ="forniture"; 
                  $stock->show($con,$table); ?>
                
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
<?php    $stock->insertmodel($table);       ?>  
             <script>
  // add event listener to save changes button
  document.getElementById("saveChangesBtn").addEventListener("click", function() {
    // get form data
    var form = document.getElementById("editUserForm");
    var formData = new FormData(form);
    // execute edituser() function with form data
    edit(formData);
  });
</script>
<!--end-main-container-part-->
<?php

require_once 'C:\xampp\htdocs\fodmang\views\footer.php';
$user->check_session();
if(isset($_POST['insert'])){

 $stock->insert($con,$table,$table2);
}
if(isset($_POST['update'])) {
  // Get the id and table name from the POST data
  $id = $_POST['id'];
    $stock->edit($con,$table,$id);
}
if(isset($_POST['delete'])){
  $id = $_POST['id'];
    $stock->delete($con,$table,$id,$table2);
}
if(isset($_POST['print'])){
  $Nom=$_POST['Nom'];
  $stock->printLivre($Nom);
}
?>