<?php
  $user->check_session();
require_once 'C:\xampp\htdocs\fodmang\database\database.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM auth WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Error deleting record: " . mysqli_error($con));
    }
    echo "Record deleted successfully";
}
?>
<script type="text/javascript">
    window.location="userdisplay.php";
</script>