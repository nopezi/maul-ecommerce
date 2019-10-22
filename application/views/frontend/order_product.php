<div class="container-fluid" style="margin-top:80px">
    <div class="row">
        <div class="col-md-12">
            <ul id="menu">
                <li><a href="<?=base_url('home/kategori')?>/<?=$order['id_kategori']?>">Kategori Produk</a></li>
                <li>></li>
                <li><a href="<?=base_url('home/detail')?>/<?=$order['id_produk']?>">Detail Product</a></li>
                <li>></li>
                <li>Order Product</li>
            </ul> 
        </div>
    </div>
</div>
<div class="container" style="margin-bottom: 100px"><?php //print_r($order); ?>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Data Pesanan
                    </div>
                </div>
                <table id="dtBasicExample" class="table card-body table-hover" cellspacing="0" width="100%">
                    <tr>
                        <th>Produk</th>
                        <td><?=$order['nama_produk']?></td>
                    </tr>
                    <?php if(!empty($order['warna'])): ?>
                    <tr>
                        <th>Warna Produk</th>
                        <td><?=$order['warna']?></td>
                    </tr>
                    <?php endif;?>
                    <?php if(!empty($order['ukuran'])):?>
                    <tr>
                        <th>Ukuran Produk</th>
                        <td>
                            <?php $ukuran = explode("*", $order['ukuran']); echo $ukuran[1]; ?>
                        </td>
                    </tr>
                    <?php endif;?>
                    <tr>
                        <th>Quantity</th>
                        <td><?=$order['jumlah']?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>
                            <?php
                            if(!empty($order['harga_ukuran'])){
                                $harga_ukuran = str_replace("Rp", "", $order['harga_ukuran']);
                                $harga_ukuran = str_replace(",", "", $harga_ukuran);
                                $harga_total  = $order['jumlah'] * $harga_ukuran;
                                echo 'Rp '.number_format($harga_total);
                            }else{ 
                                $harga_ukuran = str_replace("Rp", "", $order['harga']);
                                $harga_ukuran = str_replace(",", "", $harga_ukuran);
                                $harga_total  = $order['jumlah'] * $harga_ukuran;
                                echo 'Rp '.number_format($harga_total);
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <?php
                $pesan = "Assalamualaikum min, saya mau pesan ini *Nama Produk* : ".$order['nama_produk'];
                $pesan .= " *Warna* : ".$order['warna']." *Ukuran* : ".$ukuran[1]." *Qty* ".$order['jumlah']."";
                ?>
                <a href="https://api.whatsapp.com/send?phone=6281943214722&text=<?=$pesan?>" target="_blank" class="btn btn-md btn-success"><i class="fab fa-whatsapp"></i> Pesan</a>
            </div>
            <!-- card -->
        </div>
        <!-- col -->
    </div>
</div>

<?php $this->load->view('content/footer'); ?>
<script type="text/javascript">
// $(document).ready(function(){
//     $('#dtBasicExample').DataTable({
//         "scrollX" : true,
//         "searching": false,
//         "bPaginate": true,
//         "bDestroy": false,
//         "bLengthChange": false,
//         "bFilter": false,
//         "bInfo": false,
//         "bAutoWidth": true,
//     });
// });
</script>