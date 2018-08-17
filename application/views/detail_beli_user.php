<!-- Aambil dari assest3 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets3/Gallery/css/blueimp-gallery.min.css">
<script src="<?php echo base_url(); ?>assets3/Gallery/js/blueimp-gallery.min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58eb107c9c504492"></script>
<script src="<?php echo base_url();?>/assets1/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/jquery-1.10.2.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />

<!-- DataTables CSS -->
<link href="<?php echo base_url();?>assets5/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url();?>assets5/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


<div>
    <?php
    $this->load->view('alert');
    ?>
</div>
<?php
$total = 0;
foreach ($transaksi_user as $b){
    $tanggal_pembelian = $b->tanggal_pembelian;
    $id_faktur = $b->id_faktur;
    $id_customer = $b->id_customer;
    $status = $b->status_bayar;
    $nama_customer = $b->nama_customer;
    $total = $total + $b->harga;
}
?>

<div class="section">
	        <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center"><h3>Detail Pembelian</h3></div>
                </div>
                <br>
				<div class="row">
        			<div class="col-md-2">
                        <div class="col-md-12 panel text-center" style="padding-top:10px">
        					<a href="<?php echo base_url(); ?>User"><img src="<?php echo base_url();?>assets1/img/list_beli.png"><h4>Pembelian</h4></a>
        				</div>
                        <div class="col-md-12 panel text-center" style="padding-top:10px">
        					<a href="<?php echo base_url(); ?>User/profil"><img src="<?php echo base_url();?>assets1/img/ubah-Profil.png"><h4>Profil</h4></a>
        				</div>
        			</div>
        			<div class="col-md-10">
    					<div class="shop-item panel text-center">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <div class="pull-left" align="left">
                                    <h3><strong>Kode Pembelian : <?php cetak($id_faktur); ?> </strong></h3>
                                    <br>
                                    <h4>Tanggal Pembelian : <?php cetak($tanggal_pembelian); ?></h4>
                                        <?php if ($status == "0") { ?>
                                            <h4>Status  : Menunggu Pembayaran DP</h4>
                                        <?php } if ($status == "1") { ?>
                                            <h4>Status  : Sudah Bayar DP (Menunggu Pelunasan)</h4>
                                        <?php } ?>
                                        <?php  if ($status == "2") { ?>
                                            <h4>Status  : Pembayaran Lunas</h4>
                                        <?php } ?>
                                        <br>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover" id="tabel_sapi">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                        </tr>
                                        </thead>
                                        <?php $no = 1;
                                        ?>
                                        <tbody>
                                        <?php
                                        foreach ($transaksi_user as $b){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php cetak($b->nama_produk) ?></td>
                                                <td><?php cetak($b->kategori) ?></td>
                                                <td>Rp. <?php cetak(number_format($b->harga,0,',','.')); ?></td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="pull-right">
                                    <h4>Total bayar = Rp. <?php cetak(number_format($total,0,',','.')); ?></h4>
                                    <br><br>
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                    <a class="btn btn-lg btn-green" href="<?php echo base_url();?>Utama/invoice/<?php cetak($id_faktur); ?>">Lihat Faktur</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Bukti Pembayaran
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <th>Deskripsi</th>
                                                <th>Foto</th>
                                                <th>Keterangan</th>
                                            </thead>
                                            <?php
                                            $np = 1;
                                            foreach ($gambar as $b){
                                                $stt_bukti = $b->status_bayar;
                                            ?>
                                            <tr>
                                                <td>Foto Bukti Pembayaran</td>
                                                <td align="center">
                                                    <img src="<?php echo base_url();?>upload-foto/bukti_bayar/<?php cetak($b->nama_gambar); ?>" width="300" height="300">
                                                </td>
                                                <?php if ($stt_bukti == "1") { ?>
                                                <td>Pembayaran DP</td>
                                                <?php } ?>
                                                <?php if ($stt_bukti == "2") { ?>
                                                    <td>Sisa Pembayaran (Pelunasan)</td>
                                                <?php } ?>
                                                <?php if ($stt_bukti == "2") { ?>
                                                    <td>Bayar Lunas</td>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="col-md-12">

                                        <div align="center">
                                            <a href="<?php echo base_url();?>User/inputGambarBukti/<?php cetak($id_faktur); ?>"
                                               class="btn btn-warning btn-lg" >Upload Bukti Pembayaran</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
    				</div>
				</div>
            </div>
</div>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url();?>assets5/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets5/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets5/datatables-responsive/dataTables.responsive.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets5/Pemisah.js"></script>
<script>
    $(document).ready(function() {
        $('#tabel_sapi').DataTable({
            responsive: true
        });
    });

</script>