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
                    <div class="col-md-12 text-center"><h3>Upload Bukti Pembayaran</h3></div>
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
                                <div class="basic-login">
                                    <h4>Silakan Upload bukti pembayaran yang telah anda foto</h4>

                                        <?php echo form_open_multipart('User/prosesUploadBukti'); ?>

                                        <input class="form-control" type="hidden" name="txt_id_faktur" placeholder="Id faktur" maxlength="30"
                                               id="txt_id_faktur" value="<?php echo $idFaktur; ?>" >
                                        <div class="form-group">
                                            <label class="control-label" for="txt_perihal">Jenis Pembayaran</label>
                                            <select class="form-control" name="txt_jenis" id="txt_jenis" required>
                                                <option value="" disabled>Pilih Jenis</option>
                                                <option value="1">DP</option>
                                                <option value="2">Sisa Pembayaran (Pelunasan)</option>
                                                <option value="3">Bayar Lunas</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="register-username"><i class="ui-icon-image"></i> <b>Upload foto</b></label>
                                            <input type="file" name="userfile" id="userfile" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn pull-right">Upload</button>
                                            <div class="clearfix"></div>
                                        </div>

                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
    				</div>
				</div>
            </div>
</div>