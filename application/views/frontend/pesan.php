<div class="container-fluid" style="margin-top:80px">
	<div class="row justify-content-center">
		<div class="col-12 col-md-6 col-lg-4">
			<div class="card mb-3">
				<div class="card-header success-color">
                    <div class="text-center white-text">
                        Pesanan
                    </div>
                </div>
                <table id="dtBasicExample" class="table card-body table-hover" cellspacing="0" width="100%">
                	<tr>
                		<th>Pemesan</th>
                		<td><?=$data_pesan[0]->nama_pembeli?></td>
                	</tr>
                	<tr>
                		<th>Nomor Hp</th>
                		<td><?=$data_pesan[0]->no_hp?></td>
                	</tr>
                	<tr>
                		<th>Alamat</th>
                		<td><?=$data_pesan[0]->alamat?></td>
                	</tr>
                	<tr>
                		<th>Produk</th>
                		<td><?=$data_pesan[0]->produk?></td>
                	</tr>
                	<tr>
                		<th>Warna</th>
                		<td><?=$data_pesan[0]->warna_produk?></td>
                	</tr>
                	<tr>
                		<th>Ukuran</th>
                		<td><?=$data_pesan[0]->ukuran_produk?></td>
                	</tr>
                	<tr>
                		<th>Jumlah Pesan</th>
                		<td><?=$data_pesan[0]->quantity?></td>
                	</tr>
                	<tr>
                		<th>Total Harga</th>
                		<td><?=$data_pesan[0]->total_harga?></td>
                	</tr>
                </table>
                <?php
                $pesan = "Nama : ".$data_pesan[0]->nama_pembeli."\n";
                $pesan .= "No Hp : ".$data_pesan[0]->no_hp."\n";
                $pesan .= "Alamat : ".$data_pesan[0]->alamat."\n";
                $pesan .= "Keterangan : \n";
                $pesan .= "- Nama Produk ".$data_pesan[0]->produk."\n";
                $pesan .= "- Warna ".$data_pesan[0]->warna_produk."\n";
                $pesan .= "- Ukuran ".$data_pesan[0]->ukuran_produk."\n";
                $pesan .= "- Total harga ".$data_pesan[0]->total_harga."\n";
                ?>
                <a href="https://api.whatsapp.com/send?phone=6281225116401&text=<?=urlencode($pesan)?>" target="_blank" class="btn btn-md btn-success card-footer"><i class="fab fa-whatsapp"></i> Pesan</a>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('content/footer'); ?>