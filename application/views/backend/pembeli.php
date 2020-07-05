<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('backend/core/header'); ?>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <?php $this->load->view('backend/core/menu'); ?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?=$halaman?></h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
<!-- <pre>
<?php print_r($data_pembeli);?>	
</pre> -->
                <div class="row">
                	<div class="col-md-12 col-lg-12 col-sm-12">
                		<div class="white-box">
                			<table class="table table-hover" id="pembeli" cellspacing="0" width="100%">
                				<thead>
                					<tr>
                						<th>Nama Pembeli</th>
                						<th>No Hp</th>
                						<th>Alamat</th>
                						<th>Barang</th>
                						<th>Warna</th>
                						<th>Ukuran</th>
                						<th>Jumlah</th>
                						<th>Total Harga</th>
                					</tr>
                				</thead>
                				<tbody>
        						<?php if(!empty($data_pembeli)):?>
                					<?php foreach ($data_pembeli as $row):?>
                						<tr>
                							<td><?=$row->nama_pembeli?></td>
                							<td><?=$row->no_hp?></td>
                							<td><?=$row->alamat?></td>
                							<td><?=$row->produk?></td>
                							<td><?=$row->warna_produk?></td>
                							<td><?=$row->ukuran_produk?></td>
                							<td><?=$row->quantity?></td>
                							<td><?=$row->total_harga?></td>
                						</tr>
                					<?php endforeach;?>
                				<?php endif;?>
                				</tbody>
                			</table>
                		</div>
                	</div>
                </div>


            </div>
            <!-- /.container-fluid -->
            <?php $this->load->view('backend/core/footer'); ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php $this->load->view('backend/core/jquery'); ?>
</body>

</html>
