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
        <form class="navbar-form" role="search">
            <div class="input-group add-on">
                <input class="form-control" placeholder="Cari nama pelanggan atau Email Pelanggan" name="srch-term" id="srch-term" type="text">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <br>
    </div>

    <div class="col-md-12">
        <h3>Berikut adalah data Sapi yang telah terjual di IndoPrimaBeef</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Penjualan (Pengurutan berdasarkan data terbaru)
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Pembelian</th>
                            <th>Nama</th>
                            <th>Total Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <?php $no = $this->uri->segment(3)+1;
                        ?>
                        <tbody>
                        <tr>
                            <td ><?php echo $no++;?></td>
                            <td>15 Januari 2018 </td>
                            <td>Roberto</td>
                            <td >Rp. 15.000.000</td>
                            <td style="width: 190px;" align="center">
                                <div>
                                    <a href="<?php echo base_url();?>Admin/detailPenjualan" class="btn btn-success btn-xs">Detail</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td>25 Februari 2018 </td>
                            <td>Carlos </td>
                            <td >Rp. 25.000.000</td>
                            <td style="width: 190px;" align="center">
                                <div>
                                    <a href="<?php echo base_url();?>Admin/detailPembelian" class="btn btn-success btn-xs">Detail</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>