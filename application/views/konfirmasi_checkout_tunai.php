<!-- Page Title -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />

<div>
    <?php
    $this->load->view('alert');
    ?>
</div>

<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Checkout berhasil</h1>
            </div>
        </div>
    </div>
</div>
<!-- Sampe sini -->

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Action Buttons -->
                <div align="center">
                    <div>
                        <div class="basic-login">
                            <h3>Proses Checkout berhasil !</h3>
                            <h4>Silakan lakukan pembayaran dalam waktu 2 x 24 jam di kantor kami, jika tidak maka pembelian anda akan dibatalkan  </h4>
                        </div>
                        <br>
                    </div>

                    <div class="basic-login">
                        <h5>Pastikan untuk tidak memberikan informasi pembayaran anda ke pihak lain selain IndoPrimaBeef</h5>
                    </div>
                    <div class="basic-login">

                        <h3>Alamat kantor :</h3>
                        <h4>JL. Agus Salim No.24, Bandarjaya, Lampung Tengah</h4>
                        <h4>Telepon : +62811 791 551</h4>
                        <br>
                        <h4>Pembayaran Sejumlah : Rp. <?php echo number_format($total,0,',','.'); ?></h4>
                        <br>
                        <a class="btn btn-lg btn-green" href="<?php echo base_url();?>Utama/invoice/<?php echo $id_faktur ?>" target="_blank">Lihat Faktur</a>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>