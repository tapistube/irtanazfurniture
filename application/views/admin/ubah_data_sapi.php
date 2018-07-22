<div id="page-wrapper">

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Ubah Data Sapi</h1>
        </div>
        <!--End Page Header -->
    </div>

    <div class="row">
        <!-- Welcome -->
        <div class="col-lg-12">
            <!-- dari sini --->
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class= "panel-heading">
                    Sapi
                </div>
                <div class="panel-body">

                    <div class="alert alert-danger">
                        <strong><h3>
                                <?php echo validation_errors(); ?>
                        </h3></strong>
                    </div>
                    <br>
                    
                    <?php echo form_open_multipart('Sapi/ubah'); ?>
                    <div class="form-group">
                         <?php 
                            foreach ($detail_sapi as $b){
                        ?>
                         
                        <div class="col-md-12">
                            <label class="control-label" for="txt_perihal">No. Sapi (ID Sapi) </label>
                            <input class="form-control" type="text" name="txt_id" placeholder="Nomor Sapi" maxlength="30"
                                   id="txt_id" value="<?php cetak($b->id_sapi) ?>"  disabled>
                            <input type="hidden" value="<?php cetak($b->id_sapi) ?>" name="id" id="id"/>
                            <br>
                        </div>
                        <br>

                    <br>

                    <div class="col-md-12">
                       <label class="control-label" for="txt_perihal">Jenis Sapi</label>
                            <select class="form-control" name="txt_jenis" id="txt_jenis">
                                <option value="" disabled>Pilih Jenis</option>
                                <option value="Sapi Simental / Limosin">Sapi Simental / Limosin</option>
                                <option value="Sapi PO">Sapi PO</option>
                                <option value="Sapi Madura">Sapi Madura</option>
                                <option value="Sapi Bali">Sapi Bali</option>
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
                            <label class="control-label" for="txt_perihal">Berat Sekarang</label>
                            <input class="form-control" type="text" name="txt_berat_skrg" placeholder="Berat sekarang"
                                   maxlength="8" onkeypress="return hanyaAngka(event)" id="txt_berat_skrg" value="<?php cetak($b->berat_kotor) ?>" >
                            <br>
                        </div>

                        <div class="col-md-12">
                            <label class="control-label" for="txt_perihal">Berat (Estimasi)</label>
                            <input class="form-control" type="text" name="txt_berat_estimasi" placeholder="berat estimasi"
                                   maxlength="8" onkeypress="return hanyaAngka(event)" id="txt_berat_estimasi" value="<?php cetak($b->berat_bersih) ?>" >
                            <br>
                        </div>

                         <br>

                    <div class="col-md-12">
                        <label class="control-label" for="txt_perihal">Harga</label>
                        <input class="form-control" type="text" name="txt_harga" placeholder="Harga"
                               onkeypress="return hanyaAngka(event)" id="txt_harga"  value="<?php cetak(number_format($b->harga,0,',','.')); ?>" onkeyup="convertToRupiah(this);" >
                        <br>
                    </div>

                    <div class="col-md-12" id="fgbutton" style="width: 100%">
                        <br>
                        <br>
                        <button class="btn btn-primary btn-orange btn-lg" type="submit" value="ubah_sapi" name="ubah_sapi" id="ubah_sapi">Simpan Perubahan</button>
                    </div>
                    </div>
                    
                    <?php } echo form_close(); ?>

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
<script src="<?php echo base_url();?>/assets4/plugins/jquery-ui-1.12.1/jquery-ui.js"></script>

<script src="<?php echo base_url();?>/assets4/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>/assets2/js/scripts.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>


</body>

</html>
