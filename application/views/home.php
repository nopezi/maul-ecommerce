<div class="container" style="margin-top:80px; margin-bottom: 100px">

    <div class="row">
        <div class="col-md-12">
            <p class="h4">
                <a href="<?=base_url('home/lengan_panjang')?>" target="_blank" class="text-success">Lengan Panjang</a>
            </p>
            <hr>
        </div>
    </div>    

    <!-- lengan panjang -->
    <?php $this->load->view('content/home_lengan_panjang'); ?>
    <!-- lengan panjang -->

    <div class="row">
        <div class="col-md-12">
            <p class="h4">
                <a href="<?=base_url('home/lengan_pendek')?>" target="_blank" class="text-success">Lengan Pendek</a>
            </p>
            <hr>
        </div>
    </div>
    
    <!-- hoodie -->
    <?php $this->load->view('content/home_lengan_pendek'); ?>
    <!-- hoodie -->

    <div class="row">
        <div class="col-md-12">
            <p class="h4">
                <a href="<?=base_url('home/hoodie')?>" target="_blank" class="text-success">Hoodie</a>
            </p>
            <hr>
        </div>
    </div>
    
    <!-- hoodie -->
    <?php $this->load->view('content/home_hoodie'); ?>
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