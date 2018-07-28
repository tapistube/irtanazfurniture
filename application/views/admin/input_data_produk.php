<div id="page-wrapper">

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Input Data Produk</h1>
        </div>
        <!--End Page Header -->
    </div>

    <div class="row">
        <!-- Welcome -->
        <div class="col-lg-12">
            <!-- dari sini --->
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                  
                </div>
                <div class="panel-body">

                    <div class="alert alert-danger">
                        <strong><h3>
                                <?php echo validation_errors(); ?>
                        </h3></strong>
                    </div>
                    <br>
                    
                    <?php echo form_open_multipart('Produk/simpan'); ?>
                    <div class="form-group">

                        <div class="col-md-12">
                            <input class="form-control" type="hidden" name="txt_id" placeholder="Id Produk" maxlength="30"
                                   id="txt_id" value="<?php echo $idProduk; ?>" >
                            <br>
                        </div>
                        <br>

                        <div class="col-md-12">
                            <label class="control-label">Nama Produk</label>
                            <input class="form-control" type="text" name="txt_namaProduk" placeholder="Nama Produk" maxlength="30"
                                   id="txt_namaProduk">
                            <br>
                        </div>
                        <br>

                    <div class="col-md-12">
                       <label class="control-label" for="txt_perihal">Kategori</label>
                            <select class="form-control" name="txt_kategori" id="txt_kategori">
                                <option value="" disabled>Pilih Kategori</option>
                                <option value="MejaKursi">Meja & Kursi</option>
                                <option value="Lemari">Lemari</option>
                                <option value="Bufet">Bufet</option>
                                <option value="Tempat Tidur">Tempat tidur</option>
                            </select>
                        <br>
                    </div>
                        <script>
                            function hanyaAngka(evt) {
                                var charCode = (evt.which) ? evt.which : event.keyCode
                                if (charCode > 31 && (charCode < 48 || charCode > 57))

                                    return false;
                                return true;
                            }
                        </script>
                    <br>
                        <div class="col-md-12">
                            <label class="control-label">Stok</label>
                            <input class="form-control" type="text" onkeypress="return hanyaAngka(event)" name="txt_stok" id="txt_stok"
                                   placeholder="Stok produk" maxlength="8"  >
                            <br>
                        </div>
                    <br>

                    <div class="col-md-12">
                        <label class="control-label" for="txt_perihal">Harga</label>
                        <input class="form-control" type="text" name="txt_harga" placeholder="Harga" onkeypress="return hanyaAngka(event)" id="txt_harga" onkeyup="convertToRupiah(this);">
                        <br>
                    </div>

                        <div class="col-md-12">
                            <label for="register-username"><i class="icon-user"></i> <b>Deskripsi Singkat Produk</b></label>
                            <textarea id="txt_deskripsi" class="form-control" name="txt_deskripsi" rows="7" value="<?php echo set_value('txt_deskripsi')?>"></textarea>
                        </div>

                    <div class="col-md-12" id="fgbutton" style="width: 100%">
                        <br>
                        <br>
                        <button class="btn btn-primary btn-orange btn-lg" type="submit" value="tambah_produk" name="tambah_produk" id="tambah_produk">Lanjutkan Ke Upload Foto Produk</button>
                    </div>
                    </div>
                    <?php echo form_close(); ?>

                    <br>

                </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        <!-- Script untuk Action JS  dan Upload Dropzone-->
        <!-- buat dropzone -->
        <script type="text/javascript">
            Dropzone.autoDiscover = false;
            //hati2 di line ini
            var kode_transaksi = "111";

            var foto_upload = new Dropzone(".dropzone",{
                url: "#",
                maxFilesize: 3,
                method:"post",
                acceptedFiles:"image/*",
                paramName:"userfile",
                dictInvalidFileType:"Type file ini tidak dizinkan",
                addRemoveLinks:true,
            });

            //Event ketika Memulai mengupload
            foto_upload.on("sending",function(a,b,c){
                a.token=Math.random();
                c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
                c.append("id_produk",kode_transaksi);
            });

            //Event ketika foto dihapus
            foto_upload.on("removedfile",function(a){
                var token = a.token;
                $.ajax({
                    type:"post",
                    data:{token:token},
                    url:"#",
                    cache:false,
                    dataType: 'json',
                    success: function(){
                        console.log("Foto terhapus");
                    },
                    error: function(){
                        console.log("Error");
                    }
                });
            });
        </script>
            <!-- sampe sini --->
        </div>
    </div>
</div>

</div>


</div>
</div>
</div>
<!-- end wrapper -->




<!-- Core Scripts - Include with every page -->
<script src="<?php echo base_url();?>/assets1/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/jquery-1.10.2.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/pace/pace.js"></script>
<script src="<?php echo base_url();?>/assets4/scripts/siminta.js"></script>
<!-- Page-Level Plugin Scripts-->
<script src="<?php echo base_url();?>/assets4/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/morris/morris.js"></script>
<script src="<?php echo base_url();?>/assets4/scripts/dashboard-demo.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>/assets2/js/scripts.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets5/Pemisah.js"></script>

</body>

</html>


</div>


</div>
</div>
</div>
<!-- end wrapper -->
