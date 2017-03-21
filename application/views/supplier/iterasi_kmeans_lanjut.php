    <div class="container margin-b70">
      <div class="row">
        <div class="col-md-12">
        <?php error_reporting(0); ?>
          <h1>Data Proses Iterasi</h1>

            <div id="body">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>supplier/iterasi_kmeans_lanjut">Proses Iterasi Selanjutnya</a><br><br>
            <?php
              $c1a = "";
              $c1b = "";
              $c1c = "";
              
              $c2a = "";
              $c2b = "";
              $c2c = "";
              
              $c3a = "";
              $c3b = "";
              $c3c = "";
              foreach($centroid->result_array() as $c)
              {
                $c1a = $c['c1a'];
                $c1b = $c['c1b'];
                $c1c = $c['c1c'];
                
                $c2a = $c['c2a'];
                $c2b = $c['c2b'];
                $c2c = $c['c2c'];
                
                $c3a = $c['c3a'];
                $c3b = $c['c3b'];
                $c3c = $c['c3c'];
              }
              $c1a_b = "";
              $c1b_b = "";
              $c1c_b = "";
              
              $c2a_b = "";
              $c2b_b = "";
              $c2c_b = "";
              
              $c3a_b = "";
              $c3b_b = "";
              $c3c_b = "";
              
              $hc1=0;
              $hc2=0;
              $hc3=0;
              
              $no=0;
              $arr_c1 = array();
              $arr_c2 = array();
              $arr_c3 = array();
              
              $arr_c1_temp = array();
              $arr_c2_temp = array();
              $arr_c3_temp = array();
            ?>
            <div class="table-responsive">
            <table  id="table_data" class="table table-bordered table-admin">
              <tr align="center"><td rowspan="2">No Puskesmas</td><td rowspan="2">Nama Puskesmas</td><td rowspan="2">Jumlah Pasien Total</td><td rowspan="2">Ketersedian Obat</td><td rowspan="2">Jumlah Fasilitas</td>
              <td colspan="3">Centroid 1</td><td colspan="3">Centroid 2</td><td colspan="3">Centroid 3</td><td rowspan="2" width="30">C1</td><td rowspan="2" width="30">C2</td><td rowspan="2" width="30">C3</td>
              </tr>
              <tr align="center">
              <td><?php echo $c1a; ?></td><td><?php echo $c1b; ?></td><td><?php echo $c1c; ?></td>
              <td><?php echo $c2a; ?></td><td><?php echo $c2b; ?></td><td><?php echo $c2c; ?></td>
              <td><?php echo $c3a; ?></td><td><?php echo $c3b; ?></td><td><?php echo $c3c; ?></td>
              </tr>
              <?php 
              foreach($data_puskesmas->result_array() as $s){ ?>
              <tr><td><?php echo $s['no_puskesmas']; ?></td><td><?php echo $s['nama_puskesmas']; ?></td><td><?php echo $s['jumlah_pasien_total']; ?></td><td><?php echo $s['ketersediaan_obat_total']; ?></td><td><?php echo $s['jumlah_fasilitas_total']; ?></td>
              
              <td colspan="3"><?php 
                $hc1 = sqrt(pow(($s['jumlah_pasien_total']-$c1a),2)+pow(($s['ketersediaan_obat_total']-$c1b),2)+pow(($s['jumlah_fasilitas_total']-$c1c),2));
                echo $hc1;
              ?></td>
              <td colspan="3"><?php 
                $hc2 = sqrt(pow(($s['jumlah_pasien_total']-$c2a),2)+pow(($s['ketersediaan_obat_total']-$c2b),2)+pow(($s['jumlah_fasilitas_total']-$c2c),2));
                echo $hc2;
              ?></td>
              <td colspan="3"><?php 
                $hc3 = sqrt(pow(($s['jumlah_pasien_total']-$c3a),2)+pow(($s['ketersediaan_obat_total']-$c3b),2)+pow(($s['jumlah_fasilitas_total']-$c3c),2));
                echo $hc3;
              ?></td>
              <?php 
              
              if($hc1<=$hc2)
              {
                if($hc1<=$hc3)
                {
                  $arr_c1[$no] = 1;
                }
                else
                {
                  $arr_c1[$no] = '0';
                }
              }
              else
              {
                $arr_c1[$no] = '0';
              }
              
              if($hc2<=$hc1)
              {
                if($hc2<=$hc3)
                {
                  $arr_c2[$no] = 1;
                }
                else
                {
                  $arr_c2[$no] = '0';
                }
              }
              else
              {
                $arr_c2[$no] = '0';
              }
              
              if($hc3<=$hc1)
              {
                if($hc3<=$hc2)
                {
                  $arr_c3[$no] = 1;
                }
                else
                {
                  $arr_c3[$no] = '0';
                }
              }
              else
              {
                $arr_c3[$no] = '0';
              }
              
              $arr_c1_temp[$no] = $s['jumlah_pasien_total'];
              $arr_c2_temp[$no] = $s['ketersediaan_obat_total'];
              $arr_c3_temp[$no] = $s['jumlah_fasilitas_total'];
              
              $warna1="";
              $warna2="";
              $warna3="";
              ?>
              <?php if($arr_c1[$no]==1){$warna1='#FFFF00';} else{$warna1='#ccc';} ?><td bgcolor="<?php echo $warna1; ?>"><?php echo $arr_c1[$no] ;?></td>
              <?php if($arr_c2[$no]==1){$warna2='#FFFF00';} else{$warna2='#ccc';} ?><td bgcolor="<?php echo $warna2; ?>"><?php echo $arr_c2[$no] ;?></td>
              <?php if($arr_c3[$no]==1){$warna3='#FFFF00';} else{$warna3='#ccc';} ?><td bgcolor="<?php echo $warna3; ?>"><?php echo $arr_c3[$no] ;?></td>
              </tr>
              <?php
              $q = "insert into centroid_temp(iterasi,c1,c2,c3) values('".$id."','".$arr_c1[$no]."','".$arr_c2[$no]."','".$arr_c3[$no]."')";
              $this->db->query($q);
              
              $no++; } 
              
              //centroid baru 1.a
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c1);$i++)
              {
                $arr[$i] = $arr_c1_temp[$i]*$arr_c1[$i];
                if($arr_c1[$i]==1)
                {
                  $jum++;
                }
              }
              $c1a_b = array_sum($arr)/$jum;
              
              //centroid baru 1.b
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c2);$i++)
              {
                $arr[$i] = $arr_c2_temp[$i]*$arr_c1[$i];
                if($arr_c1[$i]==1)
                {
                  $jum++;
                }
              }
              $c1b_b = array_sum($arr)/$jum;
              
              //centroid baru 1.c
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c3);$i++)
              {
                $arr[$i] = $arr_c3_temp[$i]*$arr_c1[$i];
                if($arr_c1[$i]==1)
                {
                  $jum++;
                }
              }
              $c1c_b = array_sum($arr)/$jum;
              
              
              
              
              //centroid baru 2.a
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c1);$i++)
              {
                $arr[$i] = $arr_c1_temp[$i]*$arr_c2[$i];
                if($arr_c2[$i]==1)
                {
                  $jum++;
                }
              }
              $c2a_b = array_sum($arr)/$jum;

              
              
              //centroid baru 2.b
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c2);$i++)
              {
                $arr[$i] = $arr_c2_temp[$i]*$arr_c2[$i];
                if($arr_c2[$i]==1)
                {
                  $jum++;
                }
              }
              $c2b_b = array_sum($arr)/$jum;
              
              //centroid baru 2.c
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c3);$i++)
              {
                $arr[$i] = $arr_c3_temp[$i]*$arr_c2[$i];
                if($arr_c2[$i]==1)
                {
                  $jum++;
                }
              }
              $c2c_b = array_sum($arr)/$jum;
              
              
              
              
              //centroid baru 3.a
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c1);$i++)
              {
                $arr[$i] = $arr_c1_temp[$i]*$arr_c3[$i];
                if($arr_c3[$i]==1)
                {
                  $jum++;
                }
              }
              $c3a_b = array_sum($arr)/$jum;
              
              //centroid baru 3.b
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c2);$i++)
              {
                $arr[$i] = $arr_c2_temp[$i]*$arr_c3[$i];
                if($arr_c3[$i]==1)
                {
                  $jum++;
                }
              }
              $c3b_b = array_sum($arr)/$jum;
              
              //centroid baru 3.c
              $jum = 0;
              $arr = array();
              for($i=0;$i<count($arr_c3);$i++)
              {
                $arr[$i] = $arr_c3_temp[$i]*$arr_c3[$i];
                if($arr_c3[$i]==1)
                {
                  $jum++;
                }
              }
              $c3c_b = array_sum($arr)/$jum;
              
              
              $q = "insert into hasil_centroid(c1a,c1b,c1c,c2a,c2b,c2c,c3a,c3b,c3c) values('".$c1a_b."','".$c1b_b."','".$c1c_b."','".$c2a_b."','".$c2b_b."','".$c2c_b."','".$c3a_b."','".
              $c3b_b."','".$c3c_b."')";
              $this->db->query($q);
              
              
              
              ?>
            </table>
            </div>
            </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>
      </div>
    </div>
