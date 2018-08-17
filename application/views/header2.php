<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php $user = $this->session->userdata('customer'); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Irtanaz Furniture</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="<?php echo base_url();?>assets1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets1/css/icomoon-social.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?php echo base_url();?>assets1/css/leaflet.css" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="<?php echo base_url();?>assets1/css/leaflet.ie.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets1/css/main.css">
    <link href="<?php echo base_url();?>assets4/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets4/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets3/SweetAlert/sweetalert.css" rel="stylesheet" />

    <script src="<?php echo base_url();?>assets1/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="<?php echo base_url();?>assets3/SweetAlert/sweetalert.min.js"></script>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->


<!-- Navigation & Logo-->
<div class="mainmenu-wrapper" style="background:#222">
    <div class="container-fluid">
        <nav id="mainmenu" class="mainmenu">
            <ul>
                <li class="logo-wrapper"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets1/img/logo_irtanaz_furniture.png"></a></li>
                <li >
                    <a href="<?php echo base_url();?>Utama">Home</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>Utama/listProduk">Produk</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>Utama/tentang">Tentang Kami</a>
                </li>
                <?php 
                    if(!empty($user['id_customer'])){
                ?>
                <li>
                    <a href="<?php echo base_url();?>Utama/keranjangBelanja">Keranjang Belanja</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>User">Dashboard</a>
                </li>
                <?php } ?>

                <li class="pull-right" style="padding-top: 20px;color: white">
                    <?php 
                    if(!empty($user['id_customer'])){
                    ?>
                    <div style="padding-bottom: 20px">
                    <span class="glyphicon glyphicon-user"> </span>
                    <?php echo $user['nama_customer']; ?>
                    <a type="submit" href="<?php echo base_url();?>Controller_Masuk_Pelanggan/Keluar" class="btn btn-green">Keluar</a>
                    </div>
                    <?php }else { ?>
                   <!-- <p>Anda belum login</p> -->
                        <div style="padding-bottom: 20px">
                        <a type="submit" href="<?php echo base_url();?>Utama/loginPelanggan" class="btn btn-green">Masuk</a> |
                        <a type="submit" href="<?php echo base_url();?>Utama/daftar" class="btn btn-green">Daftar</a>
                        </div>
                    <?php } ?>
                </li>
            </ul>
        </nav>
    </div>
</div>
