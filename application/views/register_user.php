<div class="section">
    <div class="container">
        <div>
            <?php
            $this->load->view('alert');

            $errorMsg = $this->session->userdata('errorMsg');
            ?>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
                <img src="<?php echo base_url();?>assets1/img/akunbaru2.png">
                <div class="col-md-12 panel alert alert-danger">
                    <?php echo validation_errors();
                    if (!empty($errorMsg)){
                        echo $errorMsg['errorMsg'];
                    }
                    ?>

                </div>
                <div class="basic-login">
                    <?php echo form_open_multipart('Account/simpanAkun')?>
                    <form role="form">
                        <h3>Daftar Akun</h3>
                        <br>
                        <div class="form-group">
                            <label for="register-username"><i class="icon-user"></i> <b>Nama</b></label>
                            <input class="form-control" id="txt_nama" name="txt_nama" type="text" placeholder=""
                            required value="<?php echo set_value('txt_nama')?>">
                        </div>
                        <div class="form-group">
                            <label for="register-username"><i class="icon-user"></i> <b>Email</b></label>
                            <input class="form-control" id="txt_email" name="txt_email" type="email" placeholder=""
                                   required value="<?php echo set_value('txt_email')?>">
                        </div>
                        <div class="form-group">
                            <label for="register-password"><i class="icon-lock"></i> <b>Password</b></label>
                            <input class="form-control" id="txt_password" name="txt_password"
                              required     type="password" placeholder="" value="<?php echo set_value('txt_password')?>">
                        </div>
                        <div class="form-group">
                            <label for="register-password2"><i class="icon-lock"></i> <b>Re-enter Password</b></label>
                            <input class="form-control" id="txt_konfir_psw" name="txt_konfir_psw"
                                   required   type="password" placeholder="" value="<?php echo set_value('txt_konfir_psw')?>">
                        </div>
                        <script>
                            function hanyaAngka(evt) {
                                var charCode = (evt.which) ? evt.which : event.keyCode
                                if (charCode > 31 && (charCode < 48 || charCode > 57))

                                    return false;
                                return true;
                            }
                        </script>
                        <div class="form-group">
                            <label for="register-username"><i class="icon-user"></i> <b>No. Telepon</b></label>
                            <input class="form-control" onkeypress="return hanyaAngka(event)" id="txt_nope" name="txt_nope"
                                   type="text" placeholder="" required value="<?php echo set_value('txt_nope')?>">
                        </div>
                        <div class="form-group">
                                <label class="control-label" for="txt_perihal">Alamat</label>
                                <textarea required class="form-control" maxlength="70" name="txt_alamat" rows="7"
                                          value="<?php echo set_value('txt_alamat')?>"    placeholder="" id="txt_alamat"></textarea>
                                <br>
                        </div>



                        <div class="form-group">
                            <button type="submit" id="tambah_pelanggan" name="tambah_pelanggan" value="tambah_pelanggan" class="btn pull-right">Daftar</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <?php echo  form_close(); ?>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-1 social-login">

            </div>
        </div>
    </div>
</div>