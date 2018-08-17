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
        <div class="panel panel-default">
            <div class="panel-heading">
                Detail Pelanggan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <?php foreach ($customer as $a) { $id_cus = $a->id_customer; ?>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Nama</th>
                            <th align="center" colspan="2"><?php cetak($a->nama_customer); ?></th>
                        </tr>
                        <tbody>
                        <tr>
                            <td>Email</td>
                            <td align="center" colspan="2"><?php cetak($a->user_name); ?></td>
                        </tr>
                        <tr>
                            <td>No. telepon</td>
                            <td align="center" colspan="2"> <?php cetak($a->nope); ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td align="center" colspan="2"><?php cetak($a->alamat_customer); ?></td>
                        </tr>

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
                    <div align="center">
                        <a onclick="return confirm('Apakah Anda Ingin Menghapus Data Pelanggan Ini ?')" href="<?php echo base_url();?>Admin/Hapus_Customer/<?php echo $id_cus; ?>"
                           class="btn btn-warning btn-lg" >Hapus Data Pelanggan</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- data pembelian user
        <div class="panel panel-default">
            <div class="panel-heading">
                Data pembelian
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Pembelian</th>
                            <th>Total Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <?php $no = 1;
                        ?>
                        <tbody>
                        <tr>
                            <td ><?php echo $no++;?></td>
                            <td>15 Januari 2018 </td>
                            <td >Rp. 15.000.000</td>
                            <td style="width: 190px;" align="center">
                                <div>
                                    <a href="<?php echo base_url();?>Admin/detailPembelian" class="btn btn-success btn-xs">Detail</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td>25 Februari 2018 </td>
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
        -->

    </div>
</div>
</div>