<script type="text/javascript">
	function cekform()
	{
		if(!$("#kode").val())
		{
			alert('kode tidak boleh kosong');
			$("#kode").focus()
			return false;
		}

		if(!$("#jurusan").val())
		{
			alert('jurusan tidak boleh kosong');
			$("#jurusan").focus()
			return false;
		}

		if(!$("#singkat").val())
		{
			alert('singkat tidak boleh kosong');
			$("#singkat").focus()
			return false;
		}

		if(!$("#ketua").val())
		{
			alert('ketua tidak boleh kosong');
			$("#ketua").focus()
			return false;
		}

		if(!$("#nik").val())
		{
			alert('nik tidak boleh kosong');
			$("#nik").focus()
			return false;
		}

		if(!$("#akreditasi").val())
		{
			alert('akreditasi tidak boleh kosong');
			$("#akreditasi").focus()
			return false;
		}
	}
</script>

<?php
$info = $this->session->flashdata('info');
if(!empty($info))
{
	echo $info;
}
?>

<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/jurusan/simpan" onsubmit="return cekform();">
	<div class="control-group">
		<label class="control-label">kode jurusan</label>
		<div class="controls">
			<input type="text" name="kode" id="kode" placeholder="kode" class="span1" value="<?php echo $kode; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">jurusan</label>
		<div class="controls">
			<input type="text" name="jurusan" id="jurusan" placeholder="jurusan" class="span3" value="<?php echo $jurusan; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">singkatan</label>
		<div class="controls">
			<input type="text" name="singkat" id="singkat" placeholder="singkat" class="span1" value="<?php echo $singkat; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">ketua jurusan</label>
		<div class="controls">
			<input type="text" name="ketua" id="ketua" placeholder="ketua" class="span2" value="<?php echo $ketua; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">nik</label>
		<div class="controls">
			<input type="text" name="nik" id="nik" placeholder="nik" class="span2" value="<?php echo $nik; ?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">akreditasi</label>
		<div class="controls">
			<input type="text" name="akreditasi" id="akreditasi" placeholder="akreditasi" class="span1" value="<?php echo $akreditasi; ?>">
		</div>
	</div>

	<div>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<button type="submit" class="btn btn-primary btn-small">simpan</button>
		<a href="<?php echo base_url();?>index.php/jurusan" class="btn btn-primary btn-small">tutup</a>
	</div>

</form>