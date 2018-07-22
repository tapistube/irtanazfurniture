<link rel="stylesheet" href="<?php echo base_url(); ?>assets3/Gallery/css/blueimp-gallery.min.css">
<script src="<?php echo base_url(); ?>assets3/Gallery/js/blueimp-gallery.min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58eb107c9c504492"></script>
<script src="<?php echo base_url();?>/assets1/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets4/plugins/jquery-1.10.2.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />

<div class="section">
    <div class="container">
        <?php 
            foreach ($detail_sapi as $b){
        ?>
        <div class="row">
            <!-- Product Image & Available Colors -->
            <div class="col-sm-6">
                <div class="product-image-large">
                    <?php foreach ($gambar_Utama as $d){  ?>
                    <img src="<?php echo base_url();?>upload-foto/<?php cetak($d->nama_gambar); ?>" alt="Item Name"
                    height="400" width="600">
                    <?php }?>
                    <br>
                </div>
                <h4>Foto lainnya dari sapi ini</h4>
                <div id="myAlert">
                    <div id="links">
                        <?php 
                            foreach ($gambar as $c){
                        ?>
                        <a href="<?php echo base_url();?>upload-foto/<?php cetak($c->nama_gambar); ?>" title="Sapi">
                            <img src="<?php echo base_url();?>upload-foto/<?php cetak($c->nama_gambar); ?>" width="70" height="70" alt="aa">
                        </a>
                       <?php } ?>
                    </div>
                </div>


            </div>
            <!-- End Product Image & Available Colors -->
            <!-- Product Summary & Options -->
            <div class="col-sm-6 product-details">
                <h3>ID Sapi = <?php cetak($b->id_sapi) ?></h3>
                <table class="shop-item-selections">
                    <!-- Color Selector -->
                    <tr>
                        <td><b>Jenis :</b></td>
                        <td>
                           <?php cetak($b->jenis_sapi) ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Harga :</b></td>
                        <td>
                            Rp. <?php cetak(number_format($b->harga,0,',','.')); ?>
                        </td>
                    </tr>
                    <!-- Size Selector -->
                    <tr>
                        <td><b>Berat Sekarang :</b></td>
                        <td>
                           <?php cetak($b->berat_kotor) ?> Kg
                        </td>
                    </tr>
                    <!-- Quantity -->
                    <tr>
                        <td><b>Berat Estimasi :</b></td>
                        <td>
                           <?php cetak($b->berat_bersih) ?> Kg
                        </td>
                    </tr>
                </table>
                <br><br>
                <div class="col-sm-4"></div>
                <?php echo form_open_multipart('Utama/berhasilMasukKeranjang')?>
                <input type="hidden" value="<?php cetak($b->id_sapi) ?>" id="txt_id_sapi" name="txt_id_sapi">
                <button class="btn btn-green btn-lg" type="submit">Beli Sapi Ini</button>
                <?php echo form_close();?>
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
        <?php }?>
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