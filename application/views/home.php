<div class="container" style="margin-top:80px; margin-bottom: 100px">

    <!-- lengan panjang -->
    <?php //$this->load->view('content/home_lengan_panjang'); ?>
    <!-- lengan panjang -->

    <!-- hoodie -->
    <?php $this->load->view('content/home_hoodie'); ?>
    <!-- hoodie -->
      
    <?php foreach($data_kategori as $dk): ?>
    <?php $y=0;
    foreach($data_produk as $dp){
        if($dp->id_kategori == $dk->id_kategori){
            if($y>0){
                break;
            }
    ?>
    <div class="row">
        <div class="col-md-12">
            <p class="h4">
                <a href="<?=base_url('home/kategori')?>/<?=$dk->id_kategori?>" target="_blank" class="text-success"><?=$dk->kategori?></a>
            </p>
            <hr>
        </div>
    </div>
    <?php $y++;  } } ?>
    <div class="row mb-4">
    
    <?php for($i=0; $i < sizeof($data_produk); $i++): ?>
    <?php if($dk->id_kategori == $data_produk[$i]->id_kategori):?>
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card-group">
                <div class="card">
                    <?php $gambar = explode(',', $data_produk[$i]->gambar); ?>
                    <img src="<?=base_url()?>assets/gambar/<?=$gambar[0]?>" alt="Card image cap" class="card-img-top post-thumb" style="max-height: 200px">
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
    <?php endif;?>
    <?php endfor; ?>
    </div>
    <?php endforeach;?>
    
    <!-- hoodie -->
    <?php //$this->load->view('content/home_lengan_pendek'); ?>
    <!-- hoodie -->
    

    <!-- <div class="row">
        <div class="col-md-12">
            <p class="h4">
                <a href="<?//=base_url('home/hoodie')?>" target="_blank" class="text-success">Hoodie</a>
            </p>
            <hr>
        </div>
    </div> -->
    
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