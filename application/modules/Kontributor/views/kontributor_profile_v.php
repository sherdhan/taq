<div class="container-fluid">
  <div id="ui-view" style="opacity: 1;">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <strong>Profil</strong>
              <small>Edit Data</small>
            </div>
            <div class="card-body">
              <div class="row">
                <div id="not" style="width: 100%">
                  <?php echo $this->session->flashdata('alert'); ?> 
                </div>
                <form action="<?php echo base_url('kontributor/update_profil/').$data['id_kontributor']; ?>" method="POST" data-parsley-validate enctype="multipart/form-data" style="width: 100%">

                  <div class="form-group">
                    <label style="margin-left: 25%;">Nama Lengkap</label>
                    <input disabled type="text" required="required" class="col-md-4"  name="fullname" value="<?php echo $data['fullname']; ?>">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 30.4%;">E-mail</label>
                    <input disabled type="text" name="email" class="col-md-4" required="required" value="<?php echo $data['email']; ?>">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 30%;">Alamat</label>
                    <textarea required class="col-md-4" name="alamat"><?php echo $data['alamat']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 30%;">No. HP</label>
                    <input type="number" name="hp" class="col-md-4" required="required" value="<?php echo $data['hp']; ?>">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 28.2%;">Username</label>
                    <input disabled type="text" name="username" class="col-md-4" required="required" value="<?php echo $data['username']; ?>">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 24.9%;">Password Lama</label>
                    <input type="password" required="required" class="col-md-4"  name="passwordlama">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 25.4%;">Password Baru</label>
                    <input type="password" required="required" class="col-md-4"  name="password" >
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div style="margin-left: 30%;">
                      <button class="btn btn-warning">Edit</button>
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