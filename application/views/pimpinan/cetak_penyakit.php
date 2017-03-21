  
    <div class="container margin-b70">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-default navbar-utama nav-admin-data" role="navigation">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Daftar Penyakit</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                  <li><a href="<?php echo base_url() ?>pimpinan/cetak_puskesmas/view" target="_blank"><i class="fa fa-print"></i> CETAK DATA</a></li>
                </ul>
                
                </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
              </nav>
              
            </div>
          </div>
          <div class="table-responsive">
            <table id="table_data" class="table table-bordered table-striped table-admin">
            <thead><tr><th>No</th><th>Nama Penyakit</th><th>Nama Obat</th></tr></thead>
            <tbody>
            <?php foreach ($data_penyakit as $p): ?>    
            <tr>
            <td><?=$p['no_penyakit'] ?></td>
            <td><?=$p['nama_penyakit'] ?></td>
            <td>
            <?php if($p['no']==0 OR $p['no']==null){
            echo "<span style='color:red'>(OBAT TIDAK TERSEDIA)</span>" ?>
            <?php }else{ ?>
            (<?=$p['no'] ?>) <?=$p['nama_obat'] ?>
            <?php } ?>
            </td>
            
            
            </tr>
            <?php endforeach ?>
            </tbody>
            </table>

          </div>

        </div>
        
