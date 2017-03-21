    <div class="footer footer1">
      <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <img src="<?php echo base_url();?>assets/img/logo-footer.png" width="72" height="72" />
          <h4 class="white">SISTEM INFORMASI CERDAS</h4>
          <?php foreach ($titlesistem as $t): ?>
            <h3 class="white"><?php echo $t['title']?></h3>             
          <?php endforeach ?>
          <ul class="list-inline">
            <li><a href="halaman_depan.html" class="link-footer">Beranda</a></li>
            <li><a href="petunjuk_penggunaan.html" class="link-footer">Petunjuk Penggunaan</a></li>
            <li><a href="tentang.html" class="link-footer">Tentang</a></li>
          </ul>
          <h5 class="white">Copyright &copy; 2015</h5>
        </div>
      </div>
    </div>
  </div>
    <script src="<?=base_url();?>assets/js/jquery.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui/jquery-ui.js"></script>
<script src="<?=base_url();?>assets/js/select2/select2.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap-hover-dropdown.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/js/datatable-bootstrap.js"></script>
<script src="<?=base_url();?>assets/js/jquery-media.js"></script>
<script src="<?=base_url();?>assets/js/jquery-metadata.js"></script>
<script src="<?=base_url();?>assets/js/facebox.js"></script>
<script src="<?=base_url();?>assets/js/script.js"></script>
  </body>
</html>