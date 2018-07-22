<!-- Testimonials -->
<div class="section">
    <div class="container">
        <h2>Pilih Metode Pembayaran Anda</h2>
        <br>
        <br>
        <div class="row">
            <?php echo form_open_multipart('Utama/BayarOk');?>

            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label" >Jenis Pembayaran</label>
                    <select class="form-control" name="txt_status" id="txt_status" required>
                        <option value="" disabled>Pilih Jenis</option>
                        <option value="0">DP</option>
                        <option value="1">Lunas</option>
                    </select>
                    <br>
                </div>

                <div class="col-md-12">
                    <label class="control-label" >Tipe Pembayaran</label>
                    <select class="form-control" name="Txt_metodeBayar" id="Txt_metodeBayar" required>
                        <option value="" disabled>Pilih Tipe</option>
                        <option value="0">Transfer</option>
                        <option value="1">Tunai</option>
                    </select>
                    <br>
                </div>

                <div class="col-md-12">
                        <label for="register-username"><i class="icon-user"></i> <b>Waktu Pengambilan Sapi</b></label>
                        <input class="form-control" id="txt_tanggal_ambil" name="txt_tanggal_ambil" type="date" placeholder="" required>
                </div>

                <div class="col-md-12" id="fgbutton" style="width: 100%">
                    <br>
                    <br>
                    <button class="btn btn-primary btn-orange btn-lg" type="submit">Lanjutkan</button>
                </div>

            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<!-- End Testimonials -->