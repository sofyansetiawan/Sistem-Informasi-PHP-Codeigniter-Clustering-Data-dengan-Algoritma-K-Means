<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-default navbar-utama" role="navigation">
      <div class="container">
        
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">
          <img src="<?php echo base_url();?>assets/img/logo-navbar.png" class="logo-navbar">
          <strong>SISTEM INFORMASI CERDAS</strong>
          </a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li><a href="<?php echo base_url();?>petunjuk"><i class="fa fa-book"></i> Petunjuk Penggunaan</a></li>
            <li><a href="<?php echo base_url();?>tentang"><i class="fa fa-user"></i> Tentang</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in"></i> Login <i class="fa fa-caret-down"></i></a>
              <ul class="dropdown-menu tipe-kanan dropdown-menu-login">
                <li>
                  <div class="row">
                    <div class="col-md-12">
                      <form action="<?php echo base_url();?>auth" method="post">
                        <input required class="form-control" type="text" name="username" placeholder="Username">
                        <br />
                        <input required class="form-control" type="password" name="password" placeholder="Password">
                        <br />
                        <select required name="level" class="form-control">
                          <option value="">-Pilih Level-</option>
                          <option value="2">Pimpinan</option>
                          <option value="3">Supplier</option>
                          <option value="1">Administrasi</option>
                        </select>
                        </br />
                        <button type="submit" class="btn btn-lg btn-block btn-info">Login</button>
                        <br />
                        <!-- <small><a href="" class="link2 pull-right text-muted lupa-pass"><i class="fa fa-lock text-muted"></i> Lupa Password?</a></small> -->
                      </form>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>