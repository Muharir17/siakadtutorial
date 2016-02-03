<script type="text/javascript">
	$(document).ready(function(){

		
		function getDataMK()
	{
		var jurusan = $("#jurusan").val();
		//di pancing apakah javascript jalan
		//alert(jurusan);

		$.ajax({
			type  : 'post',
			url   : '<?php echo site_url();?>/matakuliah/getDataMK',
			data  : 'jurusan='+jurusan, //jangan ada titik //varible yg di kirim 
			success : function(data){
				$("#view_data").html(data); // data di tampung di div view data
			}
		});
	}

	$("#jurusan").change(function(){  //jika dipilih jurusan akan menampilan data mata kuliah berdasarkan jurusan
		//membanggil fungsi getDataMK
		getDataMK();
		//dilanjutkan dengan membuat class getDataMk di controller
	});

		$("#simpan").click(function(){
			var string = $("#my-form").serialize();
			//alert(string);
			$.ajax({
				type	: 'POST',
				url 	: '<?php echo site_url();?>/matakuliah/simpan',
				data	: string,
				success	: function(data){
					alert(data);
				}
			});
		});
	});
</script>


<form class="form-horizontal" name="my-form" id="my-form">
	<div class="control-group">
		<label class="control-label">jurusan</label>
		<div class="controls">
			<select name="jurusan" id="jurusan">
				<option value="">-pilih-</option>
				<?php
				$jurusan = $this->db->get('prodi');
				foreach ($jurusan->result() as $row) {		
				
				?>
				<option value="<?php echo $row->kd_prodi;?>"><?php echo $row->prodi;?></option>
				<?php }?>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">kode matakuliah</label>
		<div class="controls">
			<input type="text" name="kode" id="kode" placeholder="kode" class="span1">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">nama matakuliah</label>
		<div class="controls">
			<input type="text" name="makul" id="makul" placeholder="nama matakuliah" class="span3">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">sks</label>
		<div class="controls">
			<input type="text" name="sks" id="sks" placeholder="sks" class="span1">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">semester</label>
		<div class="controls">
			<input type="text" name="smt" id="smt" placeholder="semester" class="span1">
		</div>
	</div>

	<div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="button" name="simpan" id="simpan" class="btn btn-primary btn-small">simpan</button>
	</div>
</form>

<div id="view_data"></div>