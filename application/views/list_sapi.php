
<div class="section">
    <div class="container">
        <div class="row">


            <br>
            <?php
            function rupiah($angka){
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;}
            ?>
            <div class="col-md-12">
                <form class="navbar-form" role="search">
                    <div class="input-group add-on">
                        <input class="form-control" placeholder="Cari Nama sapi atau ID sapi" name="srch-term" id="srch-term" type="text">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <br>
            </div>

            <div class="col-md-12">
                <div class="col-md-3" align="center">
                    <a href="#" class="btn btn-orange btn-lg">Sapi Simental / Limosin</a>
                </div>
                <div class="col-md-3" align="center">
                    <a href="#" class="btn btn-blue btn-lg">Sapi PO</a>
                </div>
                <div class="col-md-3" align="center">
                    <a href="#" class="btn btn-red btn-lg">Sapi Madura</a>
                </div>
                <div class="col-md-3" align="center">
                    <a href="#" class="btn btn-green btn-lg">Sapi Jawa</a>
                </div>
            </div>

<!--            //tempat perulangan database-->
            <?php 
            foreach ($sapi as $a){
                if($a->status == "1"){
             ?>
            <div class="col-sm-4">
                <!-- Product -->
                <div class="shop-item">
                    <!-- Product Image -->
                     <?php 
                     foreach ($gambar as $b){
                         if($b->id_sapi == $a->id_sapi){
                     ?>
                    <div class="image">
<!--                        <button type="submit">-->
                        <a href="<?php echo base_url();?>Utama/detailSapiUser/<?php cetak($a->id_sapi) ?>">
                            <img width="300" height="300" src="<?php echo base_url();?>upload-foto/<?php cetak($b->nama_gambar); ?>" alt="Item Name">
                            </a>
<!--                            </button>-->
                    </div>
                    <?php }}?>
                    <!-- Product Title -->
                    <div class="title">
                        <h3><a href="<?php echo base_url();?>Utama/detailProyek/#"><?php cetak($a->jenis_sapi) ?></a></h3>
                    </div>
                    <!-- Product Available Colors-->

                    <!-- Product Price-->
                    <div class="price">
                        <span class="price-was"></span> Rp. <?php cetak(number_format($a->harga,0,',','.')); ?>
                    </div>
                    <!-- Product Description-->
                    <div class="description" align="center">
                        <p>Berat sekarang : <?php cetak($a->berat_kotor) ?> Kg</p>
                        <p>Berat Estimasi : <?php cetak($a->berat_bersih) ?> Kg</p>
                    </div>
                    <!-- Add to Cart Button -->
                    <div class="actions">
                    </div>
                </div>
                <!-- End Product -->
            </div>
            
            <?php }} ?>
<!--
            //ahir perulangan database
            
-->

            </div>

        <div class="row">
            <div class="pagination-wrapper ">
                <div class="pagination pagination-lg">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
<!--
                <ul class="pagination pagination-lg">
                    <li class="disabled"><a href="#">Previous</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#">10</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
-->
            </div>
        </div>
        	
    </div>
</div>