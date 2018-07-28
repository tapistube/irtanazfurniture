<!-- navbar side -->
<nav class="navbar-default navbar-static-side" role="navigation">
    <!-- sidebar-collapse -->
    <div class="sidebar-collapse">
        <!-- side-menu -->
        <ul class="nav" id="side-menu">
            <li>
                <!-- user image section-->
                <div class="user-section" style="margin-top:10px">
                    <div class="user-section-inner">
                        <img src="<?php echo base_url();?>assets4/img/user.jpg" alt="">
                    </div>
                    <div class="user-info">
                        <div>
                            <?php if (isset($nama)) {
                                echo $nama;
                            }else {
                                echo "Admin";
                            } ?>
                        </div>
                        <div class="user-text-online">
                            <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                        </div>
                    </div>
                </div>
                <!--end user image section-->
            </li>
            <li>
                <a href="<?php echo base_url();?>Admin"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-list-alt fa-fw"></i> Produk<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url();?>Admin/inputProduk">Input Produk</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Admin/listProduk">Data Produk</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="#"><i class="fa fa-file-o fa-fw"></i> Pesanan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url();?>Admin/listPesanan">Data Pesanan</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Penjualan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url();?>Admin/listPenjualan">Data Penjualan</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Pelanggan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url();?>Admin/listPelanggan">Data Pelanggan</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="#"><i class="fa fa-file fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Laporan Penjualan</a>
                    </li>
                    <li>
                        <a href="#">Laporan Data Produk</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="<?php echo base_url();?>Login/logout"><i class="fa fa-clipboard fa-fw"></i>Logout</a>
            </li>
        </ul>
        <!-- end side-menu -->
    </div>
    <!-- end sidebar-collapse -->
</nav>
<!-- end navbar side -->