<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Irtanaz Furniture - Administrator</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url();?>assets4/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets4/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets4/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets4/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets4/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="<?php echo base_url();?>assets4/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />

    <script src="<?php echo base_url();?>/assets2/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets2/js/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets2/js/basic.min.css">
    <script type="text/javascript" src="<?php echo base_url();?>/assets2/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets2/js/dropzone.min.js"></script>
    <script src="<?php echo base_url();?>/assets2/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/assets2/js/scripts.js"></script>

</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar" style="background-color:#222">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url();?>assets1/img/logo_irtanaz_furniture.png" style="height:40px">
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span><b>Halo, Admin  </b><i class="fa fa-user fa-2x"></i></span>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>Admin/ubahPass"><i class="fa fa-sign-out fa-fw"></i>Ganti Password</a>
                        <li><a href="<?php echo base_url();?>Login/logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->