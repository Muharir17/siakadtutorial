<script type="text/javascript">
$(document).ready(function(){
	//alert('Apakah JQuer berjalan dengan normal');
});
	$(function() {
		//javascript untuk memanggil plugin data table , samakan dengan nama ID table 
		var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [ // script dibawah harus di samakan dengan jumlah kolom di table, kalo tidak sama dengan kolom table akan error sorting,paging dan searching
			      null,null,null, null,null, null,null,
				  { "bSortable": false } //script ini tidak membuat sortiran
				] } );
	})
</script>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">Data Mata Kuliah</h3>
	
	<table id="sample-table-2" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Jurusan</th>
				<th>Kode</th>
				<th>Nama Mata Kuliah</th>
				<th>SKS</th>
				<th>SMT</th>
				<th>Status</th>
				<th class="hidden-480">Aksi</th>
			</tr>
		</thead>

		<tbody>
		<?php
		//$this->load->model('m_matakuliah');
		//untuk menampilkan data dari table, diambil dari variable table yg ada di controller jurusan
		//data di parshing / lempar dari controller
		$no=1;
		foreach($data->result() as $row){
			//mengambil nama jurusan pada model matakuliah
			$jurusan = $this->model_matakuliah->tampilmatkul($row->kd_prodi);
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $jurusan;?></td>	
				<td><?php echo $row->kd_mk;?></td>
				<td><?php echo $row->nama_mk;?></td>
				<td><?php echo $row->sks;?></td>
				<td><?php echo $row->smt;?></td>
				<td><?php echo $row->aktif;?></td>
				<td class="td-actions">
					<div class="hidden-phone visible-desktop action-buttons">
						<!-- edit data berdasarkan kd_prodi -->
						<!-- proses edit menggunakan javasript, salah ambil file -->
						<a class="green" href="javascript:void(0)"  onclick="editData('<?php echo $row->kd_mk;?>')">
							<i class="icon-pencil bigger-130"></i>
						</a>
						<!-- buat juga fungsi hapusData pada javascript -->
						<a class="red" href="javascript:void(0);" onclick="hapusData('<?php echo $row->kd_mk;?>')"> <!-- sedikit penambahan javascript untuk konfirmasi --> 
							<i class="icon-trash bigger-130"></i>
						</a>
					</div>
					<!-- script yg di bawah ini hanya animasi -->
					<div class="hidden-desktop visible-phone">
						<div class="inline position-relative">
							<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
								<i class="icon-caret-down icon-only bigger-120"></i>
							</button>

							<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
								

								<li>
									<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
										<span class="green">
											<i class="icon-edit bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
										<span class="red">
											<i class="icon-trash bigger-120"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
	