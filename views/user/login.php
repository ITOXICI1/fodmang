<?php 
session_start();
require_once 'C:\xampp\htdocs\fodmang\database\database.php';
require_once 'C:\xampp\htdocs\fodmang\controller\usercontroller.php';

$userController = new User();

require_once 'C:\xampp\htdocs\fodmang\views\header.php';
require_once 'C:\xampp\htdocs\fodmang\views\sidebar.php';

?>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <center><span class="d-none d-lg-block">STOCK FACULTE OUSSOUL EDDINE</span></center>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">authentification</h5>
                    <p class="text-center small">saise le nom et mot de pass pour connecte</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="<?php echo $userController->base_url('index.php'); ?>">

                    <div class="col-12">
                      <label for="user" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"></span>
                        <input type="text" name="user" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">le nom d'utilisateur.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="pass" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">PASSWORD !</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name='login'>Login</button>
                    </div>
                    
                  </form>

                </div>
              </div>

            

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>

  <?php 
  
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $userController->login($con, $user, $pass);
        
    }

    require_once 'C:\xampp\htdocs\fodmang\views\footer.php';
  ?>
