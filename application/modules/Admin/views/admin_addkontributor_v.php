<div class="container-fluid">
  <div id="ui-view" style="opacity: 1;">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <strong>Kategori</strong>
              <small>Tambah Data</small>
            </div>
            <div class="card-body">
              <div class="row">
                <div id="not" style="width: 100%">
                  <?php echo $this->session->flashdata('alert'); ?> 
                </div>
                <form action="<?php echo base_url('admin/add_kontributor'); ?>" method="POST" data-parsley-validate enctype="multipart/form-data" style="width: 100%">

                  <div class="form-group">
                    <label style="margin-left: 20%;">Nama Lengkap</label>
                    <input type="text" required="required" class="col-md-4"  name="fullname">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 25%;">Alamat</label>
                    <textarea required class="col-md-4" name="alamat"></textarea>
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 25.5%;">E-mail</label>
                    <input type="email" required class="col-md-4"  name="email">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 25%;">No. HP</label>
                    <input type="number" required class="col-md-4"  name="hp">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 23.2%;">Username</label>
                    <input type="text" required class="col-md-4"  name="username">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 23.5%;">Password</label>
                    <input type="password" required="required" class="col-md-4"  name="password">
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div style="margin-left: 30%;">
                      <button class="btn btn-success">Simpan</button>
                      <button class="btn btn-primary" type="reset">Reset</button>
                      <button class="btn btn-outline-secondary" onclick="window.history.go(-1); return false;">Kembali</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>