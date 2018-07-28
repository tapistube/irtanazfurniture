 <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>assets5/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>assets5/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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
				<li class="active">Halaman Data Produk</li>
			</ol>
		</div><!--/.row-->
		
		
		
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabel_sapi">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <?php $no = $this->uri->segment(3)+1;
                        ?>
                        <tbody>
                        <?php 
                            foreach ($produk as $b){
                        ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php cetak($b->nama_produk) ?></td>
                            <td><?php cetak($b->kategori) ?></td>
                            <td>Rp. <?php cetak(number_format($b->harga,0,',','.')); ?></td>
                            <td><?php cetak($b->stok) ?></td>
                            <td style="width: 190px;" align="center">
                                <div>
                                    <a href="<?php echo base_url();?>Admin/detailProduk/<?php cetak($b->id_produk) ?>" class="btn btn-success btn-xs">Lihat</a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


  <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets5/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets5/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets5/datatables-responsive/dataTables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets5/Pemisah.js"></script>
    <script>
    $(document).ready(function() {
        $('#tabel_sapi').DataTable({
            responsive: true
        });
    });
    
    </script>