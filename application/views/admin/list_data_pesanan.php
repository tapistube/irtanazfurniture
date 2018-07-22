<link href="<?php echo base_url();?>assets5/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">


<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url();?>assets5/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets3/Gallery/css/blueimp-gallery.min.css">
<script src="<?php echo base_url(); ?>assets3/Gallery/js/blueimp-gallery.min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58eb107c9c504492"></script>
<script src="<?php echo base_url();?>/assets1/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/jquery-1.10.2.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />


<div id="page-wrapper">
    <div class="row">
        <br><br>
        <?php
        $no = 1;
        ?>
        <?php
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;}
        ?>

        <div class="col-md-12">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-th-list"></em>
                        </a></li>
                    <li class="active">Halaman Data Pesanan</li>
                </ol>
            </div>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Pesanan
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table  class="table table-striped table-bordered table-hover" id="tabel_pelanggan">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Nama</th>
                                    <th>Total Pembayaran</th>
                                    <th>Total DP</th>
                                    <th>Status</th>
                                    <th>Bukti bayar DP</th>
                                    <th>Bukti bayar Lunas</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td ><?php echo $no++;?></td>
                                    <td>15 Januari 2018 </td>
                                    <td>Roberto</td>
                                    <td >Rp. 15.000.000</td>
                                    <td >Rp. 4.000.000</td>
                                    <td>Menunggu Pembayaran DP</td>
                                    <td>
                                        <div id="myAlert">
                                            <div id="links">
                                        <a href="<?php echo base_url();?>assets1/img/bukti_bayar.jpg" title="bukti DP">
                                            <img src="<?php echo base_url();?>assets1/img/bukti_bayar.jpg" width="70" height="70" alt="aa">
                                        </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td> - </td>
                                    <td style="width: 190px;" align="center">
                                        <div>
                                            <a href="<?php echo base_url();?>Admin/detailPesanan" class="btn btn-success btn-xs">Detail</a>
                                            <a href="<?php echo base_url();?>Admin/listPesanan" class="btn btn-warning btn-xs">Verifikasi DP</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td ><?php echo $no++;?></td>
                                    <td>25 Januari 2018 </td>
                                    <td>Carlos</td>
                                    <td>Rp. 25.000.000</td>
                                    <td>-</td>
                                    <td>Menunggu Pembayaran (Lunas)</td>
                                    <td>-</td>
                                    <td>
                                        <div id="myAlert">
                                            <div id="links2">
                                                <a href="<?php echo base_url();?>assets1/img/bni.png" title="bukti Lunas">
                                                    <img src="<?php echo base_url();?>assets1/img/bni.png" width="70" height="70" alt="bb">
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 190px;" align="center">
                                        <div>
                                            <a href="<?php echo base_url();?>Admin/detailPesanan" class="btn btn-success btn-xs">Detail</a>
                                            <a href="<?php echo base_url();?>Admin/listPesanan" class="btn btn-danger btn-xs">Verifikasi Lunas</a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
        <div id="blueimp-gallery" class="blueimp-gallery">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>

        <!-- The Gallery as inline carousel, can be positioned anywhere on the page -->
        <div id="blueimp-gallery-carousel" class="blueimp-gallery blueimp-gallery-carousel">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
    </div>
    <script>
        window.baseUrl = '<?php echo base_url(); ?>';

        document.getElementById('links').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement,
                link = target.src ? target.parentNode : target,
                options = {index: link, event: event},
                links = this.getElementsByTagName('a');
            blueimp.Gallery(links, options);
        };
        document.getElementById('links2').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement,
                link = target.src ? target.parentNode : target,
                options = {index: link, event: event},
                links = this.getElementsByTagName('a');
            blueimp.Gallery(links, options);
        };

        $( document ).ajaxComplete(function( event, xhr, settings ) {
            console.log(settings);
        });

        function myAlert(Aclass, text) {
            html = '<div class="alert ' + Aclass + ' alert-dismissible fade show" role="alert" style="margin-top: 25px">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                '<span aria-hidden="true">&times;</span>'+
                '</button>'+
                ''+text+'.'+
                '</div>';
            $("#myAlert").html(html).show();
        }
    </script>



    <script src="<?php echo base_url();?>assets5/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets5/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets5/datatables-responsive/dataTables.responsive.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel_pelanggan').DataTable({
                responsive: true
            });
        });

    </script>