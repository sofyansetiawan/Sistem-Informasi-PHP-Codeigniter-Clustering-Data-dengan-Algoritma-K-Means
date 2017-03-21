    
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
                  echo "</i> Tambah Data Penyakit</a>";
                  }
                  else {
                  echo "</i> Edit Data Penyakit</a>";
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
              <form class="form-horizontal" role="form" method="post" action="<?=base_url();?>administrasi/data_penyakit/save" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="no_penyakit" value="<?=$no_penyakit ?>" />
                <input type="hidden" class="form-control" name="status" value="<?=$status ?>" />
                <div class="form-group">
                  <label for="inputKK" class="col-sm-3 control-label">Nama Penyakit</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-medkit"></i>
                      <input type="text" name="nama_penyakit" value="<?php echo $nama_penyakit ?>" required class="form-control" id="inputKK" placeholder="Nama Penyakit" />
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputth" class="col-sm-3 control-label">Pilih Tahun</label>
                  <div class="col-sm-6">
                    <select name="no" class="select2" required>
                      <option value=""> -- Pilih Obat-- </option>
                      <?php foreach ($no as $pt): ?>
                          <option value="<?=$pt['no']?>"><?=$pt['no']?> - <?=$pt['nama_obat']?></option>
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
                    </button>&nbsp;&nbsp;<a href="<?php echo base_url() ?>administrasi/data_penyakit" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>