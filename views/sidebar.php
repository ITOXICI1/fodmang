
<?php


require_once 'C:\xampp\htdocs\fodmang\controller\stockmanagemnt.php';
$stock = new stock();
?>

<!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="<?php echo $stock->base_url('index.php'); ?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>gestion des utilisateur</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?php echo $stock->base_url('/views/user/userdisplay.php'); ?>">
          <i class="bi bi-circle"></i><span>liste des ultilisateurs</span>
        </a>
      </li>
      <li>
        <a href="<?php echo $stock->base_url('/views/user/adduser.php');?>">
          <i class="bi bi-circle"></i><span>ajouter utilisateur</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->
  <li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-journal-text"></i><span>stocks</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
      <a name='material' href="<?php echo $stock->base_url('/views/stock/material.php?name=material'); ?>">
        <i class="bi bi-circle"></i><span>material stock</span>
      </a>
    </li>
    <li>
      <a name='forniture' href="<?php echo $stock->base_url('/views/stock/forniture.php?name=forniture'); ?>">
        <i class="bi bi-circle"></i><span>fourniture stock</span>
      </a>
    </li>
    <li>
      <a name='books' href="<?php echo $stock->base_url('/views/stock/books.php?name=books'); ?>">
        <i class="bi bi-circle"></i><span>livres stock</span>
      </a>
    </li>
  </ul>
</li>
<!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>gestion des sorties de stock</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?php echo $stock->base_url('/views/article/sm.php'); ?>">
          <i class="bi bi-circle"></i><span>sortie d'article material </span>
        </a>
      </li>
      <li>
        <a href="<?php echo $stock->base_url('/views/article/sf.php'); ?>">
          <i class="bi bi-circle"></i><span>sortie d'article forniture </span>
        </a>
      </li>
      <li>
        <a href="<?php echo $stock->base_url('/views/article/sb.php'); ?>">
          <i class="bi bi-circle"></i><span>sortie des livres</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  
  <li class="nav-heading">options</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo $stock->base_url('/views/user/profile.php');?>">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
  <a class="nav-link collapsed" href="<?php echo $stock->base_url('/views/user/logout.php'); ?>">
    <i class="bi bi-question-circle"></i>
    <span>logout</span>
  </a>
</li>

</ul>

</aside><!-- End Sidebar-->

<?php
if(isset($_GET['name'])) {
  $_SESSION['table'] = $_GET['name'];
  
}
?>

