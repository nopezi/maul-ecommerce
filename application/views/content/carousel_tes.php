<html>
  <head>
  <title>My Now Amazing Webpage</title>
  <!-- <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/> -->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/slick/slick/slick-theme.css"/>
  </head>
  <body>

  <div class="your-class">
    <div>your content</div>
    <div>your content</div>
    <div>your content</div>
  </div>

  <div data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
  <div><h3>1</h3></div>
  <div><h3>2</h3></div>
  <div><h3>3</h3></div>
  <div><h3>4</h3></div>
  <div><h3>5</h3></div>
  <div><h3>6</h3></div>
</div>

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/slick/slick/slick.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        setting-name: setting-value
      });
    });
  </script>

  </body>
</html>