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
                                <img class="d-block w-100" src="https://distrodakwah.id/assets/uploads/featured_image/utama/03pmisty.jpg"
                                    alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://distrodakwah.id/assets/uploads/featured_image/utama/03pnavy.jpg"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://distrodakwah.id/assets/uploads/featured_image/utama/03phitam.jpg"
                                    alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls<?=$i?>" role="button" data-slide="prev">
                            <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                            <h2><i class="fas fa-chevron-left"></i></h2>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls<?=$i?>" role="button" data-slide="next">
                            <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                            <h2><i class="fas fa-chevron-right"></i></h2>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="card-body pb-3 text-center">
                    <h5 class="card-title">Title</h5>
                    <p class="h6 orange-text">Rp. 10.000</p>
                        <!-- <div class="col-md-12"> -->
                    <a type="button" href="<?=base_url('home/detail_product')?>" target="_blank" class="col-md-12 btn btn-sm btn-rounded warning-color-dark text-center">Detail</a>
                        <!-- </div> -->
                        <!-- <div class="col-6 col-lg-6">
                            <a type="button" href="https://api.whatsapp.com/send?phone=6285800646606" target="_blank" class="btn btn-md btn-rounded success-color">Pesan</a>
                        </div> -->
                </div>
                    <!-- <a href="#" class="btn btn-outline-default btn-md btn-rounded waves-effect">WA</a> -->
            </div>
        </div>
    <?php endfor; ?>

    </div>    
</div>
