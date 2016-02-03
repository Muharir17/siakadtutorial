<table id="sample-table-2" class="table table-striped table-bordered table-hover" border='1'>
	<thead>
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Jurusan</th>
			<th>Singkatan</th>
			<th>Ketua Jurusan</th>
			<th>NIK</th>
			<th>Akreditasi</th>
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
			
		</tr>
		<?php }?>
	</tbody>
</table>