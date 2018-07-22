<div id="page-wrapper">
<div class="row">
    <br><br>
    <?php
    $no = 1;
    ?>
    <?php
    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;}
    ?>
    <div class="col-md-12">
        <div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-edit"></em>
				</a></li>
				<li class="active">Ubah Foto Sapi</li>
			</ol>
		</div><!--/.row-->
		
		
		
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ubah Foto Sapi
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart('Gambar/proses_Edit'); ?>
                <div class="table-responsive">
                     
                    <?php 
                     $np = 1;
                     foreach ($gambar as $b){
                    ?>
                    <input type="hidden" value="<?php cetak($b->nama_gambar) ?>" name="nama_gambar_old" id="nama_gambar_old"/>
                    <input type="hidden" value="<?php cetak($b->id_gambar); ?>" name="id_gambar" id="id_gambar"/>
                    <input type="hidden" value="<?php cetak($b->id_sapi); ?>" name="id_sapi" id="id_sapi"/>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th><h3>ID Sapi</h3></th>
                            <th align="center"> <h3> <?php cetak($b->id_sapi); ?> </h3> </th>
                        </tr>
                        <tbody>
                        <tr>
                            <td>Foto Lama</td>
                            <td align="center">
                                <img src="<?php echo base_url();?>upload-foto/<?php cetak($b->nama_gambar); ?>" width="300" height="300">
                            </td>
                        </tr>
                        <tr>
                           
                            <td colspan="2">
                                <!--  INI CARA GW -- GLORY
                                <input class="form-control" type="hidden" name="txt_id" placeholder="ID" maxlength="6"
                                       id="txt_id" value="<//?php echo $guide['id']; ?>" >

                                <input class="form-control" type="hidden" name="txt_namafoto" placeholder="nama_foto" maxlength="6"
                                       id="txt_namafoto" value="<//?php echo $guide['foto']; ?>" >
                                       -->

                                <label for="register-username"><i class="icon-user"></i> <b>Upload foto baru</b></label>
                                <input type="file" name="img_guide" id="img_guide" class="form-control">
                            </td>
                        </tr>


                        </tbody>
                    </table>
                    <?php } ?> 
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

                    <div class="col-md-4">
                        <button class="btn btn-primary btn-lg" type="submit" value="ubah_foto" name="ubah_foto" id="ubah_foto">Simpan Perubahan</button>
                    </div>

                </div>
                <?php echo form_close();?>

            </div>


        </div>
    </div>
</div>
</div>