    
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
                  echo "</i> Tambah Data Jumlah Obat</a>";
                  }
                  else {
                  echo "</i> Edit Data Jumlah Obat</a>";
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
              <form class="form-horizontal" role="form" method="post" action="<?=base_url();?>administrasi/data_jumlah_obat_puskesmas/save" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="no_jumlah_obat" value="<?=$no_jumlah_obat ?>" />
                <input type="hidden" class="form-control" name="status" value="<?=$status ?>" />

                <div class="form-group">
                  <label for="inputth" class="col-sm-3 control-label">Pilih Puskesmas</label>
                  <div class="col-sm-6">
                    <select name="no_puskesmas" class="select2" required>
                      <option value=""> -- Pilih Puskesmas -- </option>
                      <?php foreach ($no_puskesmas as $pt): ?>
                          <option value="<?=$pt['no_puskesmas']?>"><?=$pt['no_puskesmas']?> - <?=$pt['nama_puskesmas']?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputpp" class="col-sm-3 control-label">Pilih Obat</label>
                  <div class="col-sm-6">
                    <select name="no" class="select2" required>
                      <option value=""> -- Pilih Obat -- </option>
                      <?php foreach ($no as $pp): ?>
                          <option value="<?=$pp['no']?>"><?=$pp['no']?> - <?=$pp['nama_obat']?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputppp" class="col-sm-3 control-label">Jumlah Obat</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-user"></i>
                      <input type="text" name="jumlah_obat" value="<?php echo $jumlah_obat ?>" required class="form-control" id="inputppp" placeholder="Jumlah Obat" />
                      </div>
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
                    </button>&nbsp;&nbsp;<a href="<?php echo base_url() ?>administrasi/data_jumlah_obat_puskesmas" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>