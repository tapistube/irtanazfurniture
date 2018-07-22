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
                    <div class="col-md-12 text-center"><h3>Profil</h3></div>
                </div>
                <div class="row">
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

                                <?php foreach ($dataku as $a) {
                                ?>

                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <td>Nama</td>
                                            <td colspan="2"><?php cetak($a->nama_customer); ?></td>
                                        </tr>
                                        <tbody>
                                        <tr>
                                            <td align="center">No. Hape</td>
                                            <td align="center" colspan="2"><?php cetak($a->nope); ?></td>
                                        </tr>
                                        <tr>
                                            <td align="center">Email</td>
                                            <td align="center" colspan="2"><?php cetak($a->user_name); ?></td>
                                        </tr>
                                        <tr>
                                            <td align="center">Alamat</td>
                                            <td align="center" colspan="2"><?php cetak($a->alamat_customer); ?></td>
                                        </tr>
                                        <tr>
                                            <td align="center">Password</td>
                                            <td align="center"><?php cetak($this->encrypt->decode($a->password)); ?></td>
                                            <td align="center">
                                                <a href="<?php echo base_url();?>User/resetPass" class="btn btn-success btn-xs">Reset Password</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <?php }?>
                                </div>

                            </div>
                        </div>
    				</div>
				</div>
            </div>
</div>