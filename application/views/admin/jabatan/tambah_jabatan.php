<form method="post" id="form">
    <div class="form-group">
        <label for="email">Nama Jabatan</label>
        <input type="text" class="form-control"  name="nama_jabatan" placeholder="Masukan Nama Jabatan">
    </div>
    <div class="form-group">
        <label for="email">Gaji Pokok</label>
        <input type="text" class="form-control"  name="gaji_pokok" placeholder="Masukan Gaji Pokok">
    </div>
    <div class="form-group">
        <label for="email">Tunjangan Transport</label>
        <input type="text" class="form-control"  name="tj_transport" placeholder="Masukan Tunjangan Transport">
    </div>
    <div class="form-group">
        <label for="email">Uang Makan</label>
        <input type="text" class="form-control"  name="uang_makan" placeholder="Masukan Uang Makan">
    </div>
    <button id="tombol_tambah" type="button" class="btn btn-primary" data-dismiss="modal" >Tambah</button>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tombol_tambah").click(function(){
            var data = $('#form').serialize();
            $.ajax({
                type	: 'POST',
                url	: "<?php echo base_url(); ?>admin/data_jabatan/simpanJabatan",
                data: data,
                cache	: false,
                success	: function(data){
                    $('#tampil').load("<?php echo base_url(); ?>admin/data_jabatan/tampilJabatan");
                }
            });
        });
    });
</script> 