<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
    <?php for($i=1; $i < sizeof($slide); $i++):?>
    <li data-target="#carousel-example-1z" data-slide-to="<?=$i?>"></li>
    <?php endfor;?>
    <!-- <li data-target="#carousel-example-1z" data-slide-to="2"></li> -->
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
    <img class="d-block w-100 img-fluid" src="<?=base_url()?>assets/gambar/<?=$slide[0]->gambar?>"
        alt="First slide" style="max-height: 707px">
      <!-- <img class="d-block w-100 img-fluid" src="http://i0.wp.com/www.rabbanimallonline.com/wp-content/uploads/2018/11/RMO-1.jpg"
        alt="First slide" > -->
    </div>
    <!--/First slide-->
    <!--Second slide-->
    <?php for($i=1; $i < sizeof($slide); $i++):?>
    <div class="carousel-item">
      <img class="d-block w-100 img-fluid" src="<?=base_url()?>assets/gambar/<?=$slide[$i]->gambar?>"
          alt="First slide" style="max-height: 707px">
      <!-- <img class="d-block w-100 img-fluid" src="http://i2.wp.com/www.rabbanimallonline.com/wp-content/uploads/2019/01/januari-2.jpg"
        alt="Second slide" > -->
    </div>
    <?php endfor;?>
    <!--/Second slide-->
    <!--Third slide-->
    <!-- <div class="carousel-item">
      <img class="d-block w-100 img-fluid" src="http://i2.wp.com/www.rabbanimallonline.com/wp-content/uploads/2019/01/januari-1.jpg"
        alt="Third slide" >
    </div> -->
    <!--/Third slide-->
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->