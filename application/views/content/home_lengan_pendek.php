<div id="carousel-example-multi2" class="carousel slide carousel-multi-item v-2" data-ride="carousel">

    <div class="carousel-inner v-2" role="listbox">

        
        <?php for($i=0; $i < sizeof($data_produk); $i++): ?>
        <?php 
            $gambar = explode(',', $data_produk[$i]->gambar);
            $aktif = '';
            if($i < 1){ $aktif = 'active'; }
        ?>
        <div class="carousel-item <?=$aktif?>">
            <div class="col-12 col-md-4">
                <div class="card mb-2">
                    <img class="card-img-top" src="<?=base_url()?>assets/gambar/<?=$gambar[0]?>" alt="Card image cap" style="max-height: 300px">
                    <div class="card-body text-center">
                        <h4 class="card-title font-weight-bold"><?=$data_produk[$i]->nama_produk?></h4>
                        <p class="h6 orange-text"><?='Rp. '.number_format($data_produk[$i]->harga)?></p>
                        <a type="button" href="<?=base_url('home/detail_product')?>" target="_blank" target="_blank" class="col-md-12 btn btn-md btn-rounded warning-color-dark text-center">Pilih Variant</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endfor; ?>

    </div>

    <!--Controls-->
    <div class="controls-top">
        <a class="btn-floating btn-success" href="#carousel-example-multi2" data-slide="prev"><i
            class="fas fa-chevron-left"></i></a>
        <a href="<?=base_url('home/lengan_pendek')?>" target="_blank" class="btn btn-md btn-success btn-rounded">Selengkapnya</a>
        <a class="btn-floating btn-success" href="#carousel-example-multi2" data-slide="next"><i
            class="fas fa-chevron-right"></i></a>
    </div>
    <!--/.Controls-->

</div>