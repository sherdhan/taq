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
                <form action="<?php echo base_url('admin/update_kontributor/').$data['id_kontributor']; ?>" method="POST" data-parsley-validate enctype="multipart/form-data" style="width: 100%">

                  <div class="form-group">
                    <label style="margin-left: 20%;">Nama Lengkap</label>
                    <input disabled type="text" required="required" class="col-md-4"  name="fullname" value="<?php echo $data['fullname']; ?>">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 25%;">Alamat</label>
                    <textarea disabled required class="col-md-4" name="alamat"><?php echo $data['alamat']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 25.5%;">E-mail</label>
                    <input type="email" required class="col-md-4"  name="email" value="<?php echo $data['email']; ?>" disabled>
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 25%;">No. HP</label>
                    <input type="number" required class="col-md-4"  name="hp" value="<?php echo $data['hp']; ?>" disabled>
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 25.5%;">Status</label>
                    <select  required class="col-md-4" name="status">
                      <?php  
                      if ($data['status']==1) 
                      { ?>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
               <?php  }
                      else
                      { ?>
                        <option value="0">Tidak Aktif</option>
                        <option value="1">Aktif</option>
                <?php }
                      ?>
                    </select>
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