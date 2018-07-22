<?php foreach ($faktur as $f) {
    $tanggal_beli = $f->tanggal_pembelian;
    $tanggal_ambil = $f->tanggal_pengambilan;
    $metode_bayar = $f->metode_pembayaran;
    $jenis_bayar = $f->status_bayar;
    $nama_customer = $f->nama_customer;
    $alamat_customer = $f->alamat_customer;
    $nope = $f->nope;
    $email = $f->user_name;
   

} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detail Pembayaran</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets1/css/styleInvoice.css" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="<?php echo base_url();?>assets1/img/logo_indoprima.png">
    </div>
    <div id="company">
        <h2 class="name">Indo Prima Beef</h2>
        <div>JL. Agus Salim No.24, Bandarjaya, Lampung Tengah </div>
        <div>+62811 791 551</div>
        <div><a href="#">indoprimabeef@gmail.com</a></div>
    </div>
    </div>
</header>
<main>
    <div id="details" class="clearfix">
        <div id="client">
            <div class="to">Faktur kepada :</div>
            <h2 class="name"><?php cetak($nama_customer); ?></h2>
            <div class="address"><?php cetak($alamat_customer); ?></div>
            <div class="email"><a href="#"><?php cetak($email); ?></a></div>
        </div>
        <div id="invoice">
            <h1>Detail Pembayaran</h1>
            <div class="date">Tanggal faktur: <?php cetak($tanggal_beli); ?></div>
            <div class="date">Tipe Pembayaran : <?php if($jenis_bayar == 0){ echo 'DP';}else{ echo 'Tunai';}?></div>
            <div class="date">Tanggal pengambilan: <?php cetak($tanggal_ambil); ?></div>
        </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="desc" colspan="2">Deskipsi</th>
            <th class="unit">Harga</th>
            <th class="total">TOTAL</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; $total = 0; foreach ($faktur as $a) { $total = $total + $a->harga; ?>
        <tr>
            <td class="no"><?php echo $no; ?></td>
            <td class="desc" colspan="2"><h3>ID <?php cetak($a->id_sapi); ?></h3><?php cetak($a->jenis_sapi); ?></td>
            <td class="unit">Rp. <?php cetak(number_format($a->harga,0,',','.')); ?></td>
            <td class="total">Rp. <?php cetak(number_format($a->harga,0,',','.')); ?></td>
        </tr>
        <?php $no++; }?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>Rp. <?php cetak(number_format($total,0,',','.')); ?></td>
        </tr>
        </tfoot>
    </table>
    <div id="thanks">Terima Kasih!</div>
    <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Silakan bawa faktur ini ke Kantor kami ketika pengambilan sapi anda</div>
    </div>
</main>
<footer>
    <!--Invoice was created on a computer and is valid without the signature and seal.-->
    Faktur yang dibuat oleh sistem ini adalah valid walaupun tanpa tanda tangan.
</footer>
</body>
</html>