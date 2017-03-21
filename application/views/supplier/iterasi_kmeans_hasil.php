    <div class="container margin-b70">
      <div class="row">
        <div class="col-md-12">
        <?php error_reporting(0); ?>
          <h1>Data Hasil Iterasi</h1>
            <div id="body">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>supplier/iterasi_kmeans">Mulai Awal</a><br><br>
            <?php
              foreach($q->result_array() as $hq)
              {
            ?>
            <center><h3>Iterasi ke-<?php echo $hq['iterasi']; ?></h3></center>
            <div class="table-responsive">
            <table  id="table_data" class="table table-bordered table-admin">
              <tr align="center"><td>C1</td><td>C2</td><td>C3</td></tr>
              <?php
                $q2 = $this->db->query('select * from centroid_temp where iterasi='.$hq['iterasi'].'');
                foreach($q2->result() as $tq)
                {
                $warna1="";
                $warna2="";
                $warna3="";
                if($tq->c1==1){$warna1='#FFFF00';} else{$warna1='#EAEAEA';}
                if($tq->c2==1){$warna2='#FFFF00';} else{$warna2='#EAEAEA';}
                if($tq->c3==1){$warna3='#FFFF00';} else{$warna3='#EAEAEA';}
              ?>
              <tr align="center"><td bgcolor="<?php echo $warna1; ?>"><?php echo $tq->c1; ?></td><td bgcolor="<?php echo $warna2; ?>"><?php echo $tq->c2; ?></td><td bgcolor="<?php echo $warna3; ?>"><?php echo $tq->c3; ?></td></tr>
              <?php
                }
              ?>
            </table>
            </div>
            <?php
              }
            ?>
            </div>


            <table  id="table_data" class="table table-bordered table-admin">
              <tr align="center"><td>No Puskesmas</td><td>Nama Puskesmas</td><td>Predikat</td></tr>
              <?php
                foreach($data_hasil->result() as $h)
                {
              ?>
              <tr align="center">
              <td><?php echo $h->no_puskesmas; ?></td>
              <td><?php echo $h->nama_puskesmas; ?></td>
              <td><?php echo $h->predikat; ?></td>
              </tr>
              <?php
                }
              ?>
            </table>
            </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>
      </div>
    </div>
