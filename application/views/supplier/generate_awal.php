    <div class="container margin-b70">
      <div class="row">
        <div class="col-md-12">
          <h1>Data Awal</h1>

            <div id="body">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>supplier/generate_rata">Proses Data Rata-Rata</a><br><br>
            <div class="table-responsive">
            <table  id="table_data" class="table table-bordered table-striped table-admin">
              <tr><td>No Puskesmas</td><td>Nama Puskesmas</td><td>Jumlah Pasien</td><td>Ketersediaan Obat</td><td>Jumlash fasilitas</td></tr>
              <?php foreach($data_puskesmas->result_array() as $s){ ?>
              <tr><td><?php echo $s['no_puskesmas']; ?></td><td><?php echo $s['nama_puskesmas']; ?></td><td><?php echo $s['jumlah_pasien_total']; ?></td><td><?php echo $s['ketersediaan_obat_total']; ?></td><td><?php echo $s['jumlah_fasilitas_total']; ?></td></tr>
              <?php } ?>
            </table>
            </div>
            </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>
      </div>
    </div>
