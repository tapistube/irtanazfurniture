<!-- Aambil dari assest3 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets3/Gallery/css/blueimp-gallery.min.css">
<script src="<?php echo base_url(); ?>assets3/Gallery/js/blueimp-gallery.min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58eb107c9c504492"></script>
<script src="<?php echo base_url();?>/assets1/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/jquery-1.10.2.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />

<div>
    <?php
    $this->load->view('alert');
    ?>
</div>

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
                                    <h3><strong>Kode Pembelian : AAPPWE2 </strong></h3>
                                    <br>
                                    <h4>Jenis Pembayaran : Lunas</h4>
                                    <h4>Tipe Pembayaran  : Transfer</h4>
                                    <h4>Tanggal Pengambilan : 25 Maret 2018</h4>
                                    <h4>Status  : Pembayaran Selesai</h4>
                                        <br>
                                    </div>
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
                                    <br><br>
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                    <a class="btn btn-lg btn-green" href="<?php echo base_url();?>Utama/invoice">Lihat Faktur</a>
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
                                            <tr>
                                                <td>Foto Bukti Pembayaran</td>
                                                <td align="center">
                                                    <img src="<?php echo base_url();?>assets1/img/bukti_bayar.jpg" width="300" height="300">
                                                </td>
                                                <td>Pembayaran DP</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="col-md-12">

                                        <div align="center">
                                            <a href="<?php echo base_url();?>User/uploadBukti"
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