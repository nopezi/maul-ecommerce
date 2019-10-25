<div class="container-fluid" style="margin-top:56px; margin-bottom: 20px">
    <div class="row">
        <div class="col-12">
        <?php $this->load->view('content/slide_header'); ?>
        </div>
    </div>
</div>
<?php //print_r($kategori_1); ?>
<div class="container-fluid">
    <div class="row">
        <!-- hoodie -->
        <div class="col-xl-12">
        <?php $this->load->view('content/home_hoodie'); ?>
        </div>
        <!-- hoodie -->
    </div>
</div>

<div class="container-fluid" style="margin-bottom: 100px">
    <!-- kategori 1 -->
    <div class="row">
    <?php foreach($kategori_1 as $k1): ?>
        <div class="col-12 col-md-4 col-lg-3 mb-3">
            <div class="card-group">
                <center>
                <div class="card" style="min-width: 300px; max-width: 330px">
                    <?php $gambar = explode(',', $k1->gambar); ?>
                    <img src="<?=base_url()?>assets/gambar/<?=$gambar[0]?>" alt="Card image cap" class="card-img-top post-thumb" style="max-height: 200px; min-height: 200px">
                    <div class="card-body text-center post-body">
                        <h5 class="card-title font-weight-bold"><?=$k1->nama_produk?></h4>
                        <p class="h6 orange-text"><?='Rp '.number_format($k1->harga)?></p>
                        <small>
                            <a class="black-text" href="<?=base_url('home/sk')?>?sk=<?=$k1->sub_kategori?>" target="_blank">
                                <?=ucwords($k1->sub_kategori)?>
                            </a>
                        </small>
                    </div>
                    <a href="<?=base_url('home/detail')?>/<?=$k1->id_produk?>" type="button" target="_blank" class="card-footer btn btn-md btn-rounded warning-color-dark text-center">
                        Pilih
                    </a>
                </div>
                </center>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    <div class="col-12"><hr></div>
    <!-- kategori 1 -->

    <!-- kategori 2 -->
    <div class="row">
    <?php foreach($kategori_2 as $k2): ?>
        <div class="col-12 col-md-4 col-lg-3 mb-3">
            <div class="card-group">
                <center>
                <div class="card" style="min-width: 300px; max-width: 330px">
                    <?php $gambar = explode(',', $k2->gambar); ?>
                    <img src="<?=base_url()?>assets/gambar/<?=$gambar[0]?>" alt="Card image cap" class="card-img-top post-thumb" style="max-height: 200px; min-height: 200px">
                    <div class="card-body text-center post-body">
                        <h5 class="card-title font-weight-bold"><?=$k2->nama_produk?></h4>
                        <p class="h6 orange-text"><?='Rp '.number_format($k2->harga)?></p>
                        <small>
                            <a class="black-text" href="<?=base_url('home/sk')?>?sk=<?=$k2->sub_kategori?>" target="_blank">
                                <?=ucwords($k2->sub_kategori)?>
                            </a>
                        </small>
                    </div>
                    <a href="<?=base_url('home/detail')?>/<?=$k2->id_produk?>" type="button" target="_blank" class="card-footer btn btn-md btn-rounded warning-color-dark text-center">
                        Pilih
                    </a>
                </div>
                </center>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    <div class="col-12"><hr></div>
    <!-- kategori 2 -->

    <!-- kategori 3 -->
    <?php if(!empty($kategori_3)): ?>
    <div class="row mb-3">
    <?php foreach($kategori_3 as $k3): ?>
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card-group">
                <div class="card">
                    <?php $gambar = explode(',', $k3->gambar); ?>
                    <img src="<?=base_url()?>assets/gambar/<?=$gambar[0]?>" alt="Card image cap" class="card-img-top post-thumb" style="max-height: 200px; min-height: 200px">
                    <div class="card-body text-center post-body">
                        <h5 class="card-title font-weight-bold"><?=$k3->nama_produk?></h4>
                        <p class="h6 orange-text"><?='Rp '.number_format($k3->harga)?></p>
                        <small><?=ucwords($k3->sub_kategori_produk)?></small>
                    </div>
                    <a href="<?=base_url('home/detail')?>/<?=$k3->id_produk?>" type="button" target="_blank" class="card-footer btn btn-md btn-rounded warning-color-dark text-center">
                        Pilih
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    <hr>
    <?php endif;?>
    <!-- kategori 3 -->

    
    
    <!-- hoodie -->
    <?php //$this->load->view('content/home_lengan_pendek'); ?>
    <!-- hoodie -->
    
</div>

<?php $this->load->view('content/footer'); ?>

<script type="text/javascript">
$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<3;i++) {
    next=next.next();
    if (!next.length) {
      next=$(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }
});
</script>

</body>
</html>