<?php
 session_start();
require_once 'C:\xampp\htdocs\fodmang\database\database.php';
require_once 'C:\xampp\htdocs\fodmang\controller\usercontroller.php';
$user = new user();
$user->check_auth($con);

require_once 'C:\xampp\htdocs\fodmang\controller\articlecontroller.php';
$article = new article();
require_once 'C:\xampp\htdocs\fodmang\views\header.php';
require_once 'C:\xampp\htdocs\fodmang\views\sidebar.php';
$table="books";
$table2 ="bkarchive";
?>
<!--main-container-part-->
 <main id="main" class="main">
   <body>
  <section class="section">
    <div class="row" bis_skin_checked="1">
      <div class="col-lg-12" bis_skin_checked="1">
        <div class="card" bis_skin_checked="1">
          <div class="card-body" bis_skin_checked="1">
              <h5 class="card-title">les movements de stock</h5>
    
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">N°Inventaire</th>
                    <th scope="col">Name</th>
                    <th scope="col">quantite</th>
                    <th scope="col">beneficiere</th>
                    <th scope="col">services</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php
                  $table3 ="sb"; 
                  $article->show($con,$table3); ?>
                
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
     <?php   $article->sortiemodelL($con)?>
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

if(isset($_POST['insert'])){
  
  $article->sortiem($con,$table,$table2,$table3);
}
if(isset($_POST['update'])) {
  // Get the id and table name from the POST data
  $id = $_POST['id'];
    $article->edit($con,$table3,$id);
}
if(isset($_POST['delete'])){
  $id = $_POST['id'];
    $article-> deletearticle($con,$table3,$id,$table,$table2);
}
$user->check_session();
?>