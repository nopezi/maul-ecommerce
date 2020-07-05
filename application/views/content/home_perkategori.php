<?php foreach ($per_kategori as $pk): ?>
    
<div class="row">
    
    <?php foreach($pk->data_produk as $dp):?>
        <?php //echo $dp->nama_produk?>
        <div class="col-12 col-md-4 col-lg-2 mb-3">
            <!-- <div class="card-group"> -->
                <center>
                <div class="card" style="min-width: 100px; max-width: 330px;">

                    <img src="<?=base_url()?>assets/gambar/<?=$dp->foto?>" alt="Card image cap" class="card-img-top post-thumb" style="max-height: 10px; min-height: 130px">
                    <div class="card-body text-center post-body">
                        <h5 class="card-title font-weight-bold"><?=$dp->nama_produk?></h4>
                        <p class="h6 orange-text"><?='Rp '.number_format($dp->harga)?></p>
                        <small>
                            <a class="black-text" href="<?=base_url('home/sk')?>?sk=<?=$dp->sub_kategori?>" target="_blank">
                                <?=ucwords($dp->sub_kategori)?>
                            </a>
                        </small>
                    </div>
                    <a href="<?=base_url('home/detail')?>/<?=$dp->id_produk?>" type="button" class="card-footer btn btn-md btn-rounded warning-color-dark text-center">
                        Pilih
                    </a>
                </div>
                </center>
            <!-- </div> -->
        </div>
    <?php endforeach?>

</div>
<div class="col-12"><hr></div>
<?php endforeach;?>