    
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
                  echo "</i> Tambah Data Obat</a>";
                  }
                  else {
                  echo "</i> Edit Data Obat</a>";
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
              <form class="form-horizontal" role="form" method="post" action="<?=base_url();?>administrasi/data_obat/save" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="no" value="<?=$no ?>" />
                <input type="hidden" class="form-control" name="status" value="<?=$status ?>" />
                <div class="form-group">
                  <label for="inputKK" class="col-sm-3 control-label">Nama Obat</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-medkit"></i>
                      <input type="text" name="nama_obat" value="<?php echo $nama_obat ?>" required class="form-control" id="inputKK" placeholder="Nama Obat" />
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama" class="col-sm-3 control-label">Kemasan</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-archive"></i>
                      <input type="text" name="kemasan" required class="form-control" value="<?php echo $kemasan ?>"id="inputNama" placeholder="Kemasan ampul/tablet/strip/blister/kotak" />
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama" class="col-sm-3 control-label">Kebutuhan</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-exchange"></i>
                      <input type="text" name="kebutuhan" required class="form-control"  value="<?php echo $kebutuhan ?>" id="inputNama" placeholder="Kebutuhan dalam jumlah satuan" />
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama" class="col-sm-3 control-label">Ketersediaan</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-stack-exchange"></i>
                      <input name="ketersediaan" required type="text" class="form-control" id="inputNama" value="<?php echo $ketersediaan ?>" placeholder="Ketersediaan dalam jumlah satuan" />
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama" class="col-sm-3 control-label">Persen Ketersediaan</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-sort-numeric-desc"></i>
                      <input type="text" name="persen_ketersediaan" required class="form-control" id="inputNama" placeholder="Dalam jumlah persen %" value="<?php echo $persen_ketersediaan ?>" />
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNama" class="col-sm-3 control-label">Total ketersediaan</label>
                  <div class="col-sm-6">
                  <div class="left-inner-addon">
                  <i class="fa fa-sort-numeric-desc"></i>
                      <input name="total_sedia" required type="text" class="form-control" id="inputNama" placeholder="Dalam jumlah persen %" value="<?php echo $total_sedia ?>" />
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
                    </button>&nbsp;&nbsp;<a href="<?php echo base_url() ?>administrasi/data_obat" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>