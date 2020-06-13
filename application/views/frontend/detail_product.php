<div class="container-fluid" style="margin-top:80px">
    <div class="row">
        <div class="col-md-12">
            <ul id="menu">
                <li><a href="<?=base_url('home/kategori')?>/<?=$data_produk[0]->id_kategori?>">Kategori Produk</a></li>
                <li>></li>
                <li>Detail Product</li>
            </ul> 
        </div>
    </div>
</div>

<div class="container" style="margin-top:30px; margin-bottom: 101px">
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                
                                    <!--Carousel Wrapper-->
                                    <div id="carousel-example-1z" class="carousel slide carousel-fade mb-3" data-ride="carousel">

                                        <div class="carousel-inner" role="listbox">
                                            <?php for($i=0; $i < sizeof($data_produk[0]->foto); $i++): ?>
                                                <?php $aktif = ($i == 0?'active':'haha');?>
                                                <div class="carousel-item <?=$aktif?>">
                                                    <img class="d-block w-100" src="<?=base_url()?>assets/gambar/<?=trim($data_produk[0]->foto[$i])?>"
                                                        alt="Second slide" style="max-height: 300px; min-height: 300px">
                                                </div>
                                            <?php endfor;?>
                                        </div>
                                        <!--/.Slides-->
                                        <!--Controls-->
                                        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        <!--/.Controls-->
                                    </div>
                                    <!--/.Carousel Wrapper-->

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 offset-lg-1">
                            <!-- <div class="row"> -->
                                <form action="<?=base_url('home/order_product/')?>" method="post">
                                    <div class="form-row">
                                    <div class="col-12">
                                        <p class="h6"><?=ucwords($data_produk[0]->nama_produk)?></p>
                                        <input type="hidden" name="nama_produk" value="<?=ucwords($data_produk[0]->nama_produk)?>">
                                        <input type="hidden" name="id_produk" value="<?=$data_produk[0]->id_produk?>">
                                        <input type="hidden" name="id_kategori" value="<?=$data_produk[0]->id_kategori?>">
                                        <input type="hidden" name="harga" value="<?='Rp '.number_format($data_produk[0]->harga)?>">
                                        <hr>
                                    </div>
                                    </div>
                                    <?php 
                                    $ukuran = explode(',', $data_produk[0]->ukuran); 
                                    $harga_ukuran = explode(',', $data_produk[0]->harga_ukuran); 
                                    ?>
                                    <div class="form-row">
                                        <div class="col-12">
                                            <select class="mdb-select md-form" id="barang" name="ukuran" onchange="price()" required>
                                                <option value="" disabled selected>Pilih Ukuran</option>
                                            <?php if(!empty($ukuran)): ?>
                                                <?php for($y=0; $y < sizeof($ukuran); $y++): ?>
                                                <option value="<?='Rp '.number_format($harga_ukuran[$y])?>*<?=ucwords($ukuran[$y])?>"><?=ucwords($ukuran[$y])?></option>
                                                <?php endfor;?>
                                            <?php endif;?>
                                            </select>
                                            <label for="">Pilih Ukuran</label>
                                        </div>
                                    </div>
                                    <?php $warna = explode(',', $data_produk[0]->warna); ?>
                                    <div class="form-row">
                                        <div class="col-12">
                                            <select class="mdb-select md-form" name="warna" required>
                                                <option value="" disabled selected>Pilih Warna</option>
                                                <?php foreach($warna as $w): ?>
                                                <option><?=ucwords($w)?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <label for="">Pilih Warna</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12"> -->
                                        <div class="form-row">
                                            <div class="col-12 col-md-1 col-lg-1">
                                                <label for="">Quantity</label>
                                                <div class="def-number-input number-input safari_only">
                                                    <button type="button" onclick="this.parentNode.querySelector('input[name=quantity]').stepDown()" class="minus"></button>
                                                    <input class="quantity" min="0"  name="quantity" value="1" type="number">
                                                    <button type="button" onclick="this.parentNode.querySelector('input[name=quantity]').stepUp()" class="plus"></button>
                                                </div>
                                                <!-- <div class="md-form">
                                                    <input type="number" class="form-control" id="angka" onkeyup="sum();">
                                                </div> -->
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-5 offset-md-5">
                                                <div id="tampil"></div>
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                    <!-- <div class="col-12 col-md-12 col-lg-12"> -->
                                        <button type="submit" class="col-12 btn btn-sm btn-success btn-rounded">Next</button>
                                        <!-- <a href="https://api.whatsapp.com/send?phone=6281943214722&text=Assalamualaikum min, saya mau pesan ini *Nama Produk* : AM250P - Nikmat Tuhanmu *Warna* : Hitam *Ukuran* : M *Qty* 1pcs&source=&data=" class="btn btn-md btn-success btn-rounded col-lg-12">
                                        Pesan via Whatsapp
                                        </a> -->
                                    <!-- </div> -->
                                </form>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-md-10 col-lg-10">
                            <p class="h6">Keterangan Produk</p>
                            <p>
                                <?=$data_produk[0]->keterangan?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('content/footer'); ?>
<script type="text/javascript">
    // Material Select Initialization
    $(document).ready(function() {
    $('.mdb-select').materialSelect();
    });

    function price() {
        var tes = document.getElementById("barang").value;
        var pecah = tes.split("*");
            // document.getElementById("harga").value=tes;
            var html =  '<label for="">Harga</label>'+
                        '<p class="text-danger h6">'+pecah[0]+'</p>' +
                        '<input type="hidden" name="harga_ukuran" value="'+pecah[0]+'">';
            $('#tampil').html(html);
            console.log(pecah);
    }
    function sum(){
        // this.parentNode.querySelector('input[name=quantity]').stepDown()
        var data = document.getElementById("tambah").value;
        console.log(data);
        document.getElementById('angka').value;
        console.log('ada');
    }
</script>