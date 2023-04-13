<?php
require_once 'C:\xampp\htdocs\fodmang\controller\stockmanagemnt.php';
$stock = new stock();
?>
 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <strong><span>ammari mahjoub</span></strong></a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="<?php echo $stock->base_url('public/vendor/apexcharts/apexcharts.min.js'); ?>"></script>
  <script src="<?php echo $stock->base_url('public/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo $stock->base_url('public/vendor/chart.js/chart.umd.js'); ?>"></script>
  <script src="<?php echo $stock->base_url('public/vendor/echarts/echarts.min.js'); ?>"></script>
  <script src="<?php echo $stock->base_url('public/vendor/quill/quill.min.js"'); ?>"></script>
  <script src="<?php echo $stock->base_url('public/vendor/simple-datatables/simple-datatables.js'); ?>"></script>
  <script src="<?php echo $stock->base_url('public/vendor/tinymce/tinymce.min.js'); ?>"></script>
  <script src="<?php echo $stock->base_url('public/vendor/php-email-form/validate.js'); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo $stock->base_url('public/js/main.js'); ?>"></script>

</body>

</html>