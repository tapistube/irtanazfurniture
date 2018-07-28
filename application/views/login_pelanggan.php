
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img src="<?php echo base_url();?>assets1/img/chara_carpenter.png" width="250" height="321">
            </div>
            <div class="col-sm-5">
                <div class="basic-login">
                    <?php echo form_open_multipart('Login/signInPelanggan')?>
                    <form role="form" role="form">
                        <h3>Login Pelanggan</h3>
                        <div class="form-group">
                            <label for="login-username"><i class="icon-user"></i> <b>Email</b></label>
                            <input class="form-control" id="txt_username" name="txt_username" required type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="login-password"><i class="icon-lock"></i> <b>Password</b></label>
                            <input class="form-control" id="txt_password" required name="txt_password" type="password" placeholder="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn pull-right">Login</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="col-sm-5"></div>
            </div>
        </div>
    </div>
</div>