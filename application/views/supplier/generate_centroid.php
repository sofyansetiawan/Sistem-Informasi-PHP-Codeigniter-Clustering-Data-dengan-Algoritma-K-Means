    <div class="container margin-b70">
      <div class="row">
        <div class="col-md-12">
          <h1>Data Akhir</h1>

          <div id="body">
          <a  class="btn btn-primary" href="<?php echo base_url(); ?>supplier/generate_rata">Proses Data Rata-Rata</a> <a  class="btn btn-success" href="<?php echo base_url(); ?>supplier/generate_centroid">Proses Data Akhir</a><br><br>
          <div class="table-responsive">
            <table  id="table_data" class="table table-bordered table-striped table-admin">
            <tr><td>Centroid 1</td><td>Sangat Baik</td><td><?php echo $c1; ?></td></tr>
            <tr><td>Centroid 2</td><td>Baik</td><td><?php echo $c2; ?></td></tr>
            <tr><td>Centroid 3</td><td>Cukup</td><td><?php echo $c3; ?></td></tr>
            <tr><td>Centroid 4</td><td>Kurang</td><td><?php echo $c4; ?></td></tr>
            <tr><td>Centroid 5</td><td>Kurang Sekali</td><td><?php echo $c5; ?></td></tr>
          </table>
          </div>
          <br>
          <br>
          <div class="table-responsive">
            <table  id="table_data" class="table table-bordered table-striped table-admin">
            <tr align="center"><td>No Puskesmas</td><td>Nama Puskesmas</td><td>Jumlah Pasien</td><td>Ketersediaan Obat</td><td>Jumlah Fasilitas</td><td>Rata-Rata</td><td colspan="5">Distance</td><td>Predikat</td></tr>
            <?php foreach($data_puskesmas->result_array() as $s){ ?>
            <tr><td><?php echo $s['no_puskesmas']; ?></td><td><?php echo $s['nama_puskesmas']; ?></td><td><?php echo $s['jumlah_pasien_total']; ?></td><td><?php echo $s['ketersediaan_obat_total']; ?></td><td><?php echo $s['jumlah_fasilitas_total']; ?></td><td><?php echo $s['rata_rata']; ?></td><td><?php echo $s['d1']; ?></td><td><?php echo $s['d2']; ?></td><td><?php echo $s['d3']; ?></td><td><?php echo $s['d4']; ?></td><td><?php echo $s['d5']; ?></td><td><?php echo $s['predikat']; ?></td></tr>
            <?php } ?>
          </table>
          </div>
          </div>

          <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>
      </div>
    </div>
