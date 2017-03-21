    <div class="container margin-b70">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Selamat Datang, Primpinan!</strong>. Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di atas.
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-info">
          <?php foreach ($wewenang as $w): ?>
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $w['title']?> </h3>
            </div>
            <div class="panel-body">  
                <?php echo $w['sub']?>             
            </div>
            <?php endforeach ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-info">
            <?php foreach ($petunjuk as $p): ?>
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $p['title']?> </h3>
            </div>
            <div class="panel-body">  
                <?php echo $p['sub']?>             
            </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
