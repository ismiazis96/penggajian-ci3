<form method="post" id="form">
    <div class="form-group">
        <label for="nama_jabatan">Nama Jabatan</label>
        <input type="text" class="form-control" value="<?php echo $hasil->nama_jabatan; ?>" name="nama_jabatan_baru" placeholder="Masukan Nama Jabatan">
    </div>
    <div class="form-group">
         <label for="gaji_pokok">Gaji Pokok</label>
        <input type="text" class="form-control" value="<?php echo $hasil->gaji_pokok; ?>" name="gaji_pokok" placeholder="Masukan Gaji Pokok" >
    </div>
    <div class="form-group">
         <label for="tj_transport">Tunjangan Transport</label>
        <input type="text" class="form-control" value="<?php echo $hasil->tj_transport; ?>" name="tj_transport" placeholder="Masukan Tunjangan Transport" >
    </div>
    <div class="form-group">
         <label for="uang_makan">Uang Makan</label>
        <input type="text" class="form-control" value="<?php echo $hasil->uang_makan; ?>" name="uang_makan" placeholder="Masukan Uang Makan" >
    </div>
    <input type="hidden" name="nama_jabatan_lama" value="<?php echo $hasil->nama_jabatan;?>">
    <button id="tombol_edit" type="button" class="btn btn-sm btn-info" data-dismiss="modal" ><i class="fas fa-edit"></i></button>
</form>
<script type="text/javascript">
        $(document).ready(function(){
            $("#tombol_edit").click(function(){
                var data = $('#form').serialize();
                $.ajax({
                    type	: 'POST',
                    url	: "<?php echo base_url(); ?>admin/data_jabatan/editJabatan",
                    data: data,
                    cache	: false,
                    success	: function(data){
                        $('#tampil').load("<?php echo base_url(); ?>admin/data_jabatan/tampilJabatan");    
                    }
                });
            });
        });
</script> 