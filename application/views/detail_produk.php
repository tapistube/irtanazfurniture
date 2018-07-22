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



<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Produk</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-sm-8">
                <div class="basic-login" style="height: 1000px">
                    <!-- Disini Gambar2  Produk -->
                    <div class="col-sm-6">
                       <!-- <div class="basic-login"> -->
                            <h3>Foto Produk</h3>
                            <img src="<?php echo base_url(); ?>foto/produk/<?php echo $produk['foto'] ?>" alt=""
                                 width="280" height="240">
                        <div id="myAlert">
                        <div id="links" style="margin-top: 25px;">
                        <?php foreach ($foto as $b): ?>
                            <a href="<?php echo base_url(); ?>foto/produk/<?php echo $b->nama_foto; ?> " title="<?php echo $b->nama_foto; ?>">
                                <img src="<?php echo base_url(); ?>foto/produk/<?php echo $b->nama_foto; ?>" alt="<?php echo $b->nama_foto; ?>"
                                width="70" height="70">
                            </a>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <br><br>

                            <?php echo form_open_multipart('Ukmgo/lakukanPembelian'); ?>
                                <label>Jumlah</label><br>

                                <input  id="id_produk" name="id_produk" type="hidden" placeholder="" value="<?php echo $produk['id_produk'] ?>">
                                <input  id="min_order" name="min_order" type="hidden" placeholder="" value="<?php echo $produk['min_order'] ?>">
                                <input  id="id_ukm" name="id_ukm" type="hidden" placeholder="" value="<?php echo $ukm['id_ukm'] ?>">
                                <input  id="txt_jumlah" name="txt_jumlah" maxlength="6" onkeypress="return hanyaAngka(event)" type="text" placeholder="" value="<?php echo $produk['min_order'] ?>">
                                <div class="clearfix"></div>
                                <br>
                        <script>
                            function hanyaAngka(evt) {
                                var charCode = (evt.which) ? evt.which : event.keyCode
                                if (charCode > 31 && (charCode < 48 || charCode > 57))

                                    return false;
                                return true;
                            }
                        </script>

                                <button class="btn btn-lg" type="submit" style="width: 700px">Beli</button>
                            <?php echo form_close(); ?>


                            <!--  Komentar-->
                            <br>
                            <br>
                            <h3>Komentar</h3>

                            <?php echo form_open_multipart('Ukmgo/simpanKomentar'); ?>
                            <div class="form-group">
                                <input  id="id_produk" name="id_produk" type="hidden" placeholder="" value="<?php echo $produk['id_produk'] ?>">
                                <input  id="id_ukm" name="id_ukm" type="hidden" placeholder="" value="<?php echo $ukm['id_ukm'] ?>">
                                <label for="register-username"><i class="icon-user"></i> <b>Nama</b></label>
                                <input class="form-control" id="register-nama" name="register-nama" type="text" placeholder=""
                                maxlength="50">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="txt_perihal">Komentar</label>
                                <textarea class="form-control" name="txt_komentar" rows="7" placeholder="" id="txt_komentar"
                                maxlength="120"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg" value="tambah_komen" name="tambah_komen" id="tambah_komen"
                                        >OK</button>
                                <div class="clearfix"></div>
                            </div>
                            <?php echo form_close(); ?>
                        <br><br>
                        <div class="basic-login" style="width: 700px">
                            <h3>Komentar Pelanggan</h3>
                            <br>
                        <?php foreach ($data_komentar as $b){ ?>


                            <div class="image">
                                <img src="<?php echo base_url();?>assets1/img/logos/customer.png" alt="komentar"
                                     width="80" height="80">
                                <strong><?php echo $b->username; ?></strong>
                                <h5><?php echo $b->komentar; ?></h5>
                            </div>
                            <br>
                                <h2></h2>

                        <?php } ?>
                        </div>
                        </div>
                        <br>


                    <div class="col-sm-6">
                        <div class="basic-login">
                            <h3><?php echo $produk['nama_produk']; ?></h3>
                            <br>
                            <h1>Rp. <?php echo $produk['harga']; ?></h1>
                            <br>
                            <h3>Stok : <?php echo $produk['stok']; ?></h3>
                            <h4>
                                <?php echo $produk['deskripsi']; ?>
                                <br>
                                <br><br>
                                Pembelian diberikan secara COD
                                <br>
                                Minimum Pembelian : <?php echo $produk['min_order']; ?> buah
                            </h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-3 col-sm-offset-1 social-login">
                <div class="basic-login">
                <!--
                Disini Detil UKM nya
                -->
                    <img src="<?php echo base_url(); ?>foto/<?php echo $ukm['foto']; ?>" alt="logoukm"
                         width="80" height="80">
                    <br>
                    <a href="<?php echo base_url(); ?>index.php/Ukmgo/profilPenjual/<?php echo $ukm['id_ukm']; ?>">
                    <h3>
                        <br>
                        <?php echo $ukm['nama']; ?>
                        <br>
                    </h3>
                    </a>
                    <h5>
                        Bergabung  : <?php echo date("d-F-Y",strtotime($ukm['tanggal_daftar'])); ?>
                    </h5>
                    <br>
                    <h3>Produk lainnya : </h3>
                    <br>
                    <?php foreach ($data_iklan_produk as $b){ ?>

                        <div class="image">
                            <a href="<?php echo base_url(); ?>index.php/Ukmgo/detailProduk/<?php echo $b->id_produk; ?>/<?php echo $b->ref_ukm; ?>">
                                <img src="<?php echo base_url();?>foto/produk/<?php echo $b->foto; ?>" alt="Item Name"
                                     width="80" height="80">
                                   <?php echo $b->nama_produk; ?>
                            </a>
                        </div>
                        <br>

                    <?php } ?>

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
    </div>
</div>

<script>
    window.baseUrl = '<?php echo base_url() ?>';

    document.getElementById('links').onclick = function (event) {
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