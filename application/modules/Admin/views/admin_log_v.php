<div class="container-fluid">
 <div id="ui-view" style="opacity: 1;">
  <div class="animated fadeIn">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
	 <div class="card">
	  <div class="card-header">
	  <strong>Kontributor</strong>
	  <small>Data</small>
	  </div>
	 <div class="card-body">
	  <div class="row">
	   <div id="not" style="width: 100%">
	    <?php echo $this->session->flashdata('alert'); ?>	
	   </div>
	   <table class="table table-striped table-bordered datatable">
		<thead>
		<th style="width: 1%; vertical-align: middle;">No</th>
		<th style="width: 1%; vertical-align: middle;">ID Kontributor</th>
		<th style="width: 8%; vertical-align: middle;">Kategori</th>
		<th style="width: 14%; vertical-align: middle;">Nama Do'a</th>
		<th style="width: 14%; vertical-align: middle;">Do'a sebelum</th>
		<th style="width: 14%; vertical-align: middle;">Do'a sesudah</th>
		<th style="width: 3%; vertical-align: middle;">Waktu</th>
	   </thead>
       <tbody>
	   	<?php
	   	$no=1;  
	   	foreach ($data as $row) 
	   	{
	   	?>
	   		<tr>
	   			<td><?php echo $no++; ?></td>
	   			<td><?php echo $row['id_kontributor']; ?></td>
	   			<td><?php echo $row['kategori']; ?></td>
	   			<td><?php echo $row['nama_doa']; ?></td>
	   			<td style="text-align: right;font-family: 'Amiri';font-size: 14pt;"><?php echo $row['doa_sebelum']; ?></td>
	   			<td style="text-align: right;font-family: 'Amiri';font-size: 14pt;"><?php echo $row['doa_sesudah']; ?></td>
	   			<td><?php echo date("d-m-Y H:i:s", strtotime($row['waktu'])); ?></td>
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