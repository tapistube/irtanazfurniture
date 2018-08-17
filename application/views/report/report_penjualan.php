<!DOCTYPE html>
<html>
<head>

    <title>Laporan Penjualan - Irtanaz Furniture</title>
    <link href="<?php echo base_url();?>/assets4/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>/assets4/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>/assets4/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>/assets4/css/main-style.css" rel="stylesheet" />

    <style>
        table{
            border-collapse: collapse;
            width: 100%;
            'margin: 0 auto;
        }
        table th{
            border:1px solid #000;
            padding: 3px;
            font-weight: bold;
        }
        table td{
            border:1px solid #000;
            padding: 3px;
            vertical-align: top;
        }

        #judul{
            font-size: 20px;
            font-weight: bold;
        }

        #tebal2{
            font-weight: bold;
        }

        #tebal{
            border:1px solid #000;
            padding: 3px;
            font-weight: normal;
            text-align: center;
        }

        #garis{
            width: 40%;
            border: 1px solid #000000;
        }

    </style>
    <style type="text/css">
        .under { text-decoration: underline;
            color: #000000;
        }
        .over  { text-decoration: overline; }
        .line  { text-decoration: line-through; }
        .blink { text-decoration: blink; }
        .all   { text-decoration: underline overline line-through; }
        a      { text-decoration: none; }
    </style>
</head>

<?php
$totalSemua =0;
foreach ($penjualan as $c){
    $totalSemua = $totalSemua + $c->harga;
}
?>
<body>
<p style="text-align: left">Irtanaz Furniture
<br>
Jati Ukir Modern dan Minimalis<br>
    Jl. Untung suropati No.25, Labuhan Ratu, Kedaton, Bandarlampung
</p>
<br>
<p style="text-align: center" ><strong><u>Laporan Penjualan </u> </strong></p>

<br>
<br>
<!-- tabel detail disposisi -->
<h4>Tanggal Laporan = <?php echo date("d-F-Y",strtotime($tanggal)); ?></h4>
<br>


<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Harga</th>
        </tr>
    </thead>
<?php $no = 1;
    $angka = 0;?>
    <tbody>
    <?php foreach ($penjualan as $b){ ?>
        <tr class="even gradeA">
            <td><?php echo $no++; ?></td>
            <td><?php cetak($b->tanggal_pembelian); ?></td>
            <td><?php cetak($b->nama_customer); ?></td>
            <td>Rp. <?php cetak(number_format($b->harga,0,',','.')); ?></td>
        </tr>

    <?php
    $angka++;
    } ?>
    </tbody>
</table>

<br><br>
<h3>Total Semua = Rp. <?php cetak(number_format($totalSemua,0,',','.')); ?> </h3>
<br>

<br>

</body>
</html>