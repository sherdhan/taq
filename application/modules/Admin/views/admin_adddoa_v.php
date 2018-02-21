<div class="container-fluid">
 <div id="ui-view" style="opacity: 1;">
  <div class="animated fadeIn">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
     <div class="card">
      <div class="card-header">
       <strong>Nama Do'a</strong>
       <small>Tambah Data</small>
      </div>
      <div class="card-body">
       <div class="row">
        <div id="not" style="width: 100%">
          <?php echo $this->session->flashdata('alert'); ?> 
        </div> 
        <form action="<?php echo base_url('admin/add_doa'); ?>" method="POST" data-parsley-validate enctype="multipart/form-data" style="width: 100%">
          
         <div class="form-group">
          <label style="margin-left: 22.5%;">Nama Do'a</label>
          <select name="id_item" required class="col-md-4" >
           <option disabled selected>--Pilih Nama Do'a--</option>
             <?php echo $data; ?>
          </select>
         </div>

         <div class="form-group">
           <label style="margin-left: 25%;">Nomor</label>
           <input type="number" required="required" class="col-md-1" name="nomor">
         </div>
         
         <div class="form-group">
           <label style="margin-left: 26.5%;">Do'a</label>
           <textarea name="doa" class="col-md-7" style="direction: rtl; text-align: right;font-family: 'Amiri';font-size: 14pt;" required></textarea>
         </div>

         <div class="form-group">
           <label style="margin-left: 27%;">Arti</label>
           <textarea name="arti" class="col-md-7" required></textarea>
         </div>

         <div class="form-group">
           <label style="margin-left: 23%;">Cara Baca</label>
           <textarea name="indo" class="col-md-7" required></textarea>
         </div>

         <div class="form-group">
           <label style="margin-left: 24.7%;">Dibaca</label>
           <input type="number" name="kali" class="col-md-1" required></input>
           <label">Kali</label>
         </div> 

         <div class="form-group">
           <label style="margin-left: 24%;">Sumber</label>
           <input name="sumber" class="col-md-7" required></input>
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