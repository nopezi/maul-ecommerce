<div class="container" style="margin-top:80px; margin-bottom: 100px">
    <div class="row">
    <?php for($i=0; $i < 12; $i++): ?>
        <div class="col-12 col-md-6 col-lg-3 mt-3">
            <div class="card card-cascade">
                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <div id="carouselExampleControls<?=$i?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="https://distrodakwah.id/assets/uploads/featured_image/utama/195putih.jpg"
                                    alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://distrodakwah.id/assets/uploads/featured_image/utama/195biru.jpg"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://distrodakwah.id/assets/uploads/featured_image/utama/195navy.jpg"
                                    alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls<?=$i?>" role="button" data-slide="prev">
                            <h2><i class="fas fa-chevron-left"></i></h2>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls<?=$i?>" role="button" data-slide="next">
                            <h2><i class="fas fa-chevron-right"></i></h2>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="card-body pb-3 text-center">
                    <h5 class="card-title">Title</h5>
                    <p class="h6 orange-text">Rp. 10.000</p>
                    <a type="button" href="<?=base_url('home/detail_product')?>" target="_blank" class="col-md-12 btn btn-sm btn-rounded warning-color-dark text-center">Detail</a>
                </div>
            </div>
        </div>
    <?php endfor; ?>

    </div>    
</div>
