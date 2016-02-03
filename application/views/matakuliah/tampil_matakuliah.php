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
<a href="<?php echo base_url();?>index.php/matakuliah/tambah" class="btn btn-primary btn-small">tambah data</a>
</p>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>no</th>
			<th>nama jurusan</th>
			<th>kode matakuliah</th>
			<th>nama matkul</th>
			<th>sks</th>
			<th>semeter</th>
			<th>aktif</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php
		$no = 1;
		foreach ($data->result() as $row) {
			$jurusan = $this->model_matakuliah->tampilmatkul($row->kd_prodi);
		?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $jurusan ; ?></td>
			<td><?php echo $row->kd_mk ; ?></td>
			<td><?php echo $row->nama_mk ; ?></td>
			<td><?php echo $row->sks ; ?></td>
			<td><?php echo $row->smt; ?></td>
			<td><?php echo $row->aktif; ?></td>
			
			<td>
				<a href="">edit</a>
				<a href="">delete</a>
			</td>
			
		</tr>
		<?php }?>
	</tbody>
</table>