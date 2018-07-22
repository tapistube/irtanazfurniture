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
        <h3>Pembelian Tanggal : 15 Januari 2018</h3>

        <div class="panel panel-default">
            <div class="panel-heading">
                Data Penjualan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <a href="<?php echo base_url();?>Admin/detailPelanggan">
                    <h4>Nama : Kairun</h4>
                    </a>
                    <h4>No. Telp : 08964496322</h4>
                    <h4>Jenis Pembayaran : Lunas</h4>
                    <h4>Tipe Pembayaran  : Transfer</h4>
                    <h4>Tanggal Pengambilan : 25 Maret 2018</h4>
                    <br>
                    <h4>Status  : Pembayaran Selesai</h4>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Sapi</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                        </tr>
                        </thead>
                        <?php $no = $this->uri->segment(3)+1;
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td align="center">
                                <a href="<?php echo base_url();?>Admin/detailSapi">ID 2014</a>
                            </td>
                            <td align="center">Sapi PO</td>
                            <td align="center">Rp. 15.000.000</td>
                        </tr>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td align="center">
                                <a href="<?php echo base_url();?>Admin/detailSapi">ID 2015</a>
                            </td>
                            <td align="center">Sapi Bali</td>
                            <td align="center">Rp. 25.000.000</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="pull-right">
                    <h4>Total bayar = Rp. 35.000.000</h4>
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
                        <tr>
                            <td>Foto Bukti</td>
                            <td align="center">
                                <img src="<?php echo base_url();?>assets1/img/bukti_bayar.jpg" width="300" height="300">
                            </td>
                        </tr>

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