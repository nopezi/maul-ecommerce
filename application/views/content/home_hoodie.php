<div id="carousel-example-multi11" class="carousel slide carousel-multi-item v-2" data-ride="carousel">

    <div class="carousel-inner v-2" role="listbox">
        
        <div class="carousel-item active">
            <div class="col-12 col-md-4">
                <div class="card mb-2">
                <?php $gambar = explode(',', $produk_limit[0]->gambar); ?>
                    <img class="card-img-top" src="<?=base_url()?>assets/gambar/<?=$gambar[0]?>"
                        alt="Card image cap" style="max-height: 300px">
                    <div class="card-body text-center">
                        <h4 class="card-title font-weight-bold"><?=$produk_limit[0]->nama_produk?></h4>
                        <p class="h6 orange-text"><?='Rp '.number_format($produk_limit[0]->harga)?></p>
                        <a type="button" href="<?=base_url('home/detail')?>/<?=$produk_limit[0]->id_produk?>" target="_blank" class="col-md-12 btn btn-md btn-rounded warning-color-dark text-center">Pilih Variant</a>
                    </div>
                </div>
            </div>
        </div>
        <?php for($i=1; $i < sizeof($produk_limit); $i++): ?>
        <div class="carousel-item">
            <div class="col-12 col-md-4">
                <div class="card mb-2">
                <?php $gambar = explode(',', $produk_limit[$i]->gambar); ?>
                    <img class="card-img-top" src="<?=base_url()?>assets/gambar/<?=$gambar[0]?>"
                        alt="Card image cap" style="max-height: 300px; min-height: 300px">
                    <div class="card-body text-center">
                        <h4 class="card-title font-weight-bold"><?=$produk_limit[$i]->nama_produk?></h4>
                        <p class="h6 orange-text"><?='Rp '.number_format($produk_limit[$i]->harga)?></p>
                        <a type="button" href="<?=base_url('home/detail')?>/<?=$produk_limit[$i]->id_produk?>" target="_blank" target="_blank" class="col-md-12 btn btn-md btn-rounded warning-color-dark text-center">Pilih Variant</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endfor ?>

    </div>

    <!--Controls-->
    <div class="controls-top">
        <a class="btn-floating btn-success" href="#carousel-example-multi11" data-slide="prev"><i
            class="fas fa-chevron-left"></i></a>
        <!-- <a href="<?=base_url('home/hoodie')?>" target="_blank" class="btn btn-md btn-success btn-rounded">Selengkapnya</a> -->
        <a class="btn-floating btn-success" href="#carousel-example-multi11" data-slide="next"><i
            class="fas fa-chevron-right"></i></a>
    </div>
    <!--/.Controls-->

</div>