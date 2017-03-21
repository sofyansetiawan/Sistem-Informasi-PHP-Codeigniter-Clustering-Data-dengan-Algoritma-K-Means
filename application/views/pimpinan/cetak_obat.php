  
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
                <a class="navbar-brand" href="#">Daftar Obat</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                  <li><a href="<?php echo base_url() ?>pimpinan/cetak_obat/view" target="_blank"><i class="fa fa-print"></i> CETAK DATA</a></li>
                </ul>
                
                </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
              </nav>
              
            </div>
          </div>
          <div class="table-responsive">
            <table id="table_data" class="table table-bordered table-striped table-admin">
            <thead><tr><th>No</th><th>Nama Obat</th><th>Kemasan</th><th>Kebutuhan</th><th>Ketersediaan</th><th>Persen Ketersediaan</th><th>Total Ketersediaan</th></tr></thead>
            <tbody>
            <?php foreach ($data_obat as $o): ?>    
            <tr>
            <td><?=$o['no'] ?></td>
            <td><?=$o['nama_obat'] ?></td>
            <td><?=$o['kemasan'] ?></td>
            <td><?=$o['kebutuhan'] ?></td>
            <td><?=$o['ketersediaan'] ?></td>
            <td><?=$o['persen_ketersediaan'] ?></td>
            <td><?=$o['total_sedia'] ?></td>
            
            </tr>
            <?php endforeach ?>
            </tbody>
            </table>

          </div>

        </div>
        
