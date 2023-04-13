<?php 
/**
 * Summary of user
 */

class user {


   public function showuser($con){
  $res = mysqli_query($con, "SELECT * FROM auth");
  while ($row = mysqli_fetch_array($res) ) {
?>
    <tr>
      <td><?php echo $row['nom'];?></td>
      <td><?php echo $row['prenom'];?></td>
      <td><?php echo $row['user'];?></td>
      <td><?php echo $row['admin'];?></td>
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
            <h5 class="modal-title">Edit User <?php echo $row['nom'] . ' ' . $row['prenom'];?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="edituser.php">
              <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $row['nom'];?>">
              </div>
              <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $row['prenom'];?>">
              </div>
              <div class="mb-3">
                <label for="user" class="form-label">Username</label>
                <input type="text" class="form-control" id="user" name="user" value="<?php echo $row['user'];?>">
              </div>
              <div class="mb-3">
                <label for="admin" class="form-label">Role</label>
                <select class="form-select" id="admin" name="admin">
                  <option value="user" <?php if($row['admin'] =='user') echo 'selected';?>>Utilisateur</option>
                  <option value="admin" <?php if($row['admin'] == 'admin') echo 'selected';?>>Administrateur</option>
                </select>
              </div>
              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              <button type="submit" class="btn btn-primary" id='saveChangesBtn' name='update'>Save changes</button>
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
        <h5 class="modal-title">Supprimer l'utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="deleteuser.php">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          Êtes-vous sûr de vouloir supprimer l'utilisateur <?php echo $row['nom'] . ' ' . $row['prenom'];?> ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" name="delete">Supprimer</button>
        </div>
      </form>
    </div>
  </div>
</div>
  <div class="modal fade" id="basicModaldelete<?php echo $row['id'];?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supprimer l'utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="deleteuser.php">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          Êtes-vous sûr de vouloir supprimer l'utilisateur <?php echo $row['nom'] . ' ' . $row['prenom'];?> ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" name="delete">Supprimer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
}
}
/**
 * Summary of showuserid
 * @param mixed $con
 * @param mixed $id
 * @return void
 */
    
 public function create($con) {
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $role = mysqli_real_escape_string($con, $_POST['role']);

    $count = 0;
    $qry = "SELECT * FROM auth where user='$user'";
    $res = mysqli_query($con, $qry);
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display="none";
            document.getElementById("error").style.display="block";
        </script>
        <?php
    } else {
        $sql = "INSERT INTO auth (nom, prenom, user, password, admin) VALUES ('$nom', '$prenom', '$user', '$pass', '$role')";
        $res1 = mysqli_query($con, $sql);
        if (!$res1) {
            // Error reporting
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
    }
    ?>
    <script type="text/javascript">
        setTimeout(function(){
            window.location.href = window.location.href;
        },3000);
    </script>
    <?php
}

    
    public function edituser($con,$id){
        $nom = mysqli_real_escape_string($con, $_POST['nom']);
        $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
        $user = mysqli_real_escape_string($con, $_POST['user']);
        $role = mysqli_real_escape_string($con, $_POST['admin']);
    
        mysqli_query($con, "UPDATE `auth` SET `nom`='$nom',`prenom`='$prenom',`user`='$user',`admin`='$role' WHERE `id`='$id'");
    }
    
    public function deleteuser($con){
      if(isset($_POST['delete']) && isset($_GET['id'])){
          $id = $_GET['id'];
          mysqli_query($con, "DELETE FROM auth WHERE id='$id'");
      }
  }
    public function countuser($con){
        $user = mysqli_query($con, "SELECT COUNT(*) as count FROM auth");
        
        $counts = [
            "user" => mysqli_fetch_assoc($user)["count"]
        ];
        
        return $counts;
    }
    public function base_url($url = '') {
        return "http://localhost/fodmang/" . $url; // replace "myproject" with the name of your project
    }
    function login($cnx, $user, $pass){
      // Cleanse inputs to prevent SQL injection
      $user = mysqli_real_escape_string($cnx, $user);
      $pass = mysqli_real_escape_string($cnx, $pass);
  
      // Query to retrieve user information from database
      $sql = "SELECT * FROM auth WHERE user = '$user' AND password = '$pass'";
      $result = mysqli_query($cnx, $sql);
  
      // Check if there is a match for the username and password in the database
      if (mysqli_num_rows($result) == 1) {
          // Get user data from the database
          $user = mysqli_fetch_assoc($result);
  
          // Start a new session and store user data in session variables
          session_start();
          $_SESSION['user'] = $user['user'];
          $_SESSION['prenom'] = $user['prenom'];
          $_SESSION['admin']=$user['admin'];
  
          // Redirect user to the home page or any other desired page
          header("Location: http://localhost/fodmang/");
          exit();
      } else {
          // If there is no match, show an error message
          echo "Invalid username or password.";
      }
  }
      
  function check_session() {


    // Check if user is logged in
    if (!isset($_SESSION['user'])) {
        // If user is not logged in, redirect to login page
        // header("Location: http://localhost/fodmang//views/user/login.php");
        exit();
    }
}
}
