<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>
  <?php echo $this->session->flashdata('pesan')?>
  <a class="btn btn-sm btn-success mb-2 mt-2" href="<?php echo base_url('admin/potongan_gaji/tambah_data') ?>"><i class="fas fa-plus"></i>Tambah Data</a>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
   <div class="card-body">
     <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Jenis Potongan</th>
          <th class="text-center">Jumlah Potongan</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($pot_gaji as $p) : ?>
          <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $p->potongan ?></td>
            <td class="text-center">Rp. <?php echo number_format($p->jml_potongan,0,',','.') ?></td>
            <td>
              <center>
                <a class="btn btn-sm btn-info" href="<?php echo base_url('admin/potongan_gaji/update_data/'.$p->id) ?>"><i class="fas fa-edit"></i></a>
                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/potongan_gaji/delete_data/'.$p->id) ?>"><i class="fas fa-trash"></i></a>
              </center>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->