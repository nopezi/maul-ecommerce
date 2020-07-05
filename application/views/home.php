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

    <?php $this->load->view('content/home_perkategori') ?>
    <!-- hoodie -->
    <?php //$this->load->view('content/home_lengan_pendek'); ?>
    <!-- hoodie -->
    
</div>

<?php $this->load->view('content/footer'); ?>

<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/slick/slick/slick.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3
      });
    });
  </script>

<script type="text/javascript">
$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<4;i++) {
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