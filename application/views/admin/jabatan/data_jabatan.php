<button type="button" class="tambah btn-sm btn-success mb-3" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> Tambah Jabatan</button>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="judul"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="tampil_modal">
                            <!-- Data akan di tampilkan disini-->
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4">
                            <input id="myInput" class="form-control" type="text"placeholder="Search..">
                        </div>
                    </div>
                    <br>
                    <tr>
                        <th>No</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan Transport</th>
                        <th>Uang Makan</th>
                        <th>Total</th>
                        <th colspan='2'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach ($hasil as $item)
                        {
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $item->nama_jabatan;?></td>
                        <td>Rp. <?php echo number_format($item->gaji_pokok,0,',','.')?></td>
                        <td>Rp. <?php echo number_format($item->tj_transport,0,',','.')?></td>
                        <td>Rp. <?php echo number_format($item->uang_makan,0,',','.')?></td>
                        <td>Rp. <?php echo number_format($item->gaji_pokok + $item->tj_transport + $item->uang_makan,0,',','.')?>
                        <td>
                        <button type="button" nama_jabatan="<?php echo $item->nama_jabatan; ?>" class="edit btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                        <button type="button" nama_jabatan="<?php echo $item->nama_jabatan; ?>" class="hapus btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    <?php
                        $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
    $(document).ready(function(){

        $('.tambah').click(function(){
        var aksi = 'Tambah';
        $.ajax({
            url: '<?php echo base_url(); ?>admin/data_jabatan/tambah_jabatan',
            method: 'post',
            data: {aksi:aksi},
            success:function(data){
                $('#myModal').modal("show");
                $('#tampil_modal').html(data);
                document.getElementById("judul").innerHTML='Tambah';

            }
        });
        });

        $('.edit').click(function(){

            var nama_jabatan = $(this).attr("nama_jabatan");
            $.ajax({
                url: '<?php echo base_url(); ?>admin/data_jabatan/edit_jabatan',
                method: 'post',
                data: {nama_jabatan:nama_jabatan},
                success:function(data){
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML='Edit';  
                }
            });
        });

        $('.hapus').click(function(){

            var nama_jabatan = $(this).attr("nama_jabatan");
            $.ajax({
                url: '<?php echo base_url(); ?>admin/data_jabatan/hapus_jabatan',
                method: 'post',
                data: {nama_jabatan:nama_jabatan},
                success:function(data){
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML='Hapus';
                }
            });
            });
    });
</script>

