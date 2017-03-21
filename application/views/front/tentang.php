    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <div class="ukuran500 tengah">
          <div class="head-depan tengah">
            <div class="row">
              <div class="col-md-3">
                <img class="img-thumbnail img-responsive margin-b10" src="<?php echo base_url();?>assets/img/logo-SMA.png" width="100" height="100" alt="Logo SMA Karangan" />
              </div>
              <div class="col-md-9">
                <?php foreach ($titlesistem as $t): ?>
                  <h3 class="judul-head"><?php echo $t['title']?></h3>
                  <p><i class="fa fa-cog fa-fw"></i> <?php echo $t['sub']?></p>             
                <?php endforeach ?>  
              </div>
            </div>
            <hr class="hr1 margin-b-10" />
          </div>
        </div>

        <div class="ukuran600 tengah margin-b50">
          <div class="login-container">
          <?php foreach ($tentang as $te): ?>
            <h3 class="text-center text-warning"><?php echo $te['title'] ?></h3>
            <hr class="hr1" />
            <div class="tentang">
            <p>
              <?php echo $te['sub'] ?>
            </p>
            </div>
            <?php endforeach ?>
          </div>
        </div>
        </div>
      </div>
    </div>