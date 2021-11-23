<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>

  <div class="card" style="width: 65%">
	<div class="card-body">
		<form method="POST" action="<?php echo base_url('admin/potongan_gaji/tambah_data_aksi')?>">
			
			<div class="form-group">
				<label>Jenis Potongan</label>
				<input type="text" name="potongan" class="form-control">
				<?php echo form_error('potongan', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Jumlah Potongan</label>
				<input type="number" name="jml_potongan" class="form-control">
				<?php echo form_error('jml_potongan', '<div class="text-small text-danger"> </div>')?>
			</div>

			<button type="submit" class="btn btn-success" >Simpan</button>
			<button type="reset" class="btn btn-danger" >Reset</button>
			<a href="<?php echo base_url('admin/potongan_gaji')?>" class="btn btn-warning">Kembali</a>

		</form>
	</div>

</div>
<!-- /.container-fluid -->