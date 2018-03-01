<div class="container-fluid">
 <div id="ui-view" style="opacity: 1;">
  <div class="animated fadeIn">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
	 <div class="card">
	  <div class="card-header">
	  <strong>Kontributor</strong>
	  <small>Data</small>
   	  <a href="<?php echo base_url('admin/tambah_kontributor'); ?>" ><button class="btn btn-primary" type="submit" style="position: absolute; right: 1%;">Tambah Kontributor</button></a>
   	  
	  </div>
	 <div class="card-body">
	  <div class="row">
	   <div id="not" style="width: 100%">
	    <?php echo $this->session->flashdata('alert'); ?>	
	   </div>
	   <table class="table table-striped table-bordered datatable">
		<thead>
		<th style="width: 1%;">id</th>
		<th style="width: 10%;">Nama Kontributor</th>
		<th style="width: 8%;">E-mail</th>
		<th style="width: 14%;">Alamat</th>
		<th style="width: 14%;">No. HP</th>
	   </thead>
       <tbody>
	   	<?php  
	   	foreach ($data as $row) 
	   	{
	   	?>
	   		<tr>
	   			<td><?php echo $row['id_kontributor'] ?></td>
	   			<td><?php echo $row['fullname'] ?></td>
	   			<td><?php echo $row['email'] ?></td>
	   			<td><?php echo $row['alamat'] ?></td>
	   			<td><?php echo $row['hp'] ?></td>
	   		</tr>
	   	<?php	
	   	}
	   	?>
	   </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>	
</div>
</div>
</div>