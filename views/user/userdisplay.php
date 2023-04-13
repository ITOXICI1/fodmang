<?php
session_start();
require_once 'C:/xampp/htdocs/fodmang/database/database.php';
require_once 'C:/xampp/htdocs/fodmang/controller/usercontroller.php';
$user = new user();
require_once 'C:/xampp/htdocs/fodmang/views/header.php';
require_once 'C:/xampp/htdocs/fodmang/views/sidebar.php';
?>

<main id="main" class="main">
  <body>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table d'utilisateurs</h5>
              <div class="dataTable-container">
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">Nom</th>
                      <th scope="col">Prénom</th>
                      <th scope="col">Nom d'utilisateur</th>
                      <th scope="col">Rôle</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $user->showuser($con); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</main>

<script>
  // add event listener to save changes button
  document.getElementById("saveChangesBtn").addEventListener("click", function() {
    // get form data
    var form = document.getElementById("editUserForm");
    var formData = new FormData(form);
    // execute edituser() function with form data
    edituser(formData);
  });
</script>

<?php
require_once 'C:/xampp/htdocs/fodmang/views/footer.php';
$user->check_session();
?>
