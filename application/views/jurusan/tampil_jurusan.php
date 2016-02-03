<script type="text/javascript">
			$(function() {
				
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      null, null,null, null, null, null, null,
				  { "bSortable": false }
				] } );			
				
			})
</script>

<p>
<a href="<?php echo base_url();?>index.php/jurusan/tambah" class="btn btn-primary btn-small">tambah data</a>
</p>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>no</th>
			<th>kode</th>
			<th>jurusan</th>
			<th>singkatan</th>
			<th>ketua jurusan</th>
			<th>nik</th>
			<th>akreditasi</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php
		$no = 1;
		foreach ($data->result() as $row) {
		?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->kd_prodi ;?></td>
			<td><?php echo $row->prodi ;?></td>
			<td><?php echo $row->singkat ;?></td>
			<td><?php echo $row->ketua_prodi ;?></td>
			<td><?php echo $row->nik ;?></td>
			<td><?php echo $row->akreditasi ;?></td>
			<td>
				<a href="<?php echo base_url()?>index.php/jurusan/edit/<?php echo $row->kd_prodi; ?>">edit</a>
				<a href="<?php echo base_url()?>index.php/jurusan/delete/<?php echo $row->kd_prodi; ?>" onclick="return confirm('anda yakin mau menghapus data in broww..??'); ">delete</a>
			</td>
			
		</tr>
		<?php }?>
	</tbody>
</table>