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
					<em class="fa fa-th-list"></em>
				</a></li>
				<li class="active">Halaman Detail Data Sapi</li>
			</ol>
		</div><!--/.row-->
		
		
		
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detail Sapi
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                     <?php 
                            foreach ($detail_sapi as $b){
                        ?>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>ID Sapi</th>
                            <th align="center" colspan="2"><?php cetak($b->id_sapi) ?></th>
                        </tr>
                       
                        <tbody>
                        <tr>
                            <td>Jenis Sapi</td>
                            <td align="center" colspan="2"> <?php cetak($b->jenis_sapi) ?></td>
                        </tr>
                        <tr>
                            <td>Berat (Sekarang)</td>
                            <td align="center" colspan="2"><?php cetak($b->berat_kotor) ?> Kg</td>
                        </tr>
                        <tr>
                            <td>Berat (Estimasi)</td>
                            <td align="center" colspan="2"><?php cetak($b->berat_bersih) ?> Kg</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td align="center" colspan="2">Rp. <?php cetak(number_format($b->harga,0,',','.')); ?></td>
                        </tr>
                       
                        <?php 
                            $np = 1;
                            foreach ($gambar as $b){
                        ?>
                        <tr>
                            <td>Foto Sapi <?php echo $np; ?></td>
                            <td align="center">
                                <img src="<?php echo base_url();?>upload-foto/<?php cetak($b->nama_gambar); ?>" width="300" height="300">
                            </td>
                            <td align="center">
                                <a href="<?php echo base_url();?>/Admin/ubahFotoSapi/<?php cetak($b->id_gambar); ?>" class="btn btn-success btn-md">Ubah Foto</a>
                            </td>
                        </tr>
                            <?php } ?>
                       
                        </tbody>
                    </table>
                    <?php }?>
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

                    <div class="col-md-6">
                        <a href="<?php echo base_url();?>Admin/ubahSapi/<?php cetak($id_sapi); ?>" class="btn btn-success btn-lg" >Ubah Data Sapi</a>
                    </div>

                    <div class="col-md-6" align="center">
                        <a onclick="return confirm('Apakah anda ingin menghapus data ini secara permanen?')" href="<?php echo base_url();?>Sapi/hapus/<?php cetak($id_sapi); ?>"
                           class="btn btn-warning btn-lg" >Hapus Data Sapi</a>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
</div>