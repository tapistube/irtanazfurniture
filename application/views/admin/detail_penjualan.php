<!-- DataTables CSS -->
<link href="<?php echo base_url();?>assets5/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url();?>assets5/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

<?php
$total = 0;
foreach ($Penjualan as $b){
    $id_faktur = $b->id_faktur;
    $tanggal_beli = $b->tanggal_pembelian;
    $id_customer = $b->id_customer;
    $status = $b->status_bayar;
    $nama_customer = $b->nama_customer;
    $total = $total + $b->harga;
}
?>

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
        <h3>Pembelian Tanggal : <?php cetak($tanggal_beli);?></h3>

        <div class="panel panel-default">
            <div class="panel-heading">
                Data Penjualan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <a href="<?php echo base_url();?>Admin/detailPelanggan/<?php cetak($id_customer); ?>">
                    <h3>Customer : <?php cetak($nama_customer); ?></h3>
                    </a>
                    <?php if ($status == "0") { ?>
                    <h4>Status  : Menunggu Pembayaran DP</h4>
                    <?php } if ($status == "1") { ?>
                        <h4>Status  : Sudah Bayar DP (Menunggu Pelunasan)</h4>
                    <?php } ?>
                    <?php  if ($status == "2") { ?>
                        <h4>Status  : Pembayaran Lunas</h4>
                    <?php } ?>

                    <br>
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
                        foreach ($Penjualan as $b){
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
                </div>
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