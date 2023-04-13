<?php
require_once 'C:\xampp\htdocs\fodmang\database\database.php';

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $user = $_POST['user'];
    $admin = $_POST['admin'];

    $sql = "UPDATE auth SET nom='$nom', prenom='$prenom', user='$user', admin='$admin' WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if($result) {
        header("Location: userdisplay.php");
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>
