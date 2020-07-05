
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
        <div class="col-12 col-md-6 col-lg-7">
            <div class="card">
                <div class="card-header success-color white-text text-center">
                    Data Pembeli
                </div>
                <div class="card-body px-lg-5 pt-0">
                    <form class="text-center" style="color: #757575;" action="<?=base_url('home/pesan')?>" method="post">

                      <div class="md-form">
                        <input type="text" id="nama_pembeli" name="nama_pembeli" class="form-control">
                        <label for="nama_pembeli">Nama Pembeli</label>
                      </div>

                      <div class="md-form">
                        <input type="text" id="no_hp" name="no_hp" class="form-control">
                        <label for="no_hp">Nomor Hp</label>
                      </div>

                      <div class="md-form">
                        <!-- <input type="text" id="alamat" class="form-control"> -->
                        <textarea class="md-textarea form-control" id="alamat" name="alamat" rows="3"></textarea>
                        <label for="alamat">Alamat</label>
                        <input type="hidden" name="produk" value="<?=$order['nama_produk']?>">
                        <input type="hidden" name="warna" value="<?=$order['warna']?>">
                        <input type="hidden" name="jumlah" value="<?=$order['jumlah']?>">
                        <?php $ukuran = explode("*", $order['ukuran']); ?>
                        <input type="hidden" name="ukuran" value="<?=$ukuran[1]?>">
                        <?php
                        if(!empty($order['harga_ukuran'])){
                            $harga_ukuran = str_replace("Rp", "", $order['harga_ukuran']);
                            $harga_ukuran = str_replace(",", "", $harga_ukuran);
                            $harga_total  = $order['jumlah'] * $harga_ukuran;
                            $harga = 'Rp '.number_format($harga_total);
                        }else{ 
                            $harga_ukuran = str_replace("Rp", "", $order['harga']);
                            $harga_ukuran = str_replace(",", "", $harga_ukuran);
                            $harga_total  = $order['jumlah'] * $harga_ukuran;
                            $harga = 'Rp '.number_format($harga_total);
                        }
                        ?>
                        <input type="hidden" name="harga" value="<?=$harga_total?>">
                      </div>

                </div>

                    <button class="btn btn-md btn-success card-footer" type="submit">
                        Selanjutnya
                    </button>
                </form>
                    
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header success-color">
                    <div class="text-center white-text">
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
                
            </div>
            <!-- card -->
        </div>
        <!-- col -->
    </div>
</div>

<?php $this->load->view('content/footer'); ?>

<script type="text/javascript">

    tampil_tombol();
    function tampil_tombol() {
        var tombol = '<button class="btn btn-md btn-success card-footer" onclick="simpan_order()">' +
                    '<i class="fab fa-whatsapp"></i> Pesan' +
                '</button>';
        // console.log(tombol);
        $('#tombol-tampil').html(tombol);
        // document.getElementById("tombol-tampil").innerHTML = '<button class="btn btn-md btn-success card-footer" onclick="simpan_order()"><i class="fab fa-whatsapp"></i> Pesan</button>';
    }

    function simpan_order() {
        alert('masok');
    }
</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#dtBasicExample').DataTable({
        "scrollX" : true,
        "searching": false,
        "bPaginate": true,
        "bDestroy": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": true,
    });
});
</script>