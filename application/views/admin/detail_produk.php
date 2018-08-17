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
				<li class="active">Halaman Detail Data Produk</li>
			</ol>
		</div><!--/.row-->
		
		
		
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detail Produk
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                     <?php 
                            foreach ($detail_produk as $b){
                        ?>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Nama Produk</th>
                            <th align="center" colspan="2"><?php cetak($b->nama_produk) ?></th>
                        </tr>
                       
                        <tbody>
                        <tr>
                            <td>Kategori</td>
                            <td align="center" colspan="2"> <?php cetak($b->kategori) ?></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td align="center" colspan="2"><?php cetak($b->stok) ?> Unit</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td align="center" colspan="2">Rp. <?php cetak(number_format($b->harga,0,',','.')); ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td align="center" colspan="2"><?php cetak($b->deskripsi); ?></td>
                        </tr>
                       
                        <?php 
                            $np = 1;
                            foreach ($gambar as $b){
                        ?>
                        <tr>
                            <td>Foto Produk <?php  ?></td>
                            <td align="center">
                                <img src="<?php echo base_url();?>upload-foto/<?php cetak($b->nama_gambar); ?>" width="300" height="300">
                            </td>
                            <!--
                            <td align="center">
                                <a href="<//?php echo base_url();?>Admin/ubahFotoProduk/<//?php cetak($b->id_gambar); ?>" class="btn btn-success btn-md">Ubah Foto</a>
                            </td>
                            -->
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
                        <a href="<?php echo base_url();?>Admin/ubahProduk/<?php cetak($id_produk); ?>" class="btn btn-success btn-lg" >Ubah Data Produk</a>
                    </div>

                    <div class="col-md-6" align="center">
                        <a onclick="return confirm('Apakah anda ingin menghapus data ini secara permanen?')" href="<?php echo base_url();?>Produk/hapus/<?php cetak($id_produk); ?>"
                           class="btn btn-warning btn-lg" >Hapus Data Produk</a>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
</div>