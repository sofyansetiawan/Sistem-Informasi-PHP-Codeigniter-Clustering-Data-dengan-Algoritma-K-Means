
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

        <div class="ukuran450 tengah margin-b50">
          <div class="login-container">
            <?php
              if($msg = $this->session->flashdata('error')){
                echo $msg;
              }
            ?>
            <div id="output"></div>

            <div class="form-box">
              <form action="<?=base_url()?>auth" method="post">
                <legend><h3 class="text-center">Login</h3></legend>
                <div class="left-inner-addon2">
                  <i class="fa fa-user"></i>
                  <input required name="username" class="input-lg form-control" type="text" placeholder="Username">
                </div>
                <div class="left-inner-addon2">
                  <i class="fa fa-lock"></i>
                  <input required name="password" type="password" class="input-lg form-control" placeholder="Password">
                </div>
                <div class="left-inner-addon2">
                  <i class="fa fa-calendar-o"></i>
                  <select name="level" class="form-control input-lg" required>
                    <option value="">-Pilih Level-</option>
                    <option value="2">Pimpinan</option>
                    <option value="3">Supplier</option>
                    <option value="1">Administrasi</option>
                  </select>
                </div>
                <div class="form-group">
                  <button class="btn btn-info btn-lg btn-block login" type="submit">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    