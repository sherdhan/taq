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
                <form action="<?php echo base_url('admin/add_kategori'); ?>" method="POST" data-parsley-validate enctype="multipart/form-data" style="width: 100%">

                  <div class="form-group">
                    <label style="margin-left: 25%;">Nomor</label>
                    <input type="number" required="required" class="col-md-1"  name="nomor" value="<?php echo $data['number']+1; ?>">
                  </div>

                  <div class="form-group">
                    <label style="margin-left: 19.2%;">Nama Kategori *</label>
                    <input type="text" name="n_kat" class="col-md-4" required="required">
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