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
                <h1>Keranjang Belanja</h1>
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
                <div class="pull-right">
                 <!--   <a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> UPDATE</a> -->

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Shopping Cart Items -->
                <?php $total = 0 ;foreach($keranjang as $a){ $total = $total + $a->harga; ?>
                <table class="shopping-cart">
                    <!-- Shopping Cart Item -->

                    <tr>
                        <!-- Shopping Cart Item Image -->
                        <?php 
                            foreach ($gambar as $c){ if($a->id_sapi == $c->id_sapi) {
                        ?>
                        <td class="image"><a href="#"><img src="<?php echo base_url();?>upload-foto/<?php cetak($c->nama_gambar); ?>"
                                                                                   alt="Item Name"></a></td>
                        <?php }}?>
                        <!-- Shopping Cart Item Description & Features -->
                        <td>
                          <h3><a href="#"><?php cetak($a->jenis_sapi);?> (No : <?php cetak($a->id_sapi);?>)</a></h3>
                        </td>
                        <!-- Shopping Cart Item Quantity -->
                        <td class="quantity">
                        </td>
                        <!-- Shopping Cart Item Price -->
                        <td class="price">Rp.<?php cetak(number_format($a->harga,0,',','.')); ?></td>
                        <!-- Shopping Cart Item Actions -->
                        <td class="actions">
                            <a onclick="return confirm('Apakah anda ingin menghapus sapi ini dari keranjang belanja?')" href="<?php echo base_url();?>Utama/Hapus_Transaksi/<?php cetak($a->id_keranjang);?>/<?php cetak($a->id_sapi);?>" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>

                    <!-- End Shopping Cart Item -->
                </table>
                <?php } ?>
                <!-- End Shopping Cart Items -->
            </div>
        </div>
        <div class="row">
            <!-- Promotion Code -->
            <div class="col-md-4  col-md-offset-0 col-sm-6 col-sm-offset-6">
                <div class="cart-promo-code">
                </div>
            </div>
            <!-- Shipment Options -->
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
                <div class="cart-shippment-options">
                </div>
            </div>

            <!-- Shopping Cart Totals -->
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
                <table class="cart-totals">
                    <!--
                    <tr>
                        <td><b>Shipping</b></td>
                        <td>Free</td>
                    </tr>
                    <tr>
                        <td><b>Discount</b></td>
                        <td>- $18.00</td>
                    </tr> -->
                    <tr class="cart-grand-total">
                        <td><b>Total</b></td>
                        <td><b>Rp. <?php cetak(number_format($total,0,',','.')); ?></b></td>
                    </tr>
                </table>
                <!-- Action Buttons -->

                <div class="pull-right">
               <!--     <a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> UPDATE</a> -->
                    <a href="<?php echo base_url();?>Utama/metodeBayar" class="btn"> Lanjutkan </a>
                </div>
                
            </div>
        </div>
    </div>
</div>