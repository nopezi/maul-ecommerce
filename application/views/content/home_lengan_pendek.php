<?php foreach($data_kategori as $dk): ?>
    <?php $y=0;
    foreach($data_produk as $dp){
        if($dp->id_kategori == $dk->id_kategori){
            if($y>0){
                break;
            }
    ?>
    <!-- <div class="row">
        <div class="col-md-12">
            <p class="h4">
                <a href="<?//=base_url('home/kategori')?>/<?//=$dk->id_kategori?>" target="_blank" class="text-success"><?=$dk->kategori?></a>
            </p>
            <hr>
        </div>
    </div> -->
    <?php $y++;  } } ?>
    <div class="row mb-4">
    
    <?php for($i=0; $i < sizeof($data_produk); $i++): ?>
    <?php $y=0; ?>
    <?php if($dk->id_kategori == $data_produk[$i]->id_kategori):?>
    <?php echo $y; ?>
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card-group">
                <div class="card">
                    <?php $gambar = explode(',', $data_produk[$i]->gambar); ?>
                    <img src="<?=base_url()?>assets/gambar/<?=$gambar[0]?>" alt="Card image cap" class="card-img-top post-thumb" style="max-height: 200px; min-height: 200px">
                    <div class="card-body text-center post-body">
                        <h5 class="card-title font-weight-bold"><?=$data_produk[$i]->nama_produk?></h4>
                        <p class="h6 orange-text"><?='Rp '.number_format($data_produk[$i]->harga)?></p>
                    </div>
                    <a href="<?=base_url('home/detail')?>/<?=$data_produk[$i]->id_produk?>" type="button" target="_blank" class="card-footer btn btn-md btn-rounded warning-color-dark text-center">
                        Pilih
                    </a>
                </div>
            </div>
        </div>
    <?php $y++; ?>
    <?php endif;?>
    <?php endfor; ?>
    </div>
    <?php $y=0;
    foreach($data_produk as $dp){
         if($dp->id_kategori == $dk->id_kategori){
             if($y>0){
                 break;
             }
    ?>
        <hr>
    <?php $y++;  } } ?>
    <?php endforeach;?>