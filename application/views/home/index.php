<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
      <img src="<?=base_url()?>assets/img/logo-maul.jpg" width="60" height="30" alt="mdb logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3 mt-4">

        <!-- <h1 class="my-4">Qaiza</h1> -->
        <div class="list-group">
        <?php if(!empty($kategori)):?>
          <?php foreach($kategori as $k):?>
          <a href="<?=base_url('home/kategori/').$k->id_kategori?>" class="list-group-item text-success"><?=$k->kategori?></a>
          <?php endforeach;?>
        <?php endif;?>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
          <?php if(!empty($slide)):?>
            <?php for($i=0;$i < sizeof($slide); $i++):?>
            <?php $aktif = ($i==0)?'active':'';?>
            <div class="carousel-item <?=$aktif?>">
              <img class="d-block img-fluid" src="<?=base_url().'assets/gambar/'.$slide[$i]->gambar?>" alt="First slide">
            </div>
            <?php endfor;?>
          <?php endif;?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
      <?php if(!empty($produk_limit)):?>
      <?php foreach($produk_limit as $pl):?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="<?=base_url('home/detail')?>/<?=$pl->id_produk?>"><img class="card-img-top" src="<?=base_url().'assets/gambar/'.$pl->gambar?>" style="max-height: 100px; min-height: 220px" alt=""></a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="<?=base_url('home/detail')?>/<?=$pl->id_produk?>" class="text-warning"><?=$pl->nama_produk?></a>
                </h4>
                <h5><?='Rp '.number_format($pl->harga)?></h5>
                <p class="card-text">
                  <small>
                      <a class="text-success" href="<?=base_url('home/sk')?>?sk=<?=$pl->sub_kategori?>" target="_blank">
                          <?=ucwords($pl->sub_kategori)?>
                      </a>
                  </small>
                </p>
              </div>
              <!-- <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div> -->
            </div>
          </div>
        <?php endforeach;?>  
      <?php endif;?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


  <!-- Footer -->
  <footer class="py-5 bg-success">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Qaiza 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/template/startbootstrap-shop-homepage/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/template/startbootstrap-shop-homepage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
  $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });
});

  </script>

</body>

</html>
