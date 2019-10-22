<div class="container" style="margin-top:80px; margin-bottom: 143px">
    <div class="row">
    <?php //for($i=0; $i < 12; $i++): ?>
    <?php foreach($data_produk as $dp): ?>
        <div class="col-12 col-md-6 col-lg-3 mt-3">
            <div class="card card-cascade">
                <!-- Card image -->
                <?php $gambar = explode(',', $dp->gambar); ?>
                <div class="view view-cascade overlay">
                    <div id="carouselExampleControls<?=$dp->id_produk?>" class="carousel slide post-thumb" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?=base_url()?>assets/gambar/<?=$gambar[0]?>" alt="First slide" style="max-height: 200px">
                            </div>
                            <?php for($y=1; $y < sizeof($gambar); $y++): ?>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?=base_url()?>assets/gambar/<?=$gambar[$y]?>" alt="Second slide" style="max-height: 200px; min-height: 200px">
                            </div>
                            <!-- <div class="carousel-item">
                                <img class="d-block w-100" src="https://distrodakwah.id/assets/uploads/featured_image/utama/03phitam.jpg"
                                    alt="Third slide">
                            </div> -->
                            <?php endfor; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls<?=$dp->id_produk?>" role="button" data-slide="prev">
                            <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                            <h2><i class="fas fa-chevron-left"></i></h2>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls<?=$dp->id_produk?>" role="button" data-slide="next">
                            <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                            <h2><i class="fas fa-chevron-right"></i></h2>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="card-body pb-3 text-center post-body">
                    <h5 class="card-title"><?=ucwords($dp->nama_produk)?></h5>
                    <p class="h6 orange-text"><?='Rp '.number_format($dp->harga)?></p>
                        <!-- <div class="col-md-12"> -->
                        <!-- </div> -->
                        <!-- <div class="col-6 col-lg-6">
                            <a type="button" href="https://api.whatsapp.com/send?phone=6285800646606" target="_blank" class="btn btn-md btn-rounded success-color">Pesan</a>
                        </div> -->
                </div>
                <a href="<?=base_url('home/detail')?>/<?=$dp->id_produk?>" type="button" target="_blank" class="card-footer btn btn-md btn-rounded warning-color-dark text-center">
                    Pilih
                </a>
                    <!-- <a href="#" class="btn btn-outline-default btn-md btn-rounded waves-effect">WA</a> -->
            </div>
        </div>
    <?php endforeach; ?>
    <?php //endfor; ?>

    </div>    
</div>