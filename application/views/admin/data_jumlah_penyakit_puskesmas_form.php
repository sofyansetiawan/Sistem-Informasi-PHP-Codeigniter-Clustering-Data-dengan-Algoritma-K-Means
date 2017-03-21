    
    <div class="container margin-b50 margin-t50">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <nav class="navbar navbar-default navbar-utama nav-admin-data" role="navigation">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <a class="navbar-brand" href="#"><i class="fa fa-plus-circle">
                <?php
                  if($status == 'baru'){
                  echo "</i> Tambah Data Jumlah Penyakit</a>";
                  }
                  else {
                  echo "</i> Edit Data Jumlah Penyakit</a>";
                  }
                ?>
              </div>
              
              </div><!-- /.container-fluid -->
            </nav>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="well">
              <form class="form-horizontal" role="form" method="post" action="<?=base_url();?>administrasi/data_jumlah_penyakit_puskesmas/save" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="no_jumlah_penyakit" value="<?=$no_jumlah_penyakit ?>" />
                <input type="hidden" class="form-control" name="status" value="<?=$status ?>" />

                <div class="form-group">
                  <label for="inputth" class="col-sm-3 control-label">Pilih Tahun</label>
                  <div class="col-sm-6">
                    <select name="no_tahun" class="select2" required>
                      <option value=""> -- Pilih Tahun-- </option>
                      <?php foreach ($no_tahun as $pt): ?>
                          <option value="<?=$pt['no_tahun']?>"><?=$pt['no_tahun']?> - <?=$pt['nama_tahun']?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputpp" class="col-sm-3 control-label">Pilih Puskesmas</label>
                  <div class="col-sm-6">
                    <select name="no_puskesmas" class="select2" required>
                      <option value=""> -- Pilih Puskesmas-- </option>
                      <?php foreach ($no_puskesmas as $pp): ?>
                          <option value="<?=$pp['no_puskesmas']?>"><?=$pp['no_puskesmas']?> - <?=$pp['nama_puskesmas']?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputppp" class="col-sm-3 control-label">Nama Pasien</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-user"></i>
                      <input type="text" name="nama_pasien" value="<?php echo $nama_pasien ?>" required class="form-control" id="inputppp" placeholder="Nama Pasien" />
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputpp" class="col-sm-3 control-label">Pilih Penyakit</label>
                  <div class="col-sm-6">
                    <select name="no_penyakit" class="select2" required>
                      <option value=""> -- Pilih Penyakit-- </option>
                      <?php foreach ($no_penyakit as $pe): ?>
                          <option value="<?=$pe['no_penyakit']?>"><?=$pe['no_penyakit']?> - <?=$pe['nama_penyakit']?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                
                <hr class="hr1">
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary bold"><i class="fa fa-save"></i>
                      <?php
                        if($status == 'baru'){
                          echo "Simpan";
                        }
                        else {
                          echo "Update";
                        }
                      ?>
                    </button>&nbsp;&nbsp;<a href="<?php echo base_url() ?>administrasi/data_jumlah_penyakit_puskesmas" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>